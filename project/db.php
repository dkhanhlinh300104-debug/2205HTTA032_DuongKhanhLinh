<?php 
class DbConnection{
	private const USERNAME = "root";
	private const HOSTNAME ="localhost";
	private const PASSWORD ="";
	private const DB_NAME ="test";
	private static ?PDO $pdo = null;
	
	private static ?DbConnection $connection = null;

	private function __construct() {} //Không cho tạo đối tượng bằng new

	private function __clone() {}  //Không cho sao chép đối tượng

	public static function getConnection() : DbConnection
	{
		if (self::$connection === null)
			self::$connection = new self();
		return self::$connection;		
	}

	public function connect()
	{	if (self::$pdo === null) {
            $dsn = "mysql:host=" . self::HOSTNAME . ";dbname=" . self::DB_NAME;
            
            // Tùy chọn cho PDO: quan trọng cho hiệu suất và bảo mật
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Bật chế độ báo lỗi exception
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,         // Thiết lập chế độ lấy dữ liệu mặc định là object
                PDO::ATTR_EMULATE_PREPARES   => false,                  // Quan trọng: Sử dụng Prepared Statements thực sự
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"     // Hỗ trợ tiếng Việt và Emoji
            ];

            try {
                self::$pdo = new PDO($dsn, self::USERNAME, self::PASSWORD, $options);
            } catch (PDOException $e) {
                // Trong môi trường production, bạn NÊN ghi log thay vì echo ra lỗi
                throw new PDOException("Lỗi kết nối CSDL: " . $e->getMessage(), (int)$e->getCode());
            }
        }
        return self::$pdo;
	}
}

//Sử dụng
class DbHelper
{
	private PDO $pdo;
	public function __construct(){

		try {
            // Lấy đối tượng PDO duy nhất từ DbConnection Singleton
            $this->pdo = DbConnection::getConnection()->connect();
        } catch (PDOException $e) {
            // Nếu không thể kết nối, dừng chương trình
            die("Không thể khởi tạo DbHelper: " . $e->getMessage());
        }
    }
	
	
	
	private function executeStatement(string $sql, array $params)//: PDOStatement
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params); // Tự động ràng buộc và thực thi
            return $stmt;
        } catch (PDOException $e) {
            // Log lỗi, có thể throw lại hoặc trả về thông báo lỗi thân thiện
            // Trong môi trường thực tế, không nên hiển thị $sql và lỗi chi tiết ra cho người dùng.
            throw new PDOException("Lỗi thực thi truy vấn SQL: " . $e->getMessage() . " - SQL: " . $sql, (int)$e->getCode());
        }
    }

    public function select(string $sql, array $params = [], bool $fetchAll = true)//: mixed
    {
        $stmt = $this->executeStatement($sql, $params);
        
        if ($fetchAll) {
            return $stmt->fetchAll();
        }
        
        return $stmt->fetch();
    }

	public function execute($sql, array $params = [])// : int
	{		
		$stmt = $this->executeStatement($sql, $params);
        return $stmt->rowCount();
	}

	public function insert(string $sql, array $params = [])//: int
    {
        $this->execute($sql, $params);
        // Trả về ID của dòng cuối cùng được chèn
        return (int)$this->pdo->lastInsertId();
    }
	
	public function delete(string $sql, array $params = []): int
    {
        // Tái sử dụng phương thức execute đã có sẵn để thực thi câu lệnh
        $rowsAffected = $this->execute($sql, $params);
        
        return $rowsAffected;
    }
	
	public function update(string $sql, array $params = []): int
    {
        // Tái sử dụng phương thức execute đã có sẵn để thực thi câu lệnh
        $rowsAffected = $this->execute($sql, $params);
        
        return $rowsAffected;
    }
	


}
?>