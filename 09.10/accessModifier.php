<!DOCTYPE html>
<html>
<head>	
	<link href="css/my.css" rel ="stylesheet">	
</head>
<body>
<?php
//Lập trình hướng đối tượng

class Car {
	//Biến cục bộ
	//Access Modifier
	private $name; //Trong lớp khai báo
	protected $price; //Truy cập được ở lớp khai báo và kế thừa
	public $branch; //Truy cập mọi nơi
	
	public function setName($name){
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
	
} // End class definition
	
	
	// Lỗi ở đâu
	$car = new Car();
	//$car->name = "Honda City"; //Lỗi
	//Sửa lại
	$car->setName("Honda City");
	// $car->price = 15000; // Lỗi
	//Sửa lại
	$car->setPrice(15000);
	$car->branch = "Honda";
	
	// Lỗi ở đâu
	//echo $car->name . "<br>"; // Lỗi
	//Sửa lại
	echo $car->getName(). "<br>";
	echo $car->getPrice() . "<br>";
	echo $car->branch . "<br>";
	
	
?>
	
</body>
</html>