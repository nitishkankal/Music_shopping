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
        <title>Music Store</title>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css" />

        <script>
            $(function() {
                $("#datepicker").datepicker();

            });
            $(function() {

                $("#datepicker1").datepicker();
            });
        </script>
         <script>
            function check(value)
            {
                if(value == "Search")
                {
                    document.getElementById("prod").style.display = "None";
                }
            }
        </script>

        <style>
            table {
                /*border-collapse: separate;*/
                border-spacing: 0;

            }
            table {
                border: 2px solid coral;
                border-radius: 5px;
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                padding: 2px;
                box-shadow: 15px 15px 5px #888888;

            }
            td {
                border: 1px solid blueviolet;
                border-radius: 5px;
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                padding: 2px;


            }
            tr{
                margin: 15px 0px;    
            }
        </style>

    </head>
    <body>


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
            // echo '</br>';
            // echo $username;
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
                                            <li class="active"><a href="homepage.php" accesskey="1" title="">Home</a></li>
                                            <?php
//retrieve session data

                                            if (isset($_SESSION['usertype']) &&
                                                    strcasecmp($_SESSION['usertype'], 'admin') == 0) {
                                                ?>
                                                <li><a href="Admin.php" accesskey="2" title="">Admin Menu</a></li>
                                                <?php
                                            }
                                            ?>


                                            <li><a href="Registration.php" accesskey="4" title="">Sign Up</a></li>
                                            <li><a href="Login.php" accesskey="6" title="">Login </a></li> 
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



        <div class="left_content">

            <div class="title_box">New Releases</div>
            <ul class="left_menu">
                <li class="odd"><a href="">R. Kelly - Black Panties</a></li>
                <li class="even"><a href="">Pitbull-Global Warming</a></li>
                <li class="odd"><a href="">Zager & Evans</a></li>
                <li class="even"><a href="">Cold Play</a></li>
                <li class="odd"><a href="">Randy Travis</a></li>
                <li class="even"><a href="">Pink Floyd</a></li>


            </ul>
            <div class="title_box">All time Hits</div>
            <ul class="left_menu">
                <li class="odd"><a href=""> "Never Tear Us Apart"</a></li>
                <li class="even"><a href="">"Like a Rolling Stone"</a></li>
                <li class="odd"><a href="">"Satisfaction"</a></li>
                <li class="even"><a href="">"Imagine"</a></li>
                <li class="odd"><a href="">"I Say a Little Prayer"</a></li>
                <li class="even"><a href=""> "Smells Like Teen Spirit"</a></li>


            </ul>

            <div class="title_box">What?s new</div>
            <div class="border_box">
                <div class="product_title"><a href="details.html">Call Me Maybe </a></div>
                <div class="product_img"><a href="details.html"><img src="images/callme.jpg" alt="" border="0" /></a></div>
                <div class="prod_price"><span class="reduce">3$</span> <span class="price">1$</span></div>
            </div>


        </div>
        <!-- end of left content -->

        <!---------------------------------center content -------------------------->
        <?php /*    $database_name = 'lon29101273';
          //   $link = mysql_connect("localhost", "lon29101273", "lsbmmoodle1A!");

          $link = mysql_connect("localhost", "root", "");
          mysql_select_db($database_name, $link);
          if (!$link) {
          die('Could not connect: ' . mysql_error());
          }
          $selectstatement = "select title from product_details ";
          $result = mysql_query($selectstatement, $link);
          while($row= mysql_fetch_row($result))
          {
          echo "<li class='odd'><input type='checkbox' name='title' value='$row[0]'> $row[0]</li>";
          }
         */ ?>

        <div class="center_content">
            <?php
            if (isset($_POST['search'])) {
                /* SELECT * FROM `product_details` WHERE title ='Sombodey me' and artist ='carly ray' and launch_date>'2007/02/25' and launch_date<'2011/02/27' */
                $temp = 0;
                $selectstatement = "select * from product_details where";
                if (isset($_POST['title'])) {
                    $temp = 1;
                    $title = $_POST['title'];
                    $selectstatement.=" title='" . $title . "'";
                }

                if (isset($_POST['artist']) && !empty($_POST['artist'])) {
                    $artist = $_POST['artist'];
                    if ($temp == 1) {
                        echo ' already title';
                        $selectstatement .= " and artist ='" . $artist . "'";
                    } else {
                        $selectstatement.= "artist ='" . $artist . "'";
                    }
                }

                if (isset($_POST['from']) && !empty($_POST['from'])) {
                    $fromdate = date('y-m-d', strtotime($_POST['from']));
                    if ($temp == 1) {
                        echo ' already some';
                        $selectstatement.=" and launch_date>'" . $fromdate . "'";
                    } else {
                        $selectstatement.= "launch_date >'" . $fromdate . "'";
                    }
                }
                if (isset($_POST['to']) && !empty($_POST['to'])) {
                    $todate = date('y-m-d', strtotime($_POST['to']));
                    if ($temp == 1) {
                        echo ' already thing';
                        $selectstatement.=" and launch_date < '" . $todate . "'";
                    } else {
                        $selectstatement.= "launch_date <'" . $todate . "'";
                    }
                }


                $database_name = 'lon29101273';
                //   $link = mysql_connect("localhost", "lon29101273", "lsbmmoodle1A!");

                $link = mysql_connect("localhost", "root", "");
                mysql_select_db($database_name, $link);
                if (!$link) {
                    die('Could not connect: ' . mysql_error());
                }

                echo 'Connected successfully';
                echo "<br/>";



                echo $selectstatement;
                echo "<br/>";


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
            <div class="center_search_bar"  >         
                <form name="Form" action=""   method="POST">
                    <div style=" width: 90%">  
                        <div style=" width: 100%">
                            <label >Title</label>
                            <label >Artist</label>
                            <label >Launch Date</label>
                        </div>

                        <div  style=" width: 100%">
                            <input  type="text"  size="20" maxlength="40"   name="title">

                            <input  type="text"  size="20" maxlength="40"   name="artist">
                            <label >From</label>

                            <input type="text" size="15" name="from" id="datepicker" placeholder="Click for Date"class="inp" readonly >
                            <label >To</label>
                            <input type="text" size="15" name="to" id="datepicker1" placeholder="Click for Date"class="inp" readonly >
                        </div>
                    </div>
                    <div  style=" margin-top: -50px ">
                        <input class="button" style="float: right;" name ="search" value="Search" type="submit" onclick="check(this.value);"> 
                    </div>    
                </form>
            </div>


            <div class="center_title_bar" style=" margin-bottom: 20px;font-size:  24px; ">Products </div> 


            <div id="products-wrapper">

                <div class="products">

<?php
include_once("config.php");
?>
<?php
//current URL of the Page. cart_update.php redirects back to this URL
$current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

$results = $mysqli->query("SELECT * FROM product_details ");
if ($results) {

    //fetch results set as object and output HTML
    while ($obj = $results->fetch_object()) {
        echo '<div class="product" id="prod">';
        echo '<form method="post" action="cart_update.php">';
        //echo '<div class="product-thumb"><img src="images/'.$obj->product_img_name.'"></div>';
        echo '<div class="product-content"><h3>' . $obj->title . '</h3>';
        echo '<div class="product-desc">' . $obj->artist . '<b>&nbsp;&nbsp;&nbsp;Launched in Market on :</b>' . $obj->launch_date . '</div>';

        echo '<div class="product-desc">' . $obj->country . '</div>';
        echo '<div class="product-info">';
        echo 'Price ' . $currency . $obj->cost . ' | ';
        echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
        echo '<button class="add_to_cart">Add To Cart</button>';
        echo '</div></div>';
        echo '<input type="hidden" name="product_code" value="' . $obj->product_id . '" />';
        echo '<input type="hidden" name="type" value="add" />';
        echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
        echo '</form>';
        echo '</div>';
    }
}
?>
                </div>

                <div class="shopping-cart">
                    <h2>Your Shopping Cart</h2>
                    <?php
                    if (isset($_SESSION["products"])) {
                        $total = 0;
                        echo '<ol>';
                        foreach ($_SESSION["products"] as $cart_itm) {
                            echo '<li class="cart-itm">';
                            echo '<span class="remove-itm"><a href="cart_update.php?removep=' . $cart_itm["code"] . '&return_url=' . $current_url . '">&times;</a></span>';
                            echo '<h3>' . $cart_itm["name"] . '</h3>';
                            echo '<div class="p-code">P code : ' . $cart_itm["code"] . '</div>';
                            echo '<div class="p-qty">Qty : ' . $cart_itm["qty"] . '</div>';
                            echo '<div class="p-price">Price :' . $currency . $cart_itm["price"] . '</div>';
                            echo '</li>';
                            $subtotal = ($cart_itm["price"] * $cart_itm["qty"]);
                            $total = ($total + $subtotal);
                        }
                        echo '</ol>';
                        echo '<span class="check-out-txt"><strong>Total : ' . $currency . $total . '</strong> '
                        . ' <a style=" color: #009999; font-size: 15px; text-decoration: underline " href="view_cart.php">Check-out!</a></span>';
                        echo '<span class="empty-cart">'
                        . '<a style=" color: #009999; font-size: 15px; text-decoration: underline " href="cart_update.php?emptycart=1&return_url=' . $current_url . '">Empty Cart</a></span>';
                    } else {
                        echo 'Your Cart is empty';
                    }
                    ?>
                </div>

            </div>



            <!-- 
                    <?php /*
                      $database_name = 'lon29101273';
                      //   $link = mysql_connect("localhost", "lon29101273", "lsbmmoodle1A!");

                      $link = mysql_connect("localhost", "root", "");
                      mysql_select_db($database_name, $link);
                      if (!$link) {
                      die('Could not connect: ' . mysql_error());
                      }

                      //    echo 'Connected successfully';
                      // echo "<br/>";


                      $selectstatement = "select * from product_details ";
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
                      <th>Purchase</th>
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
                      echo "<td>" . ' <a href=" "><img src="../Music_shopping/images/addcart.gif" alt="" /></a>' . "</td>";
                      echo "</tr>";
                      }

                      echo "</table>";
                      } else {
                      echo "Query returned 0 rows";
                      }
                      mysql_close($link);
                     */ ?>
            
            -->

            <div class="center_title_bar" style=" margin: 30px ;font-size:  24px" > Up comings Products</div>
            <div class="prod_box">
                <div class="top_prod_box"></div>
                <div class="center_prod_box">
                    <div class="product_title"><a href="details.html">Reflections</a></div>
                    <div class="product_img"><a href="details.html"><img src="images/reflection.jpg" alt="" border="0" /></a></div>
                    <div class="prod_price"><span class="reduce">30$</span> <span class="price">20$</span></div>
                </div>
                <div class="bottom_prod_box"></div>
                <div class="prod_details_tab">   <a href="" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif"  alt="" border="0" class="left_bt" /></a> <a href="" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" border="0" class="left_bt" /></a>  

                </div>
            </div>


            <div class="prod_box">
                <div class="top_prod_box"></div>
                <div class="center_prod_box">
                    <div class="product_title"><a href="details.html">Let It Go-Frozan</a></div>
                    <div class="product_img"><a href="details.html"><img src="images/frozan.jpg" alt="" border="0" /></a></div>
                    <div class="prod_price"><span class="price">20$</span></div>
                </div>
                <div class="bottom_prod_box"></div>
                <div class="prod_details_tab">   <a href="" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" border="0" class="left_bt" /></a>    </div>
            </div>


            <div class="prod_box">
                <div class="top_prod_box"></div>
                <div class="center_prod_box">
                    <div class="product_title"><a href="details.html">We Are One (Ole Ola) </a></div>
                    <div class="product_img"><a href="details.html"><img src="images/pitbull.jpg" alt="" border="0" /></a></div>
                    <div class="prod_price"><span class="reduce">30$</span> <span class="price">270$</span></div>
                </div>
                <div class="bottom_prod_box"></div>
                <div class="prod_details_tab">   <a href="" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" border="0" class="left_bt" /></a>   </div>
            </div>





        </div>
        <!-- end of center content -->

        <div class="right_content">




            <!--     <div class="shopping_cart">
                    <div class="cart_title">Shopping cart</div>
                    <div class="cart_details"> 3 items <br />
                        <span class="border_cart"></span> Total: <span class="price">350$</span> </div>
                    <div class="cart_icon"><a href="bookorder.jsp" title="header=[Checkout] body=[&nbsp;] fade=[on]"><img src="images/shoppingcart.png" alt="" width="48" height="48" border="0" /></a></div>
                </div>
    end of center content --> 


            <div class="title_box">Special Products</div>
            <div class="border_box">
                <div class="product_title"><a href="details.html">Sex and Love (Deluxe)</a></div>
                <div class="product_img"><a href="details.html"><img src="images/sexlove.jpg" alt="" border="0" /></a></div>
                <div class="prod_price"><span class="reduce">25.89$</span> <span class="price">15.25$</span></div>
                <a href=" "><img src="../Music_shopping/images/addcart.gif" alt="" /></a>


                <div class="product_title"><a href="details.html">Shakira</a></div>
                <div class="product_img"><a href="details.html"><img src="images/shakira.jpg" alt="" border="0" /></a></div>
                <div class="prod_price"><span class="reduce">15.89$</span> <span class="price"> $11.88</span></div>
                <a href=" "><img src="../Music_shopping/images/addcart.gif" alt="" /></a>

                <div class="product_title"><a href="details.html">Formula Vol. 2 (Deluxe Edition)</a></div>
                <div class="product_img"><a href="details.html"><img src="images/romio.jpg" alt="" border="0" /></a></div>
                <div class="prod_price"><span class="reduce">20$</span> <span class="price">$13.99</span></div>
                <a href=" "><img src="../Music_shopping/images/addcart.gif" alt="" /></a>
            </div>



        </div>
        <!-- end of right content -->


    </body>
</html>