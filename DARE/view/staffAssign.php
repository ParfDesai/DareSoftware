<html>
 <div class="homeBack">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>
        Dare | Welcome

    </title>

     <link rel="stylesheet" href="view/style.css">
</head>

<body>
 <?php include 'header.php' ?>
 <?php include 'staffNav.php'; 
 
  
 ?>
  
    <!-- add grade\-->
   
    <div class="stuRegi">
        <div class="stuReg">

        
    
     
    
    <form action='index.php' method="POST">
           Course Name: <select name="class" id='class'>
       
       <?php
       @session_start();
       $temp=$_SESSION['sid'];
       $mysqli= NEW MySQLi('localhost','root','','dare');
       $results=$mysqli->query("SELECT name FROM course WHERE professor_id='$temp'");
       
         while($rows=$results->fetch_assoc())
{
            $class_name = $rows['name'];
            echo"<option  value='$class_name'>$class_name</option>";
}
       ?>
       </select><br>
           <br><br><br>
           <?php
          
           ?>
              
  <br><input type="hidden" name="action" value="giveGrade">
                        <button type="submit" name='giveGrade'>SUBMIT</button><br> 
   </form>
   
   </div>
    </div>
   
   
   
   
   
   
   
   
          
   
      

      
        
        </div>
     
       
 <!--footer-->
  
    </body>
    
    
    
    
<?php include 'view/footer.php' ?>
  
</html>
