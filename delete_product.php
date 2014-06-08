
<!DOCTYPE html>

<?php
session_start();
?>
<html>
    <head>
  <link rel="stylesheet" type="text/css" href="css/homepage_style.css" />
        <link rel="stylesheet" type="text/css" href="css/css1.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/logout_style.css" />
        <link href="css/product_style.css" rel="stylesheet" type="text/css">


        <script type="text/javascript">
            function clearThis(target)
            {
                target.value = "";
            }
        </script>

        <title>Add Products</title>

    </head>

    <body bgcolor="cyan">



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
                                                <li><a href="Admin.php" accesskey="2" title="">Admin Menu</a></li>
                                                <?php
                                            }
                                            ?>

                                        
                                                <li><a href="add_user.php" accesskey="4" title="">Add user</a></li>
                                            <li ><a href="Add_product.php" accesskey="4" title="">Add product</a></li>
                                            <li class="active"> <a href="delete_product.php" accesskey="6" title="">Delete Product </a></li> 
                                             
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

                <h1>Delete existing product!!!!</h1>
                <form name="deleteproductForm" action=""   method="POST">
                    <input type="hidden" name="expid" value="%% EXPID %%" />
                    <table id="content" >

                        <tr>        
                            <td colspan="3"> <center><font size="3"><b> Enter the product details to delete </b></font></center></td>        
                        </tr>

                        <tr>
                            <td width="50%">Product Id:<b><font color="red">*</font></b><br></td>
                            <td >
                                <input  type="text"  size="25" maxlength="40"   name="product_id">
                                <span   style="border:0;  float: right  "><input class="button" name ="show" value="show" type="submit"></span>

                            </td>
                        </tr>


                        <tr>
                            <td colspan="2"><center>Chosen Product Information is:<br>

                            <?php
                            if (isset($_POST['show'])) {
                                $database_name = 'lon29101273';
                                //   $link = mysql_connect("localhost", "lon29101273", "lsbmmoodle1A!");

                                $link = mysql_connect("localhost", "root", "");
                                mysql_select_db($database_name, $link);
                                if (!$link) {
                                    die('Could not connect: ' . mysql_error());
                                }

                                // echo 'Connected successfully';
                                // echo "<br/>";
                                $product_id = $_POST['product_id'];

                                $selectstatement = "select * from product_details where product_id='$product_id'";
                                //    echo $selectstatement;
                                // echo "<br/>";


                                $result = mysql_query($selectstatement, $link);



                                if (mysql_num_rows($result) != 0) {

                                    echo "<table border='1'>
                                        <tr>
                                        <th>product_id</th>
                                        <th>title</th>
                                        <th>artist</th>
                                        <th>launch_date</th>
                                        <th>country</th>
                                        <th>language</th>
                                        <th>cost</th>
                                        </tr>";
                                    ;


                                    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['product_id'] . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['artist'] . "</td>";
                                        echo "<td>" . $row['launch_date'] . "</td>";
                                        echo "<td>" . $row['country'] . "</td>";
                                        echo "<td>" . $row['language'] . "</td>";
                                        echo "<td>" . $row['cost'] . "</td>";
                                        echo "</tr>";
                                    }

                                    echo "</table>";
                                } else {
                                    echo "Query returned 0 rows";
                                }
                                mysql_close($link);
                            }
                            ?>

                            <?php
                            if (isset($_POST['submit'])) {
                                $database_name = 'lon29101273';
                                //   $link = mysql_connect("localhost", "lon29101273", "lsbmmoodle1A!");

                                $link = mysql_connect("localhost", "root", "");
                                mysql_select_db($database_name);
                                if (!$link) {
                                    die('Could not connect: ' . mysql_error());
                                }
                                echo 'Connected successfully......';
                                echo '</br>';
                                $product_id = $_POST['product_id'];
                                echo 'Product id entered is=> ' . $product_id;
                                echo '</br>';

                                $deletestatement = "delete from product_details where product_id='$product_id' ";
                                //echo $deletestatement;
                                if ($product_id)
                                  $result = mysql_query($deletestatement) or trigger_error("Sorry an error occurred and the account could not be deleted");
                                mysql_close($link);
                                
                                  
                                if ($result && isset($result)) {
                                    echo '</br>';
                                    echo 'Item deleted sucessfully';
                                } else {
                                    echo 'Please Check once that You have entered product id or entered correct id';
                                }
                            }
                            ?>
                        </center><br/></td>
                        <p name="prductdetails"> </p>
                        </tr>



                        <tr>

                            <td colspan="2" > <input class="button" type="submit" name="submit" value="Delete" > </td>


                        </tr>

                    </table>
                </form>
            </div>
        </section>
        <br/>
        <br/>
        <img id="footer" src="images/bg-footer.jpg" width="2000" height="241">
    </body>
</html>