<?php 
include_once "../Validation/auth_gaurd.php";
include_once "../database/db.php";
include_once "../vendor/vendor_nav.html";
include_once "../database/Header.html";


if($_SESSION['utype']!='Customer'){
    echo "You are not a Customer";
    echo "<br>";
    echo "<a href='../Validation/login.html'><button>Login</button></a>";
    die;
}

$uname=$_SESSION['uname'];

echo "
<div class= 'main'>
       <div class='head'>Welcome <span>$uname</span></div >
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


$status=mysqli_query($conn,"select * from orders where customer='$uname'");
while($row=mysqli_fetch_assoc($status)){
     echo '<div class="order-row">';
        echo '<div class="order-info">Order ID: ' . $row['oid'] . '</div>';
        echo 'Product Name : ' . $row['pname'] . '<br>';
        echo 'Vendor : ' . $row['vendor'] . '<br>';
        echo 'Address : ' . $row['address'] . '<br>';
        echo 'Status : ' . $row['status'] . '<br>';
        echo 'Quantity : ' . $row['qty'] . '<br>';
        echo 'Total : ' . $row['total'] . '<br>';
        echo 'Date & Time : ' . $row['date_time'] . '<br>';
        if($row['status']=="waiting"){
            echo "<button onclick='refund(this,$row[oid],1)' style='background-color: red;padding:4px';>Cancel-Order</button>";
        }
        elseif($row['status']=="confirmed"){
            echo "<button onclick='refund(this,$row[oid],0)' style='background-color: red;padding:4px';>Refund </button>
            ";
        }
       
        echo '</div>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <style>
     .order-row {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            background-color: #f2f2f2;
        }

        .order-info {
            font-weight: bold;
        }
   </style>
</head>
<body>
  <script>
    function refund(obj,oid,cnd){
         if(cnd==1){
            obj.innerHTML='Cancelled';
         }
         if(cnd==0){
            obj.innerHTML='requested';
         }
         setTimeout(() => {
            window.location.href="customer_refund.php?oid="+oid+"&cnd="+cnd;
         }, 2000);
        
    }
  </script>
</body>
</html>