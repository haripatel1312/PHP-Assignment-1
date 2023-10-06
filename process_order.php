<?php
//connect with the server
$con =  mysqli_connect('172.31.22.43','Hari200552675','5QhWgIHfPN','Hari200552675');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$contact = $_POST['contact'];
$quantity = $_POST['quantity'];
$size=$_POST['pizza_size'];
if(!$con){
    die("Connection Error".mysqli_connect_error());
}
else{
    $toppings=isset($_POST["toppings"]) ? $_POST["toppings"] : array(); // array is used to store selected toppings checkbox
    $toppings_string=implode(", ",$toppings);
    // implode function helps to store array values in single string
    $sql = "INSERT INTO pizza_order (first_name,last_name,contact,quantity,pizza_size,toppings) VALUES ('$fname','$lname','$contact','$quantity','$size','$toppings_string')";
    $result = mysqli_query($con,$sql);

    if ($result) {
        echo "Order Placed!! <br>";
        // Display the content stored in the variables for order confirmation
        echo "Order Confirmation: <br>";
        echo "Customer's First Name: $fname <br>";
        echo "Customer's Last Name: $lname <br>";
        echo "Customer's Contact: $contact <br>";
        echo "Selected Quantity: $quantity <br>";
        echo "Selected Pizza Size: $size <br>";
        echo "Selected Toppings: $toppings_string <br>";
    }
    else {
        echo "Failed to place order";
    }
}

?>
