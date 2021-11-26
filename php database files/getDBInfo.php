<?php

include 'ecomDB.php';


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

for ($count = 0;$count < 5; $count++){
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
	
		
		
		
		
		
		
		
		
		
		
	echo "<p>";
	echo $row["item_id"];
	echo "<br>";
	echo $row['item_name'];
	echo "</p>";
	echo $row['item_price'];
	echo "</p>";
	echo $row['item_image'];
	echo "</p>";
	echo $row['item_condition'];
	echo "</p>";
	echo $row['item_rating'];
	echo "</p>";
	echo $row['item_description'];
	echo "</p>";
	
	

    }
}else {
    echo "No result";

}
?>




<?php




?>