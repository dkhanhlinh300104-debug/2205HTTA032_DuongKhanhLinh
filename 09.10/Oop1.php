<!DOCTYPE html>
<html>
<head>
    <style tyle="text/css">
      table, th, td {
		  border: 1px, solid;
		  color: green;
		  padding: 3pt;
	  }
	  h2{
		  color: green;
	  }
	  p{
		  color: red;
	  }
    </style>
</head>
<body>
<?php
//lập tình hướng đối tượng

class Car{
	//Biến cục bộ
	private $name;  //trong lớp khia báo
	protected $price;  //truy cập được ở lớp khác
	public $branch;   //truy cập mọi nơi
	
	//phương thức
//cấu tử. PHP chỉ support 1 cấu tử

	public function __construct($name, $price){
		$this->name = $name;
		$this->price = $price;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	public function getPrice(){
		return $this->price;
	}
	public function setPrice($price){
		$this->price = $price;
	}
	/*public function displayCar(){
		echo "<h2>";
		echo "Car name: " .$this->name ."<br>";
		echo "Price: " .$this->price . "$.<br>";
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
}*/ //end class definition

 //lỗi ở đâu
     $car = new Car();
	 $car->setName("Honda City");
	 $car->setPrice(15000);
	 $car->branch = "Honda";
	 
	 
	 echo $car->getName(). "<br>";
	 echo $car->getPrice(). "<br>";
	 echo $car->branch(). "<br>";

    //$car = new Car();
	//$car->setName("Honda");
	//$car->setPrice(20000);
	//$car->displayCar();;
	
	   //muốn tạo object và gán luôn giá trị
	//$car = new Car("Toyota", 15000);
	//$car->displayCar();
	

   /* $car = new Car();   //khai báo lớp đối tượng cars
	$car->setName("Toyota");
	$car->setPrice(20000);
	$car->displayCar();
	echo "<p>Display car in a table <br></p>";
	$car->drawTable();*/
    
	//mảng object khai báo theo 2 cách
	//cách 1: $bien = [...];
	//cách 2: $bine = array(...);
	
/*	$cars = [
	     new Car("Toyota", 2000),
		 new Car("Volvo", 1500),
		 new Car("Mitsubisi", 3000),
	];
	
	//var_dump($cars);
	
	//duyệt mảng các đối tượng
	foreach ($cars as $car){
		$car->displayCar();
		echo "<hr>";
	}*/



?>
</body>
</html>