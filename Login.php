<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Music Shopping</title>

        <link rel="stylesheet" type="text/css" href="css/login_style.css" />
        <script src="js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
        <script>
            function check(value)
            {
                if (value == 'admin')
                {
                    document.getElementById("register").style.display = "None";
                }
                else if (value == 'user')
                {
                    document.getElementById("register").style.display = "block";
                }
            }
        </script>
        <style>
            @import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
            body {
                background: #563c55 url(images/blurred.jpg) no-repeat center top;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
            }
            .container > header h1  {
                color: #fff;
                text-shadow: 0 1px 1px rgba(0,0,0,0.7);
            }

            .container > header h2 {
                font-size: 24px;
                font-weight: 300;
                margin: 0;
                padding: 15px 0 5px 0;
                color: #fff;
                font-family: Cambria, Georgia, serif;
                font-style: italic;
                text-shadow: 0 1px 1px rgba(255,255,255,0.6);
            }
            .container > header h3 {
                font-size: 24px;
                font-weight: 300;
                margin: 0;
                padding: 15px 0 5px 0;
                color: #fff;
                font-family: Cambria, Georgia, serif;
                font-style: italic;
                text-shadow: 0 1px 1px rgba(255,255,255,0.6);
            }
        </style>

    </head>
    <body>
        <?php
        $database_name = 'lon29101273';
        $link = mysql_connect("localhost", "root", "");
        mysql_select_db($database_name);
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
      //  echo 'Connected successfully';
        if (isset($_POST['submit'])) {
            $statement1 = "select * from user_details where username='$_POST[login]' and pwd='$_POST[password]'";
            echo $statement1;
            $result1 = mysql_query($statement1);
            if (mysql_num_rows($result1) > 0) {
                $row = mysql_fetch_array($result1);
                if ($row[10] == 'user') {
                    $_SESSION['usertype'] = 'user';
                    $_SESSION['username'] = $_POST['login'];
                    $_SESSION['password'] = $_POST['password'];

                    header("Location:homepage.php ");
                } else if ($row[10] == 'admin') {
                    $_SESSION['usertype'] = 'admin';
                    $_SESSION['username'] = $_POST['login'];
                    $_SESSION['password'] = $_POST['password'];
                    header("Location: Admin.php");
                }
            }
        }
        ?>
       <!-- <div id="Aside">
            <button id="admin" value="admin" onclick="check(this.value)">Admin</button>
            <button id="user" value="user" onclick="check(this.value)">User</button>
        </div>
       -->
        <div class="container">



            <header>

                <h1>Online <strong>Music </strong> Shopping</h1>
                <h3> Login Form </h3>



                <div class="support-note">
                    <span class="note-ie">Sorry, only modern browsers.</span>
                </div>

            </header>

            <section class="main">
                <form class="form" action="" method="POST">
                    <p class="clearfix">
                        <label for="login">Username</label>
                        <input type="text" name="login" id="login" placeholder="Username">
                    </p>
                    <p class="clearfix">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password"> 
                    </p>
                    <p class="clearfix">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </p>
                    <p class="clearfix">
                        <input type="submit" name="submit" value="Sign in">
                    </p>

                    <p class="forgot">Forgot your password? <a href="Login.php">Click here to reset it.</a></p>

                    <p class="regiser" id="register">Not Registered Yet..? <a href="Registration.php">Go Registration.</a></p>
                </form>​
            </section>

        </div>
    </body>
</html>