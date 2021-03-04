<!DOCTYPE html>
<html>


    <head>
        <div class="homeBack">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="style.css">

</head>

    <?php include 'stuNav.php' ?>

<body>
  <?php
    session_start();
    require '../includes/db.php';
    include("../includes/functions.php");

    $stuId = $_SESSION['sid'];
    //Get courses
    $sql = "SELECT course_name, course_id FROM course_students WHERE student_id=$stuId";
            $results = mysqli_query($conn, $sql);
            $rows = $results -> fetch_all();

    //Get names of courses and ids into arrays
    $courseNames = [];
    $courseIds = [];
    $length = count($rows);
    for($i = 0; $i < $length; $i++)
    {
      array_push($courseNames, $rows[$i][0]);
      array_push($courseIds, $rows[$i][1]);
    }

    //Get percentages in each course and put into array
    $percentages = [];
    foreach($courseIds as $id)
    {
      $stuAssignments = get_Assignments($stuId, $id );
            $pointsEarned = 0;
            $pointsPossible = 0;
           foreach($stuAssignments as $assignments)
          {
            $pointsEarned += $assignments[1];
            $pointsPossible += $assignments[2];
          }
          $percent = round(($pointsEarned/$pointsPossible) * 100, 2) . "%";
          array_push($percentages, $percent);

    }
    //Get grades for each course and put into array
    $grades = [];
    foreach($percentages as $percent)
    {
      $grade = calculate_grade($percent);
      array_push($grades, $grade);
    }

  ?>
    <table id="class">

        <tr>
            <th> Class </th>
            <th> Percentage </th>
            <th> Final Grade </th>
        </tr>

        <?php
          for($i = 0; $i < $length; $i++)
          {
            $tableRow = "<tr> <td>" . $courseNames[$i] . "</td> <td>" . $percentages[$i] . "</td> <td>" . $grades[$i] . "</td> </tr>";
            echo $tableRow;
          }

        ?>

    </table>
<?php include 'footer.php' ?>


</body>


</div>

</html>
