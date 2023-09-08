<?php
include_once "../database/db.php";
include_once "../Validation/auth_gaurd.php";
$uname = $_SESSION['uname'];


if($_SESSION['utype']!='Customer'){
    echo "You are not a Customer";
    echo "<br>";
    echo "<a href='../Validation/login.html'><button>Login</button></a>";
    die;
}

// Retrieve the total from the query parameter
$total = $_GET['total'];

$shippingAddress = $_POST['add'];

// Insert data into the "orders" table from the "cart" table
$productQuery = mysqli_query($conn, "SELECT * FROM cart");
while ($prow = mysqli_fetch_assoc($productQuery)) {
    $quantity = $prow['qty'];
    $productId = $prow['pid'];
    $productName = $prow['prod_name'];
    $vendorName = $prow['uploaded_by'];
    $price=$quantity*$prow['price'];
   
    $pn = $_POST['phone'];
    $status = mysqli_query($conn, "INSERT INTO orders (pid, total, pname, customer, vendor, address, status, qty, phone) 
                                   VALUES ('$productId', '$price', '$productName', '$uname', '$vendorName', '$shippingAddress', 'waiting', '$quantity', '$pn')");
}

if ($status) {
    echo "<h1>Thank You For Ordering!</h1>";
    echo "<br>";
    echo "Successfully Placed Order<br>Redirecting in 5 sec...";
    echo '<script>
          setTimeout(function(){
          window.location.href = "customer.php"; 
        }, 5000);
        </script>';
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
