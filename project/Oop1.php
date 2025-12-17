<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9fbfd;
        color: #222;
        padding: 20px;
    }

    h2 {
        color: #0066cc;
    }

    p {
        font-weight: bold;
        color: #444;
    }

    table {
        border-collapse: collapse;
        width: 300px;
        text-align: center;
        margin-top: 10px;
        background-color: #ffffff;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    }

    th, td {
        border: 2px solid #0099cc;
        padding: 10px;
    }

    th {
        background-color: #00bfff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #e6f7ff;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }
</style>
</head>
<body>
<?php
// Lập trình hướng đối tượng

class Car {
	//Bien cuc bo
	//Access Modifier
	private $name;//Trong lop khai bao 
	protected $price;//Truy cap o lop khai bao ve ke thua
	public $branch;//Truy cap moi noi
	public function setName ($name){
		 $this->name = $name;
	}
	public function getName(){
		 return $this->name;
	}
	public function setPrice($price){
		  $this->price = $price;
	}
	public function getPrice(){
		return $this->price;
	}
    private $name;
    private $price;
	//phương thức 
	//Cấu tử .PHP chỉ support 1 cấu tử
	//public function __construct($name, $price){
		//$this->name = $name;
	   // $this->price = $price;
	//}

   // public function getName() {
       // return $this->name;
    }

   // public function setName($name) {
       // $this->name = $name;
    //}

    //public function getPrice() {
       // return $this->price;
   // }

    //public function setPrice($price) {
       // $this->price = $price;
    //}

   // public function displayCar() {
        //echo "<h2>Car Information</h2>";
       // echo "<p>Car name: <span style='color:#ff6600; font-weight:bold;'>" . $this->name . "</span><br>";
       // echo "Price: <span style='color:#008000; font-weight:bold;'>" . $this->price . "$</span>.</p>";
   // }

   // public function drawTable() {
       // echo "<table>";
       // echo "<tr>";
       // echo "<th>Name</th>";
       // echo "<th>Price</th>";
       // echo "</tr>";

       // echo "<tr>";
        //echo "<td>" . $this->name . "</td>";
        //echo "<td>" . $this->price . "</td>";
        //echo "</tr>";

      // echo "</table>";
   // }
//}

// End class definition
//Loi o dau 
 $car = new Car();
 //$car->name ="Honda City";//Loi
 //Sua lai
 $car->setName("Honda City");
 $car->setPrice(15000);
 $car->branch = "Honda"; 
 echo $car->getName()."<br>";
 echo $car->getPrice() . "<br>";
 echo $car->branch . "<br>";
// Mảng các object
// Khai báo mảng theo 2 cách 
//Cách 1: $bien = [....];
//Cach 2 : $bien = array(....);
 $cars = [
   new Car("Toyota",20000),
   new Car("Volvo",15000),
   new Car("Misubishi",30000)
  ];
  //var_dump($cars);
  //Duyet mang cac doi phuong 
  foreach ($cars as $car){
	  $car ->displayCar();
	  echo "<hr>";
  }

//$car = new Car();
//$car->setName("Toyota");
//$car->setPrice(20000);

//$car->displayCar();

//echo "<p>Display car in a colorful table:</p>";
//$car->drawTable();
?>
</body>
</html>
