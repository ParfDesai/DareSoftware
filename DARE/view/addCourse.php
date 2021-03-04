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



        <!-- navigation bar-->
        <?php include 'adminNav.php' ?>


        <div class="overlay">
            <div class="container">

                <div class="stuRegi">
                    <div class = "stuReg">
                   
                        <h2>Course Sign-up</h2>

                        <form action='index.php' method="POST">
                            Course ID:<br>
                            <input type="text" name="course_id" placeholder="required" required=""><br>
                            Course Name:<br>
                            <input type="text" name="course_name" placeholder="required" required="">

                            <br>
                            <br>
                            Professor ID:<br>
                            <input type="text" name="professor" placeholder="000000"><span> <br></span>
                            <br><br>


                            Start Date:<br>
                            <input type="text" name="start_date" placeholder="2019-02-15" required="">
                            <br><br>
                            End Date:<br>
                            <input type="text" name="end_date" placeholder="2019-06-15" required="">

                            <br><br>

                            <br><input type="hidden" name="action" value="add_course">
                            <button type="submit" name='add_course'>SUBMIT</button><br>
                        </form>

                   
                </div>
            </div>





        </div>

        <div style="clear: both"></div>
        <!--footer-->

    </body>




    <?php include 'view/footer.php' ?>

</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
