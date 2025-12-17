<?php
// cấu trúc rẽ nhánh
//if, if...else, switch...case

//$x = 8;
//$y = 3;
//if ($x <= $y)
//	echo "x lớn hơn y <br>";
//else
//	echo "x không lớn hơn y <br>";


/*$m = 1;
if ($m === 1)
	echo "Tháng1 có 31 ngày <br>";
elseif ($m === 2)
    echo ("Tháng 2 có 28 hoặc 29 ngày <br>");
elseif ($m === 3)
	echo "Tháng 3 có 31 ngày <br>";*/
	
	
// Chuyển sang cấu trúc switch...case
$m = 11;
switch ($m) {
	case 1: case 3: case 5: case 7: case 8: case 10: case 12:
          echo "Tháng $m có 31 ngày <br>";
          break;
	case 2:
          echo "Tháng $m có 28 hoặc 29 ngày <br>";
		  break;
    case 4: case 6: case 9:  case 11:
          echo "Tháng $m có 30 ngày <br>";	
		  break;
	default:
	      echo "Tháng $m không hợp lệ <br>";
}