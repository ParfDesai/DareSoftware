<?php

  function get_Assignments($stuId, $courseId )
  {
    include("db.php");

    $query="SELECT assignment_name, pointes_earned, points_possible,  percentage
    FROM assignments
    WHERE student_id = $stuId && course_id = $courseId";    //another mysql code stirng

     $results = mysqli_query($conn,$query);
     $row = $results -> fetch_all();

     return $row;

  }
  function getStudents($cid){
    include 'db.php';
    $sql= "SELECT first_name,last_name,student_id FROM course_students WHERE course_id='$cid'; ";
    $results=mysqli_query($conn,$sql);
    $row = $results -> fetch_all();
    return $row;
  }

  //This function will return a row in a table with any number of columns
  function get_table_row_elements($element)
  {
    $length = count($element);
    $output = "<tr>";
    $tableRow = "";
    for($i = 0; $i < $length; $i++)
    {
      $tableRow = $tableRow . "<td>" . $element[$i] . "</td>";
    }

    $output = $output . $tableRow . "</tr>";

    return $output;

  }
  //This function will calulate the grade for a particular class and return a letter grade
  function calculate_grade($gradePercent)
  {
      

      $letterGrade = "";
      if($gradePercent >= 90)
      {
        $letterGrade = "A";
      }
      else if($gradePercent >= 80)
      {
        $letterGrade = "B";
      }
      else if($gradePercent >= 70)
      {
        $letterGrade = "C";
      }
      else if($gradePercent >= 60)
      {
        $letterGrade = "D";
      }
      else
      {
        $letterGrade = "F";
      }
      return $letterGrade;
  }
  function getClassId($cname){
    include './includes/db.php';
        $sql ="SELECT course_id FROM course WHERE name='$cname'";
               $result = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_assoc($result)) {
                   $cid = $row['course_id'];
               return $cid;
       }
    }
?>
