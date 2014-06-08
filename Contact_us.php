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

<title>Contact_Me</title>

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
                                            <li  ><a href="homepage.php" accesskey="1" title="">Home</a></li>
                                            <?php
//retrieve session data

                                         if (isset($_SESSION['usertype']) && 
                                                    strcasecmp($_SESSION['usertype'], 'admin')==0) {
                                                ?>
                                                <li><a href="Admin.php" accesskey="2" title="">Admin Menu</a></li>
                                                <?php
                                            }
                                            ?>

                                             
                                            <li><a href="Registration.php" accesskey="4" title="">Sign Up</a></li>
                                            <li><a href="Login.php" accesskey="6" title="">Login </a></li> 
                                            <li><a href="view_cart.php" accesskey="7" title="">View Cart </a></li> 
                                            <li class="active"><a href="Contact_us.php" accesskey="8" title="">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<div>    <section class="main" style="margin:0 auto; padding: 10px ">
            <div style="margin:0 auto;text-align: left; ">
                
             <h1>Contact Us!!!</h1>   
              <table id="content" style="margin: 0 auto;  border-spacing: 10px;"  >

                <tr>  
                    <td>
                        <div >
                            <h2> Contact Information</h2>
                        </div>
                        <p>
                            Thank you for your interest in Universal Music showroom , do you find Universal Music showroom .com interesting
                            and Different? Or want to leave a feedback?
                        </p>
                      </td>
                  </tr>
                    <tr>
                        <td>
                        <h3 >Send your feedback</h3>
                        <div >
                            <p>London School of Business and Management<br/>
                              Dilke House,<br/>
                              1 Malet St, London WC1E 7JN,<br/> United Kingdom<br/>
                            Phone: +44 20 7078 8840<br/>
                             Fax : +91-40-6653 1413<br/><br/>
                              <span >91-44-4245-4444</span>
                            </p>
                        </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <h3>
                            Support services</h3>
                        <div >
                            <p >
                               <a href="mailto:support@Universal Music showroom .com">support@Universal Music showroom .com</a>
                               <span>+91-9790905588</span></p>
                            <p>(9:30am to 8:30pm on all days)</p>
                        </div>
                         </td>
                    </tr>

                     <tr>
                        <td>
                        <h3>
                            Career opportunities</h3>
                        <div >
                            <p ><a href="mailto:jobs@Universal Music showroom .com">jobs@Universal Music showroom .com</a></p>
                        </div>
                         </td>
                    </tr>

                    <tr>
                        <td>
                        <h3>
                            Game owners / Game organisers want to sell the Game</h3>
                        <div >
                            <p >
                               <a href="mailto:sell@Snake_and_Ladders.com">sell@Universal Music showroom .com</a>
                                or +91-9790909911

                            </p>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <h3>To advertise in the site</h3>
                        <p><a href="mailto:advertise@Snake_and_Ladders.com">advertise@Universal Music showroom .com</a>
                                91-44-4245-4444 
                        </p>
                       
                         </td>
                    </tr>


              </table>
            </div>
        </section>
</div>
      <br/>
<br/>
<img id="footer" src="images/bg-footer.jpg" width="2000" height="241">       

</body>
</html>