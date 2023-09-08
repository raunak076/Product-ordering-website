<?php
include_once "../Validation/auth_gaurd.php";
include_once "../vendor/vendor_nav.html";
include_once "../database/db.php";
include_once "prod_style.html";
include_once "../database/Header.html";


if($_SESSION['utype']!='Customer'){
    echo "You are not a Customer";
    echo "<br>";
    echo "<a href='../Validation/login.html'><button>Login</button></a>";
    die;
}

$uname = $_SESSION['uname'];

echo "
<div class='main'>
    <div class='head'>Welcome <span>$uname</span></div>
    <div class='user'>
        <a href='../database/logout.php' class='fa-solid fa-right-from-bracket'></a>
    </div>
</div>
";

echo '
<div class="main-end">
    <a href="customer.php"><button>View Product</button></a>
    <a href="viewcart.php"><button>View Cart</button></a>
    <a href="vieworder.php"><button>View Order</button></a>
</div>
';

// Initialize the search variable
$search = '';

// Check if 'search' is set in the POST data
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

// If search is not declared, set a default value
if (empty($search)) {
    $top = mysqli_query($conn, "select MAX(cid) as mid from cart ");
    $mrow = mysqli_fetch_assoc($top);
    $string1 = mysqli_query($conn, "select * from cart where cid=$mrow[mid] ");
    $mrow1 = mysqli_fetch_assoc($string1);
    $search = $mrow1['prod_name'];
}

$fetch = mysqli_query($conn, "select * from product where name='$search' or details='$search'");
if (mysqli_num_rows($fetch) == 0) {
    echo "<h1>No Product found !!</h1>";
}
while ($row = mysqli_fetch_assoc($fetch)) {
    echo "
    <div class='product-card'>
        <img src='$row[img_path]' >
        <h3>$row[name]</h3>
        <p style='font-weight:900;'>Rs $row[price]</p>
        <p>$row[details]</p>
        <div>
            <button style='background-color: green;padding:8px;' onclick='addCart(this,$row[pid])' >Add to Cart</button>
        </div>
    </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <script>
        function addCart(buttonElement, pid) {
            buttonElement.innerHTML = 'Added';
            setTimeout(function() {
                window.location.href = 'AddInDb.php?pid=' + pid + '&search=' + 1;
            }, 100); // Delay in milliseconds (100 milliseconds in this case)
        }
    </script>
</body>
</html>
