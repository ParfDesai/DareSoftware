
<!DOCTYPE html>
<html>

<?php
  
  $courseId = $_SESSION['course'];
?>


    <head>
      <div class="homeBack">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>
            Dare | Welcome

        </title>


        <link rel="stylesheet" href="./view/style.css">

<body>
  <?php include 'header.php'; ?>


  <?php include 'staffNav.php'; ?>





<table id = "class">

    <tr>
        <th>First</th>
        <th>Last</th>
        <th>Studenet ID</th>
        
    </tr>



<?php include("./includes/functions.php"); ?>

<?php 

$stu = getStudents($courseId);
foreach($stu as $stus)
{
    echo get_table_row_elements($stus);
}





?>



  </table>
  

  <?php include 'footer.php'; ?>
</body>
</div>

<!--footer-->




</html>


