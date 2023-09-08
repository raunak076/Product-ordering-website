<?php 
include_once "../database/db.php";
include_once "../Validation/auth_gaurd.php";
 
if($_SESSION['utype']!='Vendor'){
    echo "You are not a Vendor";
    die;
  }
  
$uname=$_SESSION['uname'];
$utype=$_SESSION['utype'];
include_once "vendor_nav.html";
echo "
    <div class= 'main'>
        <div class='head'>Welcome <span>$uname</span></div >
        <div class='search'>
            
        </div>
        <div class='user'>
            <a href='../database/logout.php' class='fa-solid fa-right-from-bracket'></a>
        </div>
    </div>
";

include_once "../database/Header.html";
echo '
<div class="main-end">
<a href="vendor.php"><button>My Product</button></a>
    <a href="myorder.php"><button>View Orders</button></a>
    <a href="upload.html">
            <button>Add Product</button>
            </a>
   
</div>
';

$status=mysqli_query($conn,"select * from orders where vendor='$uname'");
while($row=mysqli_fetch_assoc($status)){
     echo '<div class="order-row">';
        echo '<div class="order-info">Order ID: ' . $row['oid'] . '</div>';
        echo 'Product Name : ' . $row['pname'] . '<br>';
        echo 'Address : ' . $row['address'] . '<br>';
        echo 'Status : ' . $row['status'] . '<br>';
        echo 'Quantity : ' . $row['qty'] . '<br>';
        echo 'Total : ' . $row['total'] . '<br>';
        echo 'Date & Time : ' . $row['date_time'] . '<br>';
        if($row['status']=="waiting"){
            $count='Accept-Order';
            echo "
            <button onclick='change(this,1,$row[oid])' style='background-color: lightgreen;padding:4px';>$count</button>
            <button onclick='change(this,0,$row[oid])' style='background-color: lightgreen;padding:4px';>Decline</button>
            ";
        }
        elseif($row['status']=="refund"){
            echo "<button onclick='change(this,2,$row[oid])' style='background-color: lightgreen;padding:4px';>Accept-Refund</button>";
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
        function change(data,cnd,oid){
            if(cnd==1){
                data.innerHTML = 'Accepted';
                console.log("working")
            }
            if(cnd==0){
                data.innerHTML = 'Rejected';
            }
            if(cnd==2){
                data.innerHTML = 'Accepted';
            }
          
        setTimeout(function() {
            window.location.href = 'mng-order.php?&cnd=' + cnd + '&oid=' + oid;
        }, 100);
        }
    </script>
</body>
</html>