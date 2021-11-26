<!DOCTYPE html>


<html>

<head>
    <title>


    </title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<link rel="stylesheet" href="sidebar.css">

<style>
    #borderToSeeWhereStuffEnds {
        border-style: dotted;
        border-width: 5px;



    }

    .socialIcon {

        width: 40px;
        height: 40px;

    }


    #toCart {


        height: 40px;
        width: 40px;


    }

    #productThumbnail {


        height: 200px;
        width: auto;
    }


    #usericon {


        height: 40px;
        width: 40px;


    }


    #footer {

        position: static;
        bottom: 0;
        width: 100%;
        padding-top: 250px;
    }

    #logo {

        height: 50px;
        width: 80px;

    }

    ;
</style>


<body>









    <div class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">



            <div class="col-2">


                <a href="#" class="navbar-brand">
                    <img src="assets/logo.png" alt="logo" id="logo">
                    Generic Shop
                </a>


            </div>

            <div class="col-8">

                <form class="d-flex">
                    <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>




            </div>


            <div class="col-1 ps-5 text-center">


                <a href="#">
                    <img src="assets/shopping-cart.png" alt="cart" id="toCart">
                    <p>Cart</p>

                </a>


            </div>


            <div class="col-1 ps-5 text-center">


                <a href="#">
                    <img src="assets/user.png" alt="cart" id="usericon" onclick="openNav()">
                    <p onclick="openNav()">Profile</p>
                </a>


            </div>



        </div>

    </div>






    <div class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid justify-content-center">

            <ul class="navbar-nav">

                <li class="nav-item px-5 ">
                    <a class="nav-link" href="#">Home </a>
                </li>

                <li class="nav-item px-5">
                    <a class="nav-link" href="#">Saved</a>
                </li>

                <li class="nav-item px-5">
                    <a class="nav-link" href="#">Electronics</a>
                </li>

                <li class="nav-item px-5">
                    <a class="nav-link" href="#">Fashions</a>
                </li>

                <li class="nav-item px-5">
                    <a class="nav-link" href="#">Sports</a>
                </li>

                <li class="nav-item px-5">
                    <a class="nav-link" href="#">Arts</a>

                </li>

            </ul>


        </div>




    </div>




    <!--

SIDEBAR STARTS

-->

    <div id="mySidenav" class="sidenav bg-dark">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>



    <!--
SIDEBAR ENDS


-->







    <!--

    Specific Block Here

-->



<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 

    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>


    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    

    <!--
FOOTER

-->


    <div id="footer">


        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Find us on these social media platforms</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="https://www.facebook.com" class="me-4 text-reset">
                        <img class="socialIcon"
                            src="assets/social media icons/5305154_fb_facebook_facebook logo_icon.svg" alt="FB">
                    </a>
                    <a href="https://www.youtube.com" class="me-4 text-reset">
                        <img class="socialIcon"
                            src="assets/social media icons/5305164_play_video_youtube_youtube logo_icon.svg" alt="YT">
                    </a>
                    <a href="https://www.twitter.com" class="me-4 text-reset">
                        <img class="socialIcon"
                            src="assets/social media icons/5305170_bird_social media_social network_tweet_twitter_icon.svg"
                            alt="TW">
                    </a>
                    <a href="https://www.tumblr.com" class="me-4 text-reset">
                        <img class="socialIcon" src="assets/social media icons/5305175_tumblr_tumblr logo_icon.svg"
                            alt="TR">
                    </a>
                    <a href="https://www.instagram.com" class="me-4 text-reset">
                        <img class="socialIcon"
                            src="assets/social media icons/5335781_camera_instagram_social media_instagram logo_icon.svg"
                            alt="IG">
                    </a>

                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>Generic Shop
                            </h6>
                            <p>
                                Our store will have everything you need
                            </p>
                        </div>
                        <!-- Grid column -->


                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Get to know us
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Careers</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Blog</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">About us</a>
                            </p>

                        </div>
                        <!-- Grid column -->





                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Buy
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Registration</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Stores</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset"></a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset"></a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Pricing</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Settings</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Orders</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Contacts
                            </h6>
                            <p><i class="fas fa-home me-3"></i> Belize City, Belize Central America</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                info@gmail.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> +501 600 0000</p>
                            <p><i class="fas fa-print me-3"></i> +501 600 0001</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright all rights reserved
                <p>Generic Shop</p>

            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->a

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
        </script>
    <script type="text/javascript" src="sidebar.js"></script>

    <script type="text/javascript" src="formvalid.js"></script>


    <script>
        $(document).click(function () {
            $("#shippingFirstName").effect("shake");
        });
    </script>


</body>


</html>