<!doctype html>
<html>
    <head>
        <meta lang = "vi" charset="UTF-8"> 
        <title> Lap trinh huong doi tuong </title>  
        <style>
            table, th, td {
                border: 1px solid;
                border-color:black;
                border-collapse: collapse;
                width:50%;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h5>Chao ban den voi khoa lap trinh co ban HPH</h5>
        <?php
        class Student
        {
            //thuoc tinh
            private $name;
            private $age;
            private $gender;
            // cau tu
            public function __construct($name, $age, $gender)
            {
                $this->name = $name;
                $this->age = $age;
                $this->gender = $gender;
            }
            public function printStudent()
            {
                echo "Name:". $this->name."<br>";
                echo "Age". $this->age."<br>";
                echo "Gender". $this->gender."<br>";
            }
        }
        //su dung class
        $student1 = new Student("Pham Ngoc Thach",21,"Nam");
        $student2 = new Student("Kieu Thanh Truc",21,"Nu");
        $student3 = new Student("Le Duc Duy",21,"Nam");

        //tao mang 
        $students = array($student1, $student2, $student3);
        foreach ($students as $student)
        {
            $student -> printStudent();
            echo "<br>";
        }
        ?>
    </body>
</html> 