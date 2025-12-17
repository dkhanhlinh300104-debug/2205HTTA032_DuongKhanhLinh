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
	private $name;
	private $price;	
	//Phương thức
	//Cấu tử. PHP chỉ support 1 cấu tử
	public function __construct($name, $price){
		$this->name = $name;
		$this->price = $price;
	}

	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name = $name;
	}
	public function getPrice(){
		return $this->price;
	}
	public function setPrice($price){
		$this->price = $price;
	}
	public function displayCar(){
		echo "<h2>";
		echo "Car name: " . $this->name . "<br>";
		echo "Price: " . $this->price . "$.<br>";
		echo "</h2>";
	}
	
	public function drawTable(){
		echo "<table>";		
			echo "<tr>";
				echo "<th> Name </th>";
				echo "<th> Price </th>";
			echo "</tr>";
		
			echo "<tr>";
				echo "<td>" . $this->name . "</td>";
				echo "<td>" . $this->price . "</td>";
			echo "</tr>";
		echo "</table>";		
	}
	public function drawARow(){
		echo "<tr>";
			echo "<td>" . $this->name . "</td>";
			echo "<td>" . $this->price . "</td>";
		echo "</tr>";
	}
	
} // End class definition
	
	//Nếu class chỉ có cấu tử mặc định
	//$car = new Car();
	//$car->setName("Honda");
	//$car->setPrice(20000);
	//$car->displayCar();
	
	//Muốn tạo object và gán luôn giá trị ???
	$car = new Car("Toyota", 15000);
	$car->displayCar();

	// Mảng các object
	//Khai báo mảng theo 2 cách
	//Cách 1: $bien = [....];
	//Cách 2: $bien = array(....);

	$cars = [
		new Car("Toyota", 20000),	
		new Car("Volvo", 15000),
		new Car("Misubishi", 30000)
	];
	
	//var_dump($cars);
	 	
	//Duyệt mảng các đối tượng
	echo "<table>";		
		echo "<tr>";
			echo "<th> Name </th>";
			echo "<th> Price </th>";
		echo "</tr>";		
		foreach ($cars as $car){
			$car->drawARow();				
		}		
	echo "</table>";	
?>
	<div class="box">
		<span>test div</span>
	</div>
</body>
</html>