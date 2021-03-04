<!DOCTYPE html>
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
    <?php include 'stuNav.php'; ?>
<?php
$grade='null';
@session_start();
$temp=$_SESSION['sid'];
if(array_key_exists('calcGrade', $_POST)) { 
   
    $te = filter_input(INPUT_POST, 'points_e');
    $tp=filter_input(INPUT_POST, 'points_p' );
    $calss=filter_input(INPUT_POST, 'class');
$grade = getPE($temp,$calss,$te,$tp);
   
} 
 




$mysqli= NEW MySQLi('localhost','root','','dare');
$results=$mysqli->query("SELECT course_name FROM course_students WHERE student_id='$temp'");
?>

    <body>
        <div class="stuRegi">
            <div class= "stuReg">
         
          <form method="post" > 
        Course Name: <select name="class" id='class'>
       
       <?php
         while($rows=$results->fetch_assoc())
{
            $class_name = $rows['course_name'];
            echo"<option value='$class_name'>$class_name</option>";
}
       ?>
        </select>

           <br>
           <br>
           <br>
           
           points earned:
              <input type="number" id='pe' name="points_e"  placeholder=""  ><span> <br></span>
 
        <br>
        <br>
        <br>
        
            Points Possible:
               <input type="number" id='pp' name="points_p" placeholder="" required="" >
         
        <br>   
        <br>
        <br>              

        <input type="submit" name="calcGrade"
                class="button" value="calcGrade" > 
               
            
        <br> 

</form>
            
       
<p>Grade: <?php if(!($grade=='null')) {
    echo round($grade*100,2)."%";}
    ?><p>
</div>
</div>



</body>
</div>


<!--footer-->
<?php include 'footer.php'; 


function getPE ($sid, $cname, $pte,$ptp){
   
   require './includes/db.php';
   require './includes/functions.php';
       
            
           
           $sql ="SELECT course_id FROM course WHERE name='$cname';";
           $result = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
               $cid = $row['course_id'];
           
   }
   
   $stuAssignments = get_Assignments($sid, $cid );
         $pointsEarned = $pte;
         $pointsPossible = $ptp;
        foreach($stuAssignments as $assignments)
       {
         
         $pointsEarned += $assignments[1];
         $pointsPossible += $assignments[2];
       }
       return $pointsEarned/$pointsPossible;
   }

       ?>
    
</html>