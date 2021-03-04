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
        <?php include 'header.php'; ?>
        <?php include 'staffNav.php';
@session_start();
        $c = $_SESSION['curCourse'];
        function add_ass($cid, $sid, $ass_name, $pe, $pp, $weight)
        {
            require './includes/db.php';

            $percent = $pe / $pp;
            $percent_friendly = number_format($percent * 100, 2) . '%';
            $sql = "INSERT INTO `assignments`(`course_id`, `student_id`, `assignment_name`, `weight`, `pointes_earned`, `points_possible`, `percentage`, `comments`, `due_date`) 
     VALUES ('$cid','$sid','$ass_name','$weight','$pe','$pp','$percent_friendly','','')";
            mysqli_query($conn, $sql);
        }

        $cid = Util::getClassId($c);
      

        ?>

        <!-- add grade\-->


<div class="stuRegi">
    <div class="stuReg">

    


        <form action='index.php' method="POST">
            Course Name:
            <input name="class" type='text' value="<?php echo $c ?>">

            <?php
        @session_start();
            $temp = $_SESSION['sid'];

            $mysqli = new MySQLi('localhost', 'root', '', 'dare');




            ?>
            <br><br><br>
            Studnent ID: <select name='student' id='student'>

                <?php




                $results = $mysqli->query("SELECT first_name, last_name,student_id FROM course_students WHERE course_id='$cid'");

                while ($rows = $results->fetch_assoc()) {
                    $first = $rows['first_name'];
                    $last = $rows['last_name'];
                    $id = $rows['student_id'];
                    echo "<option value='$id'>$first $last</option>";
                }
                ?>
            </select> <br>
            <br>


            Assingment:<br>
            <input type="text" name="ass_name" placeholder="" required="">
            <br><br>
            Points Earned:<br>
            <input type="number" name="pe" placeholder="" required="">

            <br><br>
            Points Possible:<br>
            <input type="number" name="pp" placeholder="" required="">

            <br><br>


            <br><br>
            <br><input type="hidden" name="action" value="add_ass">
                        <button type="submit" name='add_ass'>SUBMIT</button><br>
        </form>

        </div>
</div>














</div>


<!--footer-->

</body>


<?php ?>
















</html>