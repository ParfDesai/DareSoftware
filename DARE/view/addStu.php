<html>
<div class="homeBack">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>
            Dare | Welcome

        </title>

        <link rel="stylesheet" href="view/style.css">
        <style>
            ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #999999;
}
            </style>
    </head>

    <body>
        <?php include 'header.php' ?>



        <!-- navigation bar-->
        <?php include 'adminNav.php' ?>


        <div class="overlay">
            <div class="container">

                <div class="stuRegi">
                    <div class="stuReg">
                        <h2>Student Sign-up</h2>

                        <form action='index.php' method="POST">
                            First name:<br>
                            <input type="text" name="firstname" placeholder="required" required=""><br>
                            Last name:<br>
                            <input type="text" name="lastname" placeholder="required" required="">

                            <br>
                            <br>
                            Phone number:<br>
                            <input type="text" name="phone">
                            <br><br>

                            Email:<br>
                            <input type="text" name="email" placeholder="fak@email.com" required="">
                            <br><br>

                            Username:<br>
                            <input type="text" name="username" placeholder="e.g. Jsmith3" required="">
                            <br><br>
                            Password:<br>
                            <input type="password" name="pwd" placeholder="password" required="">
                            Password:<br>
                            <input type="password" name="pwd-repeat" placeholder="repeat password" required="">
                            <br><br>

                            <br><input type="hidden" name="action" value="sumbitStuReg">
                            <button type="submit" name='stuReg-submit'>SUBMIT</button><br>
                        </form>
                    </div> </div> </div> </div> <div style="clear: both">
                </div>
                <!--footer-->

    </body>




    <?php include 'view/footer.php' ?>

</html>