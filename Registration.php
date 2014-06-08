
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

        <script type="text/javascript" src="registration_form_validation.js"></script>

        <script type="text/javascript">
            function clearThis(target)
            {
                target.value = "";
            }
        </script>

        <title>Registration Page</title>

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
                                                    strcasecmp($_SESSION['usertype'], 'admin') == 0) {
                                                ?>
                                                <li><a href="Admin.php" accesskey="2" title="">Admin Menu</a></li>
                                                <?php
                                            }
                                            ?>


                                            <li class="active"><a href="Registration.php" accesskey="4" title="">Sign Up</a></li>
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



        <?php
        if (isset($_POST['submit'])) {
            $database_name = 'lon29101273';
            //   $link = mysql_connect("localhost", "lon29101273", "lsbmmoodle1A!");
            $link = mysql_connect("localhost", "root", "");
            mysql_select_db($database_name);
            if (!$link) {
                die('Could not connect: ' . mysql_error());
            }
            echo 'Connected successfully';

            $statement = "INSERT INTO user_details values('"
                    /* @var $_POST type */
                    . $_POST['firstname'] . "','"
                    . $_POST['lastname'] . "','"
                    . $_POST['loginName'] . "','"
                    . $_POST['password'] . "','"
                    . $_POST['email'] . "','"
                    . $_POST['country'] . "','"
                    . $_POST['address'] . "','"
                    . $_POST['phoneno'] . "','"
                    . $_POST['secque'] . "','"
                    . $_POST['secans'] . "','"
                    . "user')";

            $result = mysql_query($statement);

            if ($result && isset($result)) {
                $_SESSION['usertype'] = 'user';
                $_SESSION['username'] = $_POST['loginName'];
                $_SESSION['password'] = $_POST['password'];
                header("Location:homepage.php");
            } else {
                echo 'Please enter all required data, Product is not added';
            }
        }
        ?>



        <section class="main" style="margin:0 auto; ">
            <div style="margin:0 auto;text-align: left; ">

                <h1>Register To Shop!!!!</h1>
                <form name="registrationForm" action="" onSubmit="return validation();" method="POST">
                    <input type="hidden" name="expid" value="%% EXPID %%" />
                    <table id="content" >

                        <tr>        
                            <td colspan="3"> <center><font size="3"><b> Enter the following details for Registration</b></font></center></td>        
                        </tr>
                        <!----- First Name ---------------------------------------------------------->
                        <tr>
                            <td width="35%">First name:<b><font color="red">*</font></b><br></td>
                            <td><input type="text" size="25" maxlength="20"   name="firstname"></td>
                        </tr>
                        <!----- Last Name ---------------------------------------------------------->
                        <tr>
                            <td width="35%">Last name :<b><font color="red">*</font></b><br></td>
                            <td><input type="text" size="25" maxlength="20" name="lastname"></td>
                        </tr>

                        <tr>
                            <td width="35%">Login Name:<b><font color="red">*</font></b><br/></td>
                            <td><input type="text" size="25" maxlength="20" name="loginName"></td>
                        </tr>
                        <tr>
                            <td width="35%">Password:<b><font color="red">*</font></b><br/></td>
                            <td><input type="password" size="25" name="password" maxlength="20"></td>
                        </tr>
                        <tr>
                            <td width="35%">Confirm Password:<b><font color="red">*</font></b><br/></td>
                            <td><input type="password" size="25" name="confirmpassword" maxlength="20"></td>
                        </tr>
                        <!----- Email Id ---------------------------------------------------------->
                        <tr>
                            <td width="35%">Email :<b><font color="red">*</font></b><br/></td>
                            <td><input type="text" size="35" name="email" value="ex:xyz@rediffmail.com" onfocus="clearThis(this);" ></td>
                        </tr>





                        <!----- Country ---------------------------------------------------------->
                        <tr>
                            <td width="30" valign="middle">Select Country :<b><font color="red">*</font></b></td>
                            <td><select name="country" >
                                    <option  value="-1" selected="selected">---Select---</option>
                                    <option value="Afghanistan" title="Afghanistan">Afghanistan</option>

                                    <option value="Afghanistan" title="Afghanistan">Afghanistan</option>

                                    <option value="Albania" title="Albania">Albania</option>
                                    <option value="Algeria" title="Algeria">Algeria</option>
                                    <option value="American Samoa" title="American Samoa">American Samoa</option>
                                    <option value="Andorra" title="Andorra">Andorra</option>
                                    <option value="Angola" title="Angola">Angola</option>
                                    <option value="Anguilla" title="Anguilla">Anguilla</option>
                                    <option value="Antarctica" title="Antarctica">Antarctica</option>

                                    <option value="Argentina" title="Argentina">Argentina</option>
                                    <option value="Armenia" title="Armenia">Armenia</option>
                                    <option value="Aruba" title="Aruba">Aruba</option>
                                    <option value="Australia" title="Australia">Australia</option>
                                    <option value="Austria" title="Austria">Austria</option>
                                    <option value="Azerbaijan" title="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas" title="Bahamas">Bahamas</option>
                                    <option value="Bahrain" title="Bahrain">Bahrain</option>
                                    <option value="Bangladesh" title="Bangladesh">Bangladesh</option>
                                    <option value="Barbados" title="Barbados">Barbados</option>
                                    <option value="Belarus" title="Belarus">Belarus</option>
                                    <option value="Belgium" title="Belgium">Belgium</option>
                                    <option value="Belize" title="Belize">Belize</option>
                                    <option value="Benin" title="Benin">Benin</option>
                                    <option value="Bermuda" title="Bermuda">Bermuda</option>
                                    <option value="Bhutan" title="Bhutan">Bhutan</option>

                                    <option value="Botswana" title="Botswana">Botswana</option>
                                    <option value="Bouvet Island" title="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil" title="Brazil">Brazil</option>

                                    <option value="Brunei Darussalam" title="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria" title="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso" title="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi" title="Burundi">Burundi</option>
                                    <option value="Cambodia" title="Cambodia">Cambodia</option>
                                    <option value="Cameroon" title="Cameroon">Cameroon</option>
                                    <option value="Canada" title="Canada">Canada</option>
                                    <option value="Cape Verde" title="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands" title="Cayman Islands">Cayman Islands</option>

                                    <option value="Chad" title="Chad">Chad</option>
                                    <option value="Chile" title="Chile">Chile</option>
                                    <option value="China" title="China">China</option>
                                    <option value="Christmas Island" title="Christmas Island">Christmas Island</option>

                                    <option value="Colombia" title="Colombia">Colombia</option>
                                    <option value="Comoros" title="Comoros">Comoros</option>
                                    <option value="Congo" title="Congo">Congo</option>

                                    <option value="Cook Islands" title="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica" title="Costa Rica">Costa Rica</option>
                                    <option value="CÃ´te d'Ivoire" title="CÃ´te d'Ivoire">CÃ´te d'Ivoire</option>
                                    <option value="Croatia" title="Croatia">Croatia</option>
                                    <option value="Cuba" title="Cuba">Cuba</option>
                                    <option value="CuraÃ§ao" title="CuraÃ§ao">CuraÃ§ao</option>
                                    <option value="Cyprus" title="Cyprus">Cyprus</option>
                                    <option value="Czech Republic" title="Czech Republic">Czech Republic</option>
                                    <option value="Denmark" title="Denmark">Denmark</option>
                                    <option value="Djibouti" title="Djibouti">Djibouti</option>
                                    <option value="Dominica" title="Dominica">Dominica</option>
                                    <option value="Dominican Republic" title="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador" title="Ecuador">Ecuador</option>
                                    <option value="Egypt" title="Egypt">Egypt</option>
                                    <option value="El Salvador" title="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea" title="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea" title="Eritrea">Eritrea</option>
                                    <option value="Estonia" title="Estonia">Estonia</option>
                                    <option value="Ethiopia" title="Ethiopia">Ethiopia</option>

                                    <option value="Faroe Islands" title="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji" title="Fiji">Fiji</option>
                                    <option value="Finland" title="Finland">Finland</option>
                                    <option value="France" title="France">France</option>
                                    <option value="French Guiana" title="French Guiana">French Guiana</option>

                                    <option value="Gabon" title="Gabon">Gabon</option>
                                    <option value="Gambia" title="Gambia">Gambia</option>
                                    <option value="Georgia" title="Georgia">Georgia</option>
                                    <option value="Germany" title="Germany">Germany</option>
                                    <option value="Ghana" title="Ghana">Ghana</option>
                                    <option value="Gibraltar" title="Gibraltar">Gibraltar</option>
                                    <option value="Greece" title="Greece">Greece</option>
                                    <option value="Greenland" title="Greenland">Greenland</option>
                                    <option value="Grenada" title="Grenada">Grenada</option>
                                    <option value="Guadeloupe" title="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam" title="Guam">Guam</option>
                                    <option value="Guatemala" title="Guatemala">Guatemala</option>
                                    <option value="Guernsey" title="Guernsey">Guernsey</option>
                                    <option value="Guinea" title="Guinea">Guinea</option>
                                    <option value="Guinea-Bissau" title="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="Guyana" title="Guyana">Guyana</option>
                                    <option value="Haiti" title="Haiti">Haiti</option>

                                    <option value="Honduras" title="Honduras">Honduras</option>
                                    <option value="Hong Kong" title="Hong Kong">Hong Kong</option>
                                    <option value="Hungary" title="Hungary">Hungary</option>
                                    <option value="Iceland" title="Iceland">Iceland</option>
                                    <option value="India" title="India">India</option>
                                    <option value="Indonesia" title="Indonesia">Indonesia</option>

                                    <option value="Iraq" title="Iraq">Iraq</option>
                                    <option value="Ireland" title="Ireland">Ireland</option>
                                    <option value="Isle of Man" title="Isle of Man">Isle of Man</option>
                                    <option value="Israel" title="Israel">Israel</option>
                                    <option value="Italy" title="Italy">Italy</option>
                                    <option value="Jamaica" title="Jamaica">Jamaica</option>
                                    <option value="Japan" title="Japan">Japan</option>
                                    <option value="Jersey" title="Jersey">Jersey</option>
                                    <option value="Jordan" title="Jordan">Jordan</option>
                                    <option value="Kazakhstan" title="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya" title="Kenya">Kenya</option>
                                    <option value="Kiribati" title="Kiribati">Kiribati</option>

                                    <option value="Korea, Republic of" title="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait" title="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan" title="Kyrgyzstan">Kyrgyzstan</option>

                                    <option value="Latvia" title="Latvia">Latvia</option>
                                    <option value="Lebanon" title="Lebanon">Lebanon</option>
                                    <option value="Lesotho" title="Lesotho">Lesotho</option>
                                    <option value="Liberia" title="Liberia">Liberia</option>
                                    <option value="Libya" title="Libya">Libya</option>
                                    <option value="Liechtenstein" title="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania" title="Lithuania">Lithuania</option>
                                    <option value="Luxembourg" title="Luxembourg">Luxembourg</option>
                                    <option value="Macao" title="Macao">Macao</option>

                                    <option value="Madagascar" title="Madagascar">Madagascar</option>
                                    <option value="Malawi" title="Malawi">Malawi</option>
                                    <option value="Malaysia" title="Malaysia">Malaysia</option>
                                    <option value="Maldives" title="Maldives">Maldives</option>
                                    <option value="Mali" title="Mali">Mali</option>
                                    <option value="Malta" title="Malta">Malta</option>
                                    <option value="Marshall Islands" title="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique" title="Martinique">Martinique</option>
                                    <option value="Mauritania" title="Mauritania">Mauritania</option>
                                    <option value="Mauritius" title="Mauritius">Mauritius</option>
                                    <option value="Mayotte" title="Mayotte">Mayotte</option>
                                    <option value="Mexico" title="Mexico">Mexico</option>

                                    <option value="Moldova, Republic of" title="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco" title="Monaco">Monaco</option>
                                    <option value="Mongolia" title="Mongolia">Mongolia</option>
                                    <option value="Montenegro" title="Montenegro">Montenegro</option>
                                    <option value="Montserrat" title="Montserrat">Montserrat</option>
                                    <option value="Morocco" title="Morocco">Morocco</option>
                                    <option value="Mozambique" title="Mozambique">Mozambique</option>
                                    <option value="Myanmar" title="Myanmar">Myanmar</option>
                                    <option value="Namibia" title="Namibia">Namibia</option>
                                    <option value="Nauru" title="Nauru">Nauru</option>
                                    <option value="Nepal" title="Nepal">Nepal</option>
                                    <option value="Netherlands" title="Netherlands">Netherlands</option>
                                    <option value="New Caledonia" title="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand" title="New Zealand">New Zealand</option>
                                    <option value="Nicaragua" title="Nicaragua">Nicaragua</option>
                                    <option value="Niger" title="Niger">Niger</option>
                                    <option value="Nigeria" title="Nigeria">Nigeria</option>
                                    <option value="Niue" title="Niue">Niue</option>
                                    <option value="Norfolk Island" title="Norfolk Island">Norfolk Island</option>

                                    <option value="Norway" title="Norway">Norway</option>
                                    <option value="Oman" title="Oman">Oman</option>
                                    <option value="Pakistan" title="Pakistan">Pakistan</option>
                                    <option value="Palau" title="Palau">Palau</option>

                                    <option value="Panama" title="Panama">Panama</option>
                                    <option value="Papua New Guinea" title="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay" title="Paraguay">Paraguay</option>
                                    <option value="Peru" title="Peru">Peru</option>
                                    <option value="Philippines" title="Philippines">Philippines</option>
                                    <option value="Pitcairn" title="Pitcairn">Pitcairn</option>
                                    <option value="Poland" title="Poland">Poland</option>
                                    <option value="Portugal" title="Portugal">Portugal</option>
                                    <option value="Puerto Rico" title="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar" title="Qatar">Qatar</option>
                                    <option value="RÃ©union" title="RÃ©union">RÃ©union</option>
                                    <option value="Romania" title="Romania">Romania</option>

                                    <option value="Rwanda" title="Rwanda">Rwanda</option>
                                    <option value="Saint BarthÃ©lemy" title="Saint BarthÃ©lemy">Saint BarthÃ©lemy</option>


                                    <option value="Samoa" title="Samoa">Samoa</option>
                                    <option value="San Marino" title="San Marino">San Marino</option>

                                    <option value="Saudi Arabia" title="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal" title="Senegal">Senegal</option>
                                    <option value="Serbia" title="Serbia">Serbia</option>
                                    <option value="Seychelles" title="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone" title="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore" title="Singapore">Singapore</option>

                                    <option value="Slovakia" title="Slovakia">Slovakia</option>
                                    <option value="Slovenia" title="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands" title="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia" title="Somalia">Somalia</option>
                                    <option value="South Africa" title="South Africa">South Africa</option>

                                    <option value="South Sudan" title="South Sudan">South Sudan</option>
                                    <option value="Spain" title="Spain">Spain</option>
                                    <option value="Sri Lanka" title="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan" title="Sudan">Sudan</option>
                                    <option value="Suriname" title="Suriname">Suriname</option>

                                    <option value="Swaziland" title="Swaziland">Swaziland</option>
                                    <option value="Sweden" title="Sweden">Sweden</option>
                                    <option value="Switzerland" title="Switzerland">Switzerland</option>

                                    <option value="Thailand" title="Thailand">Thailand</option>
                                    <option value="Timor-Leste" title="Timor-Leste">Timor-Leste</option>
                                    <option value="Togo" title="Togo">Togo</option>
                                    <option value="Tokelau" title="Tokelau">Tokelau</option>
                                    <option value="Tonga" title="Tonga">Tonga</option>

                                    <option value="Tunisia" title="Tunisia">Tunisia</option>
                                    <option value="Turkey" title="Turkey">Turkey</option>
                                    <option value="Turkmenistan" title="Turkmenistan">Turkmenistan</option>

                                    <option value="Tuvalu" title="Tuvalu">Tuvalu</option>
                                    <option value="Uganda" title="Uganda">Uganda</option>
                                    <option value="Ukraine" title="Ukraine">Ukraine</option>

                                    <option value="United Kingdom" title="United Kingdom">United Kingdom</option>
                                    <option value="United States" title="United States">United States</option>

                                    <option value="Uruguay" title="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan" title="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu" title="Vanuatu">Vanuatu</option>

                                    <option value="Viet Nam" title="Viet Nam">VietNam</option>

                                    <option value="Yemen" title="Yemen">Yemen</option>
                                    <option value="Zambia" title="Zambia">Zambia</option>
                                    <option value="Zimbabwe" title="Zimbabwe">Zimbabwe</option>         
                                </select></td>
                        </tr>
                        <!----- Address ---------------------------------------------------------->
                        <tr>
                            <td width="30%">Address:<b><font color="red">*</font></b><br/></td>
                            <td><textarea rows="3" cols="30" name='address'></textarea></td>
                        </tr>
                        <!----- Mobile Number ---------------------------------------------------------->
                        <tr>
                            <td width="30%">Phone no:<b><font color="red">*</font></b><br/></td>
                            <td><input type="text" name="phoneno" value="" size="25" maxlength="10"></td>
                        </tr>

                        <tr>
                            <td width="50%">Secret question:<br/>
                                <font face="verdana,arial,hev" size="1">Choose a question only you know the answer 
                                to and that has nothing to do with your password. If you forget your password, 
                                we'll verify your identity by asking you this question. </font>
                            </td>
                            <td> 
                                <select  name='secque'>
                                    <option value="GrandFather">What is you GrandFather Name?</option>
                                    <option value="Surname_friend">Surname of your best friend?</option>
                                    <option value="petname">what is yoor petname?</option>

                                </select> 
                            </td>
                        </tr>

                        <tr>
                            <td width="30%">Answer to Secret question:<br/></td>
                            <td><textarea rows="2" cols="30" name="secans"></textarea></td>
                        </tr>
                        <tr>
                            <td   style="border:0"><input class="button" type="Reset"></td>
                            <td  style="border:0" ><input class="button" name="submit" type="submit" value="Submit"></td>


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