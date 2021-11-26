

<?php
session_start();
include 'ecomDB.php';


$productID = $_POST["getItemID"];
$quantity = $_POST["Quantity"];
$user = $_SESSION["username"];

$tablename = $user . "table";//SPACE MUST BE KEPT



//Check to see if table exist
$result = $connect->query("SHOW TABLES LIKE '".$tablename."'") ;

    if($result->num_rows == 1) {
        echo "Table exists";

        //INSERT DATA TO TABLE

        $sql="INSERT INTO thisisatesttable (itemID, quantity, username)
        VALUES ('$productID','$quantity','$user');";
        
        
        if ($connect->query($sql) === TRUE) {
            echo "Inserted";
          } else {
            echo "NOT INSERTED: " . $connect->error;
          }
          



    }

else {
    echo "Table does not exist";


    //CREATE TABLE THEN INSERT DATA

    $sql="CREATE TABLE $tablename(
        itemIndexPos int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        itemID int,
        username VARCHAR(50) NOT NULL,
        quantity int
    );";
  


if ($connect->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $connect->error;
  }

  $sql="INSERT INTO thisisatesttable (itemID, quantity, username)
VALUES ('$productID','$quantity','$user');";


if ($connect->query($sql) === TRUE) {
    echo "Inserted";
  } else {
    echo "NOT INSERTED: " . $connect->error;
  }
  

}



header("Location: \Shopping cart take 2\checkout page.php");
?>




