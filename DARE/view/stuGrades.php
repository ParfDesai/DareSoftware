
<!DOCTYPE html>
<html>

<?php
  $stuId = $_GET["id"];
  $courseId = $_GET["courseId"];
?>


    <head>
      <div class="homeBack">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>
            Dare | Welcome

        </title>


        <link rel="stylesheet" href="../view/style.css">

<body>
  <?php include 'header.php'; ?>


  <?php include 'stuNav.php'; ?>





<table id = "class">

    <tr>
        <th>Assignment</th>
        <th>Points Earned</th>
        <th>Points Possible</th>
     
        <th> Percentage</th>
    </tr>



<?php include("../includes/functions.php"); ?>

<?php $stuAssignments = get_Assignments($stuId, $courseId );
      $pointsEarned = 0;
      $pointsPossible = 0;
     foreach($stuAssignments as $assignments)
    {
      echo get_table_row_elements($assignments);
      $pointsEarned += $assignments[1];
      $pointsPossible += $assignments[2];
    }

?>



  </table>
  <tr>
    <table id = "class">
    <th>Cummulative Grade </th>
    <th> Total Points </th>
    <th> Percentage </th>
    </tr>
    <tr>
    <td>
        <?php
          $percentage = round(($pointsEarned/$pointsPossible) * 100, 2) . "%";
          echo calculate_grade($percentage);
        ?>
    </td>
    <td>
        <?php
          echo $pointsEarned . "/" . $pointsPossible;
        ?>
    </td>
    <td>
        <?php
          echo round(($pointsEarned/$pointsPossible) * 100, 2) . "%";
        ?>
    </td>
    </tr>
  </table>

  <?php include 'footer.php'; ?>
</body>
</div>

<!--footer-->




</html>


<?php

/*

 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.

*/
