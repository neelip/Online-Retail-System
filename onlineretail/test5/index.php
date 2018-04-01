<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3 in PHP with Session</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
           
            <header>
                <h1>Online Retail Catalog</h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form autocomplete="on" action="" method="post" class="form-signin signin"> 
                           <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="name" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" name="submit" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        
                            <?php
                                session_start(); // Starting Session
                                $error=''; // Variable To Store Error Message
                                if (isset($_POST['submit'])) {
                                    if (empty($_POST['username']) || empty($_POST['password'])) { 
                                        $error = "Username or Password is invalid";?>
                                        <div >
                                            <span><?php echo $error; ?></span>
                                        </div>
                            <?php
                                    } else {
                                        // Define $username and $password
                                        $username=$_POST['username'];
                                        $password=$_POST['password'];
                                        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
                                        $connection = mysql_connect("localhost:3306", "root", "1234");
                                        // To protect MySQL injection for Security purpose
                                        $username = stripslashes($username);
                                        $password = stripslashes($password);
                                        $username = mysql_real_escape_string($username);
                                        $password = mysql_real_escape_string($password);
                                        // Selecting Database
                                        $db = mysql_select_db("retailpurchase", $connection);
                                        // SQL query to fetch information of registerd users and finds user match.
                                        $query = mysql_query("call login_check('".$username."', '".$password."')", $connection);
                                        $result = mysql_fetch_array($query);


                                        $rows = mysql_num_rows($query);
                                        $_SESSION['custID'] = $result['customerID'];
                                        $_SESSION['purchaseid'] = $result['numberOfPurchases'];
                                        
                                        if ($rows == 1) {
                                            $_SESSION['login_user']=$username; // Initializing Session
                                            $row = mysql_fetch_assoc($result);
                                            header("location: index2.php"); // Redirecting To Other Page
                                        } else { 
                                            $error = "Username or Password is invalid!"; ?>
                                            <div id ="invalid">
                                                <span><?php echo $error ?></span>
                                            </div>
                                        <?php
                                        }
                                            mysql_close($connection); // Closing Connection
                                        }
                                    }

                                ?>
                        </div>

                        <div id="register" class="animate form">
                            <form action="" method="post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
				                <p> 
                                    <label for="bankname" class="bankname" >Your Primary Bank</label>
                                    <input id="bankname" name="bankname" required="required" type="text"  placeholder="eg. Bank of America" /> 
                                </p>
				                <p> 
                                    <label for="banknumber" class="banknumber" >Your Primary Bank Account Number</label>
                                    <input id="banknumber" name="banknumber" required="required" type="text" placeholder="eg. 129405589305"/> 
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up" name="submitregister"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
                        <?php

                            if (isset($_POST['submitregister'])) {

                                $connection = mysql_connect("localhost:3306", "root", "1234");
                                if ($connection==false) {
                                    die("Connection failed: " . $connection->connect_error);
                                } else {
                                    echo "Connected successfully";
                                }

                                $db = mysql_select_db("retailpurchase", $connection);

                                $username=$_POST['usernamesignup'];

                                $password=$_POST['passwordsignup'];
                                $trash = $_POST['passwordsignup_confirm'];
                                $bankname=$_POST['bankname'];

                                $bankcheck = mysql_fetch_array(mysql_query("Select bankID, bankName from banks where bankName = '".$bankname."'"));
                                $resultbc = mysql_fetch_array($bankcheck);
                                if (mysql_num_rows($resultbc) == 0)  {
                                    $insertname = mysql_query("call insert_bankname('".$bankname."')");
                                    $bankcheck2 = mysql_query("Select bankID, bankName from banks where bankName = '".$bankname."'");
                                    $resultbc2 = mysql_fetch_array($bankcheck2);
                                    $bankid = $resultbc2['bankID'];
                                    $banknum= $_POST['banknumber'];
                                    $banknum = $banknum*100 + $bankid;
                                } else {
                                    $bankid = $resultbc['bankID'];
                                    $banknum= $_POST['banknumber'];
                                    $banknum = $banknum*100 + $bankid;
                                }


                                $check = mysql_query("Select bankAccountNumber from customer where bankAccountNumber = ".$banknum);
                                $resultcheck = mysql_fetch_array($check);
                                $check2 = mysql_query("Select username from customer where username = '".$username."'");
                                $result2 = mysql_fetch_array($check2);

                                if ($resultcheck['bankAccountNumber'] == $banknum){ 
                        ?>
                                    <div id = "register" class = "animate form">
                                        <span>Account already exists!</span>
                                    </div>
                        <?php 
                                }
                                elseif($result2['username'] == $username){
                        ?>
                                    <div id = "register" class = "animate form">
                                        <span>Username is taken, try a new username!</span>
                                    </div>
                        <?php 
                                } else{

                                    $query2 = mysql_query("Insert into customer(username, password, numberOfPurchases, bankAccountNumber) values('".$username."', '".$password."', 0,".$banknum.")");
                                    echo $query2;
                                    echo $banknum.$bankname;
                        ?>
                                    <div id="register" class="animate form">

                                        <span>Successfully registered.</span>
                                    </div>
                        <?php
                                    mysql_close($connection);
                                }

                            }
                        ?>	
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>