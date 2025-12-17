<?php
//Toán tử &&, and, ||, ord
//and
$x = 8;
$y = 3;
if ($x >=5 and $y >= 5)
	echo "abc <br>";
else
	echo "def <br>";

//toán tử &&
$x = 8;
$y = 3;
if ($x >=5 && $y >= 5)
	echo "abc <br>";
else
	echo "def <br>";

//toán tử ||
$x = 8;
$y = 3;
if ($x >=5 || $y >= 5)
	echo "abc <br>";
else
	echo "def <br>";

//toán tử or
$x = 8;
$y = 3;
if ($x >=5 or  $y >= 5)
	echo "abc <br>";
else
	echo "def <br>";



                          //vòng lặp for, while, do...while
//For
echo 'For <br>';
for ($i = 1; $i <= 5; $i++)
{
	echo "i = " . $i . "<br>"; 
}

//While
echo 'While <br>';
$i = 1;
while ($i <= 5)
{
	echo "i = " . $i . "<br>"; 
	$i++;
}

//do...while 
echo 'Do...While <br>';
$i = 5;
do 
{
	echo "1.Chọn thực đơn 1 <br>";
	echo "2.Chọn thực đơn 2 <br>";
	echo "i = " . $i . "<br>"; 
	$i++;
}While ($i <= 5);
//do...while thường được dùng để xây dựng thực đơn

//Vòng lặp foreach được sử dụng trong mảng

$cars = array ("Toyota", "Volvo", "Mitsubishi", "Honda");
foreach ($cars as $car){
	echo ($car);
	echo ("<br>");
}
for ($i=0; $i <= 3; $i++){
		echo ($cars[$i]);
		echo ("<br>");
	}
?>
