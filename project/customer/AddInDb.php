<?php 
include_once "../Validation/auth_gaurd.php";
include_once "../database/db.php";

if($_SESSION['utype']!='Customer'){
    echo "You are not a Customer";
    echo "<br>";
    echo "<a href='../Validation/login.html'><button>Login</button></a>";
    die;
}

$id=$_GET['id'];
$pid = intval($_GET['pid']); // Sanitize input
$customer = $_SESSION['uname'];

$cartQuery = "SELECT * FROM cart WHERE pid = $pid AND customer = '$customer'";
$cartResult = mysqli_query($conn, $cartQuery);
$numRows = mysqli_num_rows($cartResult);

if ($numRows === 0) {
    // Product not in cart, add it
    $productQuery = "SELECT * FROM product WHERE pid = $pid";
    $productResult = mysqli_query($conn, $productQuery);
    
    if ($productRow = mysqli_fetch_assoc($productResult)) {
        $up_by = $productRow['uploaded_by'];
        $price = $productRow['price'];
        $qty = 1;
        $pname = $productRow['name'];
        
        $insertQuery = "INSERT INTO cart (qty, uploaded_by, customer, price, prod_name, pid) 
                        VALUES ($qty, '$up_by', '$customer', $price, '$pname', $pid)";
        mysqli_query($conn, $insertQuery);
    }
} else {
    // Product already in cart, update quantity
    $cartRow = mysqli_fetch_assoc($cartResult);
    $price = $cartRow['price'];
    $qty = $cartRow['qty'] + 1;
    $pname = $cartRow['prod_name'];
    
    $updateQuery = "UPDATE cart 
                    SET qty = $qty, price = $price, prod_name = '$pname'
                    WHERE pid = $pid AND customer = '$customer'";
    mysqli_query($conn, $updateQuery);
}
if($id==1){
    header("location:cate.php");
}
//for searching case 
$search=$_GET['search'];
if(isset($search)){
    header("location:customer_search.php"); 
}
else{
    header("location:customer.php");
}

exit; // Important to prevent further execution

?>