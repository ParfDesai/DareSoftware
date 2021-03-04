<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'db.php';

class Util
{
    function getClassId($cname){
        include './includes/db.php';
            $sql ="SELECT course_id FROM course WHERE name='$cname'";
                   $result = mysqli_query($conn, $sql);
                   while ($row = mysqli_fetch_assoc($result)) {
                       $cid = $row['course_id'];
                   return $cid;
           }
        }
    function checkUsername($uuname)
    {

        require 'db.php';
        $sql = "SELECT username FROM student WHERE username='$uuname'";
        $result = mysqli_query($conn, $sql);
        $result_check = mysqli_num_rows($result);
        if ($result_check > 0) {
            $valid = false;
            return $valid;
        } else {
            $valid = true;
            return $valid;
        }
    }
    function checkpUsername($uuname)
    {

        require 'db.php';
        $sql = "SELECT username FROM professor WHERE username='$uuname'";
        $result = mysqli_query($conn, $sql);
        $result_check = mysqli_num_rows($result);
        if ($result_check > 0) {
            $valid = false;
            return $valid;
        } else {
            $valid = true;
            return $valid;
        }
    }

    function insertStudent($fname, $lname, $uname, $pnwd, $email, $phone)
    {
        require 'db.php';
        $hashpwd = password_hash($pnwd, PASSWORD_DEFAULT);
        $c = true;
        while ($c) {
            $sid = rand(111111, 999999);
            $sql = "SELECT student_id FROM student WHERE student_id='$sid'";
            $result = mysqli_query($conn, $sql);
            $rcheck = mysqli_num_rows($result);
            if ($rcheck > 0) {
                $c = true;
            } else {
                $c = false;
            }
        }
        $query = "INSERT INTO `student`(`student_id`, `first_name`, `last_name`, `email`, `username`, `password`, "
            . "`phone`, `token`) VALUES ('$sid', '$fname','$lname','$email','$uname','$hashpwd','$phone','')";

        mysqli_query($conn, $query);
    }
    function insertStaff($fname, $lname, $uname, $panwd, $email, $phone)
    {
        require 'db.php';
        $hashpawd = password_hash($panwd, PASSWORD_DEFAULT);
        $c = true;
        while ($c) {
            $pid = rand(111111, 999999);
            $sql = "SELECT professor_id FROM professor WHERE professor_id='$pid'";
            $result = mysqli_query($conn, $sql);
            $rcheck = mysqli_num_rows($result);
            if ($rcheck > 0) {
                $c = true;
            } else {
                $c = false;
            }
        }
        $query = "INSERT INTO `professor`(`professor_id`, `first_name`, `last_name`, `email`, `username`, `password`, `phone`, `token`) VALUES ('$pid','$fname','$lname','$email','$uname','$hashpawd','$phone','')";



        mysqli_query($conn, $query);
    }
    function staffLogin($name, $pawd)
    {
        require 'db.php';
        $sql = "SELECT * FROM professor WHERE username='$name';";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $temp = $row['password'];
        }


        return (password_verify($pawd, $temp));
    }
    function stuLogin($name, $pawd)
    {
        require 'db.php';
        $sql = "SELECT * FROM student WHERE username='$name';";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $temp = $row['password'];
        }


        return (password_verify($pawd, $temp));
    }

    function add_course($cid, $pid, $cname, $csd, $ced)
    {
        require 'db.php';
        $sql = "INSERT INTO `course`(`course_id`, `professor_id`, `name`, `start_date`, `end_date`) VALUES ('$cid','$pid','$cname','$csd','$ced')";
        mysqli_query($conn, $sql);
    }

    function add_stu_to_course($cid, $sid)
    {
        require 'db.php';
        $query = "SELECT * from student WHERE student_id='$sid'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $first = $row['first_name'];
            $last = $row['last_name'];
        }
        $sql="SELECT * FROM course WHERE course_id='$cid'";
        
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $cna = $row['name'];
        }

        $sql = "INSERT INTO `course_students`(`course_id`, `course_name`, `first_name`, `last_name`, `student_id`, `id`) 
        VALUES ('$cid','$cna','$first','$last','$sid', '')";
        mysqli_query($conn, $sql);
    }

    function add_ass($cid, $sid, $ass_name, $pe, $pp, $weight)
    {
        require 'db.php';
        
        $percent = $pe/$pp;
$percent_friendly = number_format( $percent * 100, 2 ) . '%';
        $sql = "INSERT INTO `assignments`(`course_id`, `student_id`, `assignment_name`, `weight`, `pointes_earned`, `points_possible`, `percentage`, `comments`, `due_date`,`id`) 
        VALUES ('$cid','$sid','$ass_name','$weight','$pe','$pp','$percent_friendly','','','')";
        mysqli_query($conn,$sql);
    }
function admin_check($uname){
    if ($uname=='karma'){
      
        return true;

    }
    else{
        
        return false;
    }
}

   

}
