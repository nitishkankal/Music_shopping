
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
                        <label for="login">Welcome Mr.<?php echo $_SESSION['username']; ?> </label>&nbsp;&nbsp;&nbsp;&nbsp;
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
                                            <li class="active"><a href="Add_product.php" accesskey="4" title="">Add product</a></li>
                                            <li><a href="delete_product.php" accesskey="6" title="">Delete Product </a></li> 
                                            
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

                <h1>Add new product!!!!</h1>
                <form name="addproductForm" action=""   method="POST">
                    <input type="hidden" name="expid" value="%% EXPID %%" />
                    <table id="content" >

                        <tr>        
                            <td colspan="3"> <center><font size="3"><b> Enter the following product details</b></font></center></td>        
                        </tr>

                        <tr>
                            <td width="35%">Product Id:<b><font color="red">*</font></b><br></td>
                            <td><input type="text" size="25" maxlength="40"   name="product_id"></td>
                        </tr>

                        <tr>
                            <td width="35%">Title of CD :<b><font color="red">*</font></b><br></td>
                            <td><input type="text" size="25" maxlength="40" name="title"></td>
                        </tr>

                        <tr>
                            <td width="35%">Artist Name:<b><font color="red">*</font></b><br/></td>
                            <td><input type="text" size="25" maxlength="40" name="artist_name"></td>
                        </tr>



                        <!----- launch date-------------------------------------------------------->
                        <tr>
                            <td width="30%" >Launch Date in &nbsp;&nbsp;&nbsp; market : <b><font color="red">*</font></b></td>
                            <td>
                                <select  name="month">
                                    <option value="-1">Month</option>
                                    <option value="01">Jan</option>
                                    <option value="02">Feb</option>
                                    <option value="03">Mar</option>
                                    <option value="04">Apr</option>
                                    <option value="05">May</option>
                                    <option value="06">Jun</option>
                                    <option value="07">Jul</option>
                                    <option value="08">Aug</option>
                                    <option value="09">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>

                                <select name="day" >
                                    <option value="-1">Day</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>

                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>

                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>

                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>

                                    <option value="31">31</option>
                                </select>

                                <select name="year" >

                                    <option value="-1">Year</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>

                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>

                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>

                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>

                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>

                                    
                                </select>
                            </td>
                        </tr>




                        <!----- Country ---------------------------------------------------------->
                        <tr>
                            <td width="30" valign="middle">Product's origin &nbsp;&nbsp;&nbsp;Country :<b><font color="red">*</font></b></td>
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


                        <tr>
                            <td width="30%">Language of  cd:<b><font color="red">*</font></b><br/></td>
                            <td><input type="text" name="language" value="" size="25" maxlength="30"></td>
                        </tr>

                        <tr>
                            <td width="35%">Cost:<b><font color="red">*</font></b><br/></td>
                            <td><input type="text" size="25" maxlength="40" name="cost"><b><font color="red">$</font></b></td>
                        </tr>


                        <tr >
                            <td colspan="2" style="border: none transparent;padding: 10px 20%">  
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



                                    $date = "'" . $_POST['day'] . "," . $_POST['month'] . "," . $_POST['year'] . "'";
                                     echo $date;
                                    // echo $_POST['cost'];
                                    // echo '</br>';
                                    $statement = "INSERT INTO product_details values('"
                                            /* @var $_POST type */
                                            . $_POST['product_id'] . "','"
                                            . $_POST['title'] . "','"
                                            . $_POST['artist_name'] . "',
                    STR_TO_DATE($date,'%d,%m,%Y'),'"
                                            . $_POST['country'] . "','"
                                            . $_POST['language'] . "','"
                                            . $_POST['cost'] . "')";

                                    // echo $statement;

                                    $result = mysql_query($statement);
                                    
                                  
                                    if ($result && isset($result)) {
                                        echo '</br>';
                                        echo 'Product Added in databse successfully';
                                    } else {
                                        echo 'Please enter all required data, Product is not added';
                                    }
                                }
                                ?>
                            </td>
                        </tr>



                        <tr>
                            <td   style="border:0"><input class="button" type="Reset"></td>
                            <td  style="border:0" ><input class="button" type="submit" name="submit" value="Add"> </td>
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