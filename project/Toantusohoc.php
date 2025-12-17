<?php
$x = 8;
$y = 3;
echo $x + $y . "<br>";
echo $x - $y . "<br>";
echo $x * $y . "<br>";
echo $x /$y . "<br>";
echo $x % $y . "<br>";
echo $x ** $y . "<br>";

//phep gan

echo"Phép gán <br>";
$x = 8;
$y = 3;
echo ($x += $y). "<br>"; // $x = $x + $y
//$x = 11; $y = 3;
echo ($x -= $y). "<br›"; // $x = $x - $y
//$x = 8; $y = 3;
echo ($x*= $y). "<br›"; // $x * $y
// $x = 24 ;$y= 3;
echo ($x /$y). "<br›"; // $x = $x / $y
//$x = 8; Sy = 3;
echo ($x %= $y) . "<br>"; // $x =$x % $y

//Toán tử 1 ngôi : ++ 
 echo"Toán tử một ngôi <br>";
 echo $x++ . "<br>"; //x=2
 echo $x . "<br>"; //x=3
//Toán tử 1 ngôi :--
 echo $x-- . "<br>"; //x=1
 echo $x . "<br>"; //x=1
//Toán tử so sánh :==,===,!=,!==,<>,>,>==,<,<=,<==
 echo"Toán tử so sánh <br>";
 $x=8;
 var_dump($x);
 echo "<br>";
 $y="8";
 var_dump($y);
 echo "<br>";
 $c = ($x==$y);
 echo $c;
 echo"<br>";
 var_dump ($c);
//Toán tử so sánh:===
 $x=8;
 var_dump($x);
 echo "<br>";
 $y="8";
 var_dump($y);
 echo "<br>";
 $c = ($x===$y);
 echo $c;
 echo"<br>";
 var_dump ($c);
//Toán tử so sánh :!==
 $x=8;
 var_dump($x);
 echo "<br>";
 $y="8";
 var_dump($y);
 echo "<br>";
 $c = ($x!==$y);
 echo $c;
 echo"<br>";
 var_dump ($c);
//Toán tử so sánh :<>
 $x=8;
 var_dump($x);
 echo "<br>";
 $y="8";
 var_dump($y);
 echo "<br>";
 $c = ($x<>$y);
 echo $c;
 echo"<br>";
 var_dump ($c);
?>