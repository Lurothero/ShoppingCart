<!DOCTYPE html>


<html>

<head>

    <script src="https://kit.fontawesome.com/cee9ca7456.js" crossorigin="anonymous"></script>


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

    .productImage {
        width: auto;

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


                <a href="product description.php" class="navbar-brand">
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


            <a href="checkout page.php">
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
        <a href="login.php">Sign In</a>
        <a href="logout.php">Sign Out</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>


    <!--SIDEBAR ENDS-->

    <!--Specific Block Here-->

    <?php

include 'php database files/ecomDB.php';



$sql = "SELECT * FROM `product_detail`";
$result = mysqli_query($connect, $sql);


if (mysqli_num_rows($result)>0) {

	while ($row = mysqli_fetch_assoc($result)) {
		
	echo '<div class="container pt-5">';

echo'<div class="row">';
echo ' <!-- MAIN CARD HERE -->';

echo'<div class="col-4">';       
echo' <!-- PRODUCT IMAGE -->';              

echo'<div id="productSlides">';       
echo'<img src="'.$row["item_image"].'" class="d-block w-100 productImage" alt="...">';      


echo'</div>';


echo'</div>';        


echo'<div class="col-6">';         
echo'<!-- PRODUCT DESCRIPTION PARTS  -->';              

echo' <div class="row">';            
echo'<!-- TITLE AND REVIEW BLOCK-->';                

echo'<div class="col-12">';                  
echo' <h2><b>'. $row["item_name"].'</b> </h2> <br>';                    

echo'<h5>Product Rating <a href="#hi">add your review </a> </h5>';                     

echo'<div>';     


for ($count = 0;$count < $row["item_rating"]; $count++){
	echo'<span><i class="fas fa-star"></i></span>';      
}
               
                 
                            

echo'</div>';                   
echo'</div>';             
echo'</div>';          

echo'<div class="row mt-4">';          
echo'<!-- CONDITION AND QUANTITY BLOCK -->';             

echo'<div class="col-4">';            
echo'<h4>Condition: <label>New</label></h3>';               
echo'<form action="SCRIPT TEST\sendTocart.php" method="post">';                    





echo '<input type="hidden" name="getItemID" value = '.$row["item_id"].' >';


echo'<label for="quantitySelect"></label>';                      
echo'<input type="number" name="Quantity" id="quantitySelect" min="1" max="100" value="1" step="1">';                       


echo'</div>';          
echo'</div>';         

echo'<div class="row mt-4" style="background-color: beige;">';           
echo'<!-- PRICE BUTTONS AND DESCRIPTION BLOCK -->';            

echo'<div class="col-7">';            
echo'<h4>Price: <label>'.$row["item_price"].'</label></h3>';                
echo'</div>';             
echo'<div class="col-5">';            

echo'<div class="d-grid gap-2">';                
echo'<button class="btn btn-info" type="submit">Add to Cart</button>';                   
echo'</div>';               
echo' </form>';               
echo'</div>';            

echo'<div class="col-12">';             
echo'<h3>Description</h3>';                
echo'<p>'.$row["item_description"].'</p>';                
echo'</div>';            
echo'</div>';       
echo'</div>';        
echo'</div>';       
echo'</div>';   
 
	
    }
}else {
    echo "No result";

}
?>




<?php



?>




    <!--FOOTER-->


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
        <!-- Footer -->

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