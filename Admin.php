<!DOCTYPE html>
<?php
session_start();
?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin page</title>

        <link rel="stylesheet" type="text/css" href="css/homepage_style.css" />
        <link rel="stylesheet" type="text/css" href="css/css1.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/logout_style.css" />
        <link href="css/product_style.css" rel="stylesheet" type="text/css">

    </head>
    <body style="background-color: cyan">


        <!-- Start of Page Title -->
        <div id="page_title">
            <h1><span>Universal Music Store</span></h1>

            <!-- End of Page Title -->

        </div>

        <?php
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location:Login.php ");
        }
        if (isset($_POST['login'])) {

            header("Location:Login.php ");
        }
        ?>
        <?php
//retrieve session data
        //$username = $_SESSION['username'];

        if (isset($_SESSION['username'])) {
       
            ?>     


            <div id ="logoutright" class="logout">

                <form  class="form" method="post" action="">
                    <p class="clearfix">
                        <label for="login">Welcome Mr. <?php echo $_SESSION['username']; ?> </label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="logout" name="logout">
                    </p>

                </form>

            </div> 

            <?php
        } else {
            ?>

            <div id ="logoutright" class="logout">

                <form  class="form" method="post" action="">
                    <p class="clearfix">
                        <label for="login">Dear User Please Login</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" value="login" name="login">
                    </p>

                </form>

            </div> 
        <?php }
        ?>
        <div id="header_image"><span>&nbsp;</span></div>

      <div id="header_image1"><span>&nbsp;</span></div>
        <!-- Start of Page Header -->
        <div id="header_container_left">
            <div id="header_container_right">
                <div id="header_container">
                    <div id="page_header">

                        <div id="wrapper" >
                            <div id="header-wrapper">
                                <div id="header" class="container">
                                    <div id="menu">
                                        <ul>
                                            <li ><a href="homepage.php" accesskey="1" title="">Home</a></li>
                                            <?php
//retrieve session data

                                             if (isset($_SESSION['usertype']) && 
                                                    strcasecmp($_SESSION['usertype'], 'admin')==0) {
                                                ?>
                                                <li class="active"><a href="Admin.php" accesskey="2" title="">Admin Menu</a></li>
                                                <?php
                                            }
                                            ?>
                                            <li><a href="view_cart.php" accesskey="7" title="">View Cart </a></li> 
                                            <li><a href="Contact_us.php" accesskey="8" title="">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <section class="main" style="margin:0 auto; ">
            <div style="margin:0 auto;text-align: left; ">

                <h1>Welcome   <?php
//retrieve session data
                    //$username = $_SESSION['username'];

                    if (isset($_SESSION['username'])) {

                        echo $_SESSION['username'];
                    }
                    ?>     
                    !!!!</h1>

                <table id="content" >

                    <tr>        
                        <td  > <center><font size="3" style="  font-size: 24px"><a style="color: white;"
                                                                               href="add_user.php"> Create/Add New users</a></font></center></td>        
                    </tr>


                    <tr>        
                        <td  > <center><font size="3" style="color: wheat  ; font-size: 24px"><a style="color: white;" href="Add_product.php"> Add new product</a></font></center></td>        
                    </tr>

                    <tr>        
                        <td  > <center><font size="3"  style="color: wheat  ; font-size: 24px"><a style="color: white;" href="delete_product.php"> Delete product</a></font></center></td>        
                    </tr>
                </table>     
            </div>
        </section>


    </body>
</html>
