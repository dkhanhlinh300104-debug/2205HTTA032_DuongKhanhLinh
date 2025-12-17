<!DOCTYPE html>
<html>
<head>	
	<link href="css/my.css" rel ="stylesheet">	
</head>
<body>
<?php
//Lập trình hướng đối tượng

class Car {	
	private $name; 
	private $price; 
	private $branch; 
	public function __construct($name, $price, $branch){
		$this->name = $name;
		$this->price = $price;
		$this->branch = $branch;
	}
	
	protected function introFromCar(){
		echo "Name: " . $this->name . " - ";
		echo "Price: " . $this->price . " - ";
		echo "Branch: " . $this->branch . "<br>";		
	}
} // End class definition Car

class Honda extends Car{
	public function message(){
		echo "I'm a honda <br>";		
	}
	public function introFromHonda(){
		$this->introFromCar();
	}
} // End class Honda

	$car = new Honda("Honda City", 15000, "Honda"); //Khai báo và khởi tạo
	$car->introFromHonda();
	$car->message();
	
	
?>
	
</body>
</html>