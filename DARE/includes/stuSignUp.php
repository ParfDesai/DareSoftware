<?php

if(isset($_POST['stuReg-submit'])){
    require 'db.php';
    
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $user=$_POST['username'];
    $pwd=$_POST['pwd'];
    $pwdr=$_POST['pwd-repeat'];
    
    if (empty($fname) || empty($lname) || empty($email) || empty($user) || empty($pwd) || empty($pwdr)) {
        header("Location:../view/stuReg.php?error=emptyfields&user" . $user . "&email" . $email);
        exit();
    } 
    elseif($pwd!=$pwdr){
       header("Location:../view/stuReg.php?error=passwordmismatch&user" . $user . "&email" . $email);
       exit();
       
    } 
    else{
        $sql="SELECT username FROM students WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
             header("Location:../view/stuReg.php?error=sqlerror&user" . $user . "&email" . $email);
       exit(); 
        }
     else{
            mysqli_stmt_bind_param($stmt, "s",$user);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result_check= mysqli_stmt_num_rows($stmt);
            if($result_check>0){
                header("Location:../view/stuReg.php?error=usertaken&email" . $email);
       exit();  
            }
            else{
                $hashpwd= password_hash($pwd, PASSWORD_DEFAULT);
                $sql="INSERT INTO students (first, last, username,password,email,phone,token) VALUES (?,?,?,?,?,?,'')";
                mysqli_stmt_bind_param($stmt, "ssssss",$fname,$lname,$user,$hashpwd,$email,$phone);
            mysqli_stmt_execute($stmt);
             header("Location:../view/studentLogin.php?signup=success");
       exit();
            
            }
     }
    } 
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    }
    else{
        header("Location:../view/stuReg.php?");
    }

