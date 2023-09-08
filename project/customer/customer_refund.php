<?php 
include_once "../Validation/auth_gaurd.php";
include_once "../database/db.php";

if($_SESSION['utype']!='Customer'){
  echo "You are not a Customer";
  echo "<br>";
  echo "<a href='../Validation/login.html'><button>Login</button></a>";
  die;
}

$oid=$_GET['oid'];
$cnd=$_GET['cnd'];

if($cnd==0){
   $status=mysqli_query($conn,"UPDATE orders set status='refund' where oid=$oid ");
 }
 if($cnd==1){
    $status=mysqli_query($conn,"UPDATE orders set status='cancelled' where oid=$oid ");
  }
  if($status){
    header("location:vieworder.php");
  }

?>