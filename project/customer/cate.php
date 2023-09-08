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
if($id==1){
    $status=mysqli_query($conn,"select * from product where category='electronics'");
}
if($id==2){
    $status=mysqli_query($conn,"select * from product where category='sports'");
}
if($id==4){
    $status=mysqli_query($conn,"select * from product where category='fashion'");
}
if($id==3){
    $status=mysqli_query($conn,"select * from product where category='home applience'");
}


// $uname=$_SESSION['uname'];
// include_once "../vendor/vendor_nav.html";

// echo "
// <div class= 'main'>
//        <div class='head'>Welcome <span>$uname</span></div >
//        <div class='search'>
//            <input type='text' name='search' id='' placeholder='search...'>
//            <button><i class='fa-solid fa-magnifying-glass'></i></button>
//        </div>
//        <div class='user'>
//            <a href='../database/logout.php' class='fa-solid fa-right-from-bracket'></a>
//        </div>
       
//    </div>
 
// ";
include_once "../database/Header.html";

// echo '
// <div class="main-end">
//     <a href="customer.php"><button>View Product</button></a>
//     <a href="viewcart.php"><button>View Cart</button></a>
//     <a href="http://"><button>View Order</button></a>
// </div>
// ';


// include_once "prod_style.html";
// $count="Add to Cart";
//   while($row = mysqli_fetch_assoc($status)){
//    echo "
   
//    <div class='product-card'>
//     <img src='$row[img_path]' >
//     <h3>$row[name]</h3>
//     <p style='font-weight:900;'>Rs $row[price]</p>
//     <p>$row[details]</p>
//     <div>
    
//     <button style='background-color: green;padding:8px;' onclick='addCart(this,$row[pid])' >$count</button>
   
//     </div>
//      </div>
//     "
//      ;
//  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<script>
       function addCart(buttonElement,pid) {
        buttonElement.innerHTML = 'Added';
        setTimeout(function() {
            window.location.href = 'AddInDb.php?pid='+pid+'&id='+1;
        }, 100); // Delay in milliseconds (1 second in this case)
    }
    </script>
</body>
</html>