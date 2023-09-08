<?php 
include_once "../database/db.php";
include_once "../Validation/auth_gaurd.php";

if($_SESSION['utype']!='Vendor'){
    echo "You are not a Vendor";
    die;
  }
$uname=$_SESSION['uname'];
$cnd=$_GET['cnd'];
$oid=$_GET['oid'];

if($cnd==1){
    $status=mysqli_query($conn,"UPDATE orders SET status='confirmed' where  oid=$oid ");
}
elseif($cnd==0){
    $status=mysqli_query($conn,"UPDATE orders SET status='Decline' where  oid=$oid  ");
}
elseif($cnd==2){
    $status=mysqli_query($conn,"UPDATE orders SET status='returned' where  oid=$oid  ");
}

if($status){
    header("location:myorder.php");
}
?>