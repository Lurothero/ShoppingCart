
<?php
session_start();

include 'php database files/ecomDB.php';


$user = $_SESSION["username"];

$tablename = $user . "table";//SPACE MUST BE KEPT

$tally = 0;

 $sql = "SELECT $tablename.itemID, SUM($tablename.quantity), product_detail.item_price FROM `$tablename`,`product_detail` WHERE product_detail.item_id = $tablename.itemID
 GROUP BY $tablename.itemID";

$result = mysqli_query($connect, $sql);


if (mysqli_num_rows($result)>0) {





while ($row = mysqli_fetch_assoc($result)) {

   # echo $row["itemID"]. "has :". $row["SUM($tablename.quantity)"]. "at: ". $row["item_price"];
    $temp= 0;

   
    $temp = $temp + ($row["SUM($tablename.quantity)"]*$row["item_price"]);

    $tally = $tally + $temp;
}



}else{


    echo "No results";
}
?>
<script>

// Create our number formatter.
var formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',

});




function calcPrice(unitPrice,quantity){

var price = unitPrice * quantity;

return price;

}

function calcGST(price){

var GST = price * 0.125;

return GST.toFixed(2);


}

function totalPrice(priceTotal,gst,extra){

var finalPrice = priceTotal + gst + extra;

return finalPrice;

}




</script>


















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
        width: 150px;
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



    <!--
SIDEBAR ENDS


-->


    <!--

    Specific Block Here

-->




    <div class="checkout" style="display:none;">

        <div class="container">

            <div class="row">

                <h2>Product Review</h2>

             
 <?php
 
 $sqlnext = "SELECT $tablename.itemID, SUM($tablename.quantity), product_detail.item_price, product_detail.item_name, product_detail.item_image FROM `$tablename`,`product_detail` WHERE product_detail.item_id = $tablename.itemID
 GROUP BY $tablename.itemID";
 
$result = mysqli_query($connect, $sqlnext);


if (mysqli_num_rows($result)>0) {

	while ($row = mysqli_fetch_assoc($result)) {
 
 
 echo '<div class="col-9">';


 echo '<div class="card mb-3">';                   
        echo '<div class="card-body">';                

               echo '<div class="row pr-3">';             

 echo '<div class="col-lg-2 md-4">';                               
echo '<img src="'.$row["item_image"].'" alt="Product" id="productThumbnail" class="card-img-left mr-3">';                                    
 echo '  </div>';                             

 echo '<div class="col-5 ml-3">';                               
 echo '<h3>Product name</h3>';                                   
 echo ' <p> '.$row["item_name"].'</p>';                                  

 echo '<h3>Price</h3>';                                   
 echo '<p> '.$row["item_price"].'</p>';                                   

  echo '<h3>Quantity</h3>';                                  

  echo '<div class="col-2">';                                  

  echo '<label for="quantitySelect"></label>';                                                            
   echo '<input type="number" name="Quantity" id="quantitySelect" min="1" max="100" value="'.$row["SUM($tablename.quantity)"].'" step="1">';                                       

   echo '</div>';                                 


  echo '</div>';                              



   echo '</div>';                         
  echo ' </div>';                     
   echo '</div>';                
   echo '</div>';             
 
 
	}
}
 ?>
 










              

                <div class="col-3">
                    <h2>Overview</h2>
                    <div class="card">
                        <div class="card-body">

                            <div class="row">


                                <div class="col">

                                    <h4 style="text-align: left;">Subtotal</h4>
                                    <p style="text-align: right;" id="price"><script>document.getElementById("price").innerHTML = formatter.format(<?php echo $tally;?>) ;</script></p>
                                
                                
                                
                                
                                
                                </p>

                                    <h4 style="text-align: left;">GST</h4>
                                
                                    <p style="text-align: right;" id ="GSTprice"><script>document.getElementById("GSTprice").innerHTML = formatter.format(calcGST(<?php echo $tally;?>)) ;</script></p>
                                                                         
                                    <hr class="solid">

                                    <h4 style="text-align: left;">Order Total</h4>
                                    <p style="text-align: right;" id ="everything"><script>document.getElementById("everything").innerHTML = formatter.format(totalPrice(parseFloat(<?php echo $tally;?>),parseFloat(calcGST(<?php echo $tally;?>)),0));</script></p>





                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Delivery</h3>

                    <div class="form-check">


                        <input class="DeliverySelect" type="radio" name="deliveryTime" id="deliveryRegular" checked>
                        <label class="DeliveryType" for="flexRadioDefault1">
                            Standard Shipping
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="DeliverySelect" type="radio" name="deliveryTime" id="deliveryExpress">
                        <label class="DeliveryType" for="flexRadioDefault2">
                            Express Shipping
                        </label>
                    </div>
                </div>





            </div>



            <div class="row">
                


                
            </div>

            <div class="row">



                <h2>Shipping Details</h2>

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-6">

                                <form action="printReceipt.php" method="post" class="needs-validation" novalidate>

                              
                                    <div class="row">

                                        <div class="col-6">

                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" id="firstName" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Please enter your first name.
                                            </div>




                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" id="lastName" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Please enter your last name
                                            </div>


                                        </div>


                                        <div class="col-12">


                                            <label for="shippingDetails" class="form-label">Address</label>

                                            <input type="text" name="Address" id="shippingDetails" class="form-control"
                                                required>
                                            <div class="invalid-feedback">
                                                Please enter your address
                                            </div>


                                        </div>

                                        <div class="col-12">


                                            <label for="shippingAddressApartment" class="form-label">Apartment, Suite
                                                etc.
                                                (optional)
                                            </label>

                                            <input type="text" name="apartment" id="shippingAddressApartment"
                                                class="form-control">



                                        </div>

                                        <div class="col-12">


                                            <label for="shippingCity" class="form-label">City</label>

                                            <input type="text" name="City" id="shippingCity" class="form-control"
                                                required>


                                            <div class="invalid-feedback">
                                                Please enter your city
                                            </div>


                                        </div>

                                        <div class="col-12">


                                            <label for="countrySelect" class="form-label">Country</label>

                                            <select class="form-select" id="countrySelect"
                                                aria-label="Default select example" required>
                                                <option value="1">Belize</option>
                                                <option value="2">United States of America</option>
                                                <option value="3">United Kingdom</option>
                                            </select>




                                        </div>

                                        <div class="col-12">


                                            <label for="shippingPhoneNumber" class="form-label">Phone</label>



                                            <input type="tel" name="Phone" id="shippingPhoneNumber" class="form-control"
                                                placeholder="+501 444-444" required>


                                            <div class="invalid-feedback">
                                                Please enter a valid phone number
                                            </div>


                                        </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary">Confirm and Pay</button>
                                </form>





                            </div>

                        </div>
                    </div>

                </div>

            </div>


        </div>

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
                ?? 2021 Copyright all rights reserved
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

    <script type="text/javascript" src="jqeffects.js"></script>

    <script type="text/javascript" src="formvalidation.js"></script>


</body>


</html>