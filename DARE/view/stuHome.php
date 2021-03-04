
<!DOCTYPE html>
<html>

<div class="homeBack">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>
            Dare | Welcome

        </title>


        <link rel="stylesheet" href="style.css">




    </head>
    <?php include 'stuNav.php'; ?>



<body>

<?php
session_start();
require '../includes/db.php';; // get database connection variable


if(empty($_SESSION['uid'])){
    include 'view/home.php';
}
$name= $_SESSION['uid'];    // set usernaem to teh session username
$sql = "SELECT * FROM student WHERE username='$name';";   //the string ogf mysql code to search for information in database
        $result = mysqli_query($conn, $sql);   // actuallying seaching using the the database connection and mysql code
        while ($row = mysqli_fetch_assoc($result)) {   // fetching the student id form the database where the username matched

            $temp = $row['student_id'];          // storing sudent id in variable temp
        }
        $_SESSION['sid']=$temp;                // setting seesion vairiable sid to temp



$query="SELECT * FROM course_students WHERE student_id='$temp'";    //another mysql code stirng

$result=mysqli_query($conn,$query); //searching

$data=array();  //create array

while($rows=mysqli_fetch_assoc($result)){//fetching and storing course_name wher studnet id matched in array

$data[]=$rows['course_name'];
$query="SELECT * FROM course_students WHERE student_id='$temp'";    //another mysql code stirng

$results=mysqli_query($conn,$query); //searching

$datas=array();  //create array
}
while($rowss=mysqli_fetch_assoc($results)){//fetching and storing course_name wher studnet id matched in array

$datas[]=$rowss['course_id'];

}





?>

<div class="grid-container">


    <?php
      // This code will make courses appear for a student. Once user selects course the id's of student and course will pass to next
      $i = 1;
      foreach($data as $item)
      {
      echo "<div class=\"item$i\"> <p>" . $item . "</p><br>
      <a href=stuGrades.php?id=$temp&courseId=" . $datas[$i-1] ." >View Grades</a>
    </div>";
      $i++;
      }
    ?>


</div>

<?php


?>

<br>
<br><br>
<br><br>
</div>

</body>

<!--footer-->
<?php include 'footer.php'; ?>

</div>
</html>



<?php

/*

 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.

*/
