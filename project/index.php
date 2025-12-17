<?php
	//hàm toán học
	echo (pi());
	echo"<br>";
	echo ("min:". min(1,2,3,4));
	echo"<br>";
	echo ("max:". max(1,2,3,4));
	echo"<br>";
	echo (abs(-3.5));
	echo"<br>";
	//hằng số
	//C1
	const CARS = "TOYOTA";
	echo CARS;
	echo"<br>";
	//C2
	define ("OTO",["NISSAN","TOYOTA","MISTSUBISHI"]);
	echo OTO[0];
	__CLASS__;
	
	echo "<br>";
	//Một số hằng có sẵn
	echo __DIR__;//Hiện thị thư mục hiện hành
	class OT{
		function test(){
			return __CLASS__;//Hiển thị tên lớp
		}
	}
	$x = new OT();
	echo $x->test();
	echo "<br>";
	echo __FILE__;
	echo"<br>";
	//Toán tử
	$x =10;
	$y =2;
	echo $x+$y;
	echo"<br>";
	echo $x-$y;
	echo"<br>";
	echo $x*$y;
	echo"<br>";
	echo $x/$y;
	echo"<br>";
	echo $x%$y;
	echo"<br>";
	echo $x^$y;
	echo"<br>";
	//Phép gán
	$x =10;
	echo $x+=2;
	echo"<br>";
	echo $x-=2;
	echo"<br>";
	echo $x*=2;
	echo"<br>";
	echo $x/=2;
	echo"<br>";
	echo $x%=2;
	echo"<br>";
	
	
	//toán tử tăng
	echo $x++; //0
	echo"<br>";
	echo $x; //1
	echo"<br>";
	echo $x--; //1
	echo"<br>";
	//Phép so sánh
	$x=5;
	$y="5";
	var_dump ($x===$y);
	echo"<br>";
	//toán tử and && or ||
	// toán tử <= >= != <>
	if (5===5 or 3===4)
		echo" trời nắng";
	elseif(5==="5" || 3===4)
		echo"trời râm";
	else 
		echo "trời mưa";
	echo"<br>";
	//phép so sánh
	$thang =5;
	switch ($thang){
		case 1: case 3:case 5: case 7: case 8: case 10: case 12 :
			echo "thang $thang có 31 ngày";
			break;
		case 2:
			echo"tháng $thang có 28 hoặc 29 ngày";
			break;
		default:
			echo "không phải tháng";
	}
	// foreach : lập trong mảng
	$cars = array ("toyota","nissan","mitsubishi","honda");
	foreach ($cars as $c);
	echo"<br>";
	//  hàm do người định nghĩa
	function FunctionName()
	{
		//code here
		echo "hello word! <br>";
		
	}
	//gọi hàm trong chương trình
	FunctionName();
	echo"<br>";
	//  hàm do người định nghĩa
	function FunctionNam($fname,$fage)
	{
		//code here
		echo "hello $fname, Bạn $fage tuổi .<br>";
		
	}
	//gọi hàm trong chương trình
	FunctionNam( "KHANH LINH", 21);
	
	// vẽ bảng bằng php
	echo" <table border=1>";
		echo "<tr>";
			echo "<th>text heading </th>";
			echo "<th>text heading </th>";
		echo "</tr>";
		echo "<tr>";
			
	echo"<br>";
	function Drawtable ($row, $col)
	{
		echo"<table border=1 style='color:red'>";
			for ($r=1; $r<=$row; $r++){
				echo"<tr>";	
					for($c=1; $c<=$col; $c++)
						echo "<td> HEHE </td>";
				echo "</tr>";
			}
		echo"</table>";
	}
	Drawtable (4,5);// gọi hàm không có giá trị trả về
	
	echo "<br>";
	function Add2Number($x=1, $y=1){
		return $x + $y;
	}
	$Name ("Nguyen Duc Duy<br>");
	
	$c = Add2Number(51,4); // có giá trị trả về
	echo $c;
	// array
	$cars = array (" Toyota","volvo","honda");
	var_dump ($cars);
	echo"<br>";
	echo count($cars)."<br>";// đếm số phần từ của mảng
	$car[1] = "honda";
	
	
	
?>