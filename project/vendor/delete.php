<?php 
include_once "../database/db.php";
include_once "../Validation/auth_gaurd.php";

if($_SESSION['utype']!='Vendor'){
    echo "You are not a Vendor";
    die;
  }
$pid=$_GET['pid'];
$status=mysqli_query($conn,"delete from product where pid=$pid");
if($status){
    header("location:vendor.php");
}
else{
    echo "Deletion failded";
   
}
?>