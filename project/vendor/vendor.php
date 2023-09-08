<?php
include_once "../Validation/auth_gaurd.php";

if($_SESSION['utype']!='Vendor'){
  echo "You are not a Vendor";
  die;
}

include_once "../database/Header.html";
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
echo '
<div class="main-end">
<a href="vendor.php"><button>My Product</button></a>
    <a href="myorder.php"><button>View Orders</button></a>
    <a href="upload.html">
            <button>Add Product</button>
            </a>
   
</div>
';
 
 include_once "../database/db.php";
 $status=mysqli_query($conn,"select * from product where uploaded_by='$uname'");

  while($row = mysqli_fetch_assoc($status)){
   echo "
   
   <div class='product-card'>
    <img src='$row[img_path]' >
    <h3>$row[name]</h3>
    <p>Rs $row[price]</p>
    <p>$row[details]</p>
    <div>
    <a href='edit.php?pid=$row[pid]'>
    <button style='background-color: green;'>Edit</button>
    </a>
    <a href='delete.php?pid=$row[pid]'>
    <button style='background-color: red;'>Delete</button>
    </a>
    </div>
     </div>
    "
     ;
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
         

  .product-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 10px 8px 9px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    max-width: 300px;
    margin: 10px;
    display: inline-block;
  }
  .product-card img {
    max-width: 100%;
    height: 200px;
  }

  .product-card h3 {
    margin: 10px 0;
  }

  .product-card p {
    color: #777;
    margin: 10px 0;
  }
    
  button{
    padding: 10px;
    margin: 5px;
    border-radius: 5px;
    opacity: 0.8;
  }
  button:hover{
    opacity: 1;
  }
    </style>
</head>
<body >
</body>
</html>

