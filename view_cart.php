<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
 
    <link rel="stylesheet" type="text/css" href="css/homepage_style.css" />
        <link rel="stylesheet" type="text/css" href="css/css1.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link rel="stylesheet" type="text/css" href="css/logout_style.css" />
        <link href="css/product_style.css" rel="stylesheet" type="text/css">
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

                                             
                                            <li><a href="Registration.php" accesskey="4" title="">Sign Up</a></li>
                                            <li><a href="Login.php" accesskey="6" title="">Login </a></li> 
                                            <li class="active"><a href="view_cart.php" accesskey="7" title="">View Cart </a></li> 
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



<div id="products-wrapper">
 <h1>View Cart</h1>
 <div class="view-cart">
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="paypal-express-checkout/process.php">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
		   $results = $mysqli->query("SELECT * FROM product_details WHERE product_id='$product_code' LIMIT 1");
		   $obj = $results->fetch_object();
		   
		    echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			echo '<div class="p-price">'.$currency.$obj->cost.'</div>';
            echo '<div class="product-info">';
			echo '<h3>'.$obj->title.' (Code :'.$product_code.')</h3> ';
            echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
            //echo '<div>'.$obj->product_desc.'</div>';
              echo '<div class="product-desc">'.$obj->artist.'<b>&nbsp;&nbsp;&nbsp;Launched in Market on :</b>'.$obj->launch_date. '</div>';
            
            echo '<div class="product-desc">'.$obj->country.'</div>';
            
			echo '</div>';
            echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);

			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->title.'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->artist.'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
			$cart_items ++;
			
        }
    	echo '</ul>';
		echo '<span class="check-out-txt">';
		echo '<strong>Total : '.$currency.$total.'</strong>  ';
		echo '</span>';
		echo '</form>';
		
    }else{
		echo 'Your Cart is empty';
	}
	
    ?>
    </div>
 
 <div style="float: right;">
     <form name="viewproductForm" action=""   method="POST">
     <input class="button" type="submit" name="placeorder" value="Place Order">
        </form>            
 </div>
  <?php
  
    
                                if (isset($_POST['placeorder'])) {
                                     echo '</br>';
                                      echo '<h1>Thank You! your order has been placed!</h1>';
                                }
                                
     ?>        
</div>
</body>
</html>
