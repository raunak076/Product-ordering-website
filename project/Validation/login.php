<?php
session_start();
$_SESSION['ls']=false;

$uname=$_POST['uname'];
$upass=$_POST['upass'];

include_once "../database/db.php" ;
$upass=md5($upass);

$query=mysqli_query($conn,"select * from users where uname='$uname' and upass='$upass'");

$row=mysqli_fetch_assoc($query);

if(mysqli_num_rows($query)==0){
   echo "user not found";

   die;
}
$uname1=$row['uname'];
$upas1=$row['upass'];
$utype=$row['utype'];
$_SESSION['utype']=$row['utype'];
if($uname!=$uname1 && $upas1==$upass){
    echo "User not found";
    die;
}
$_SESSION['uname']=$uname1;
$_SESSION['utype']=$utype;

$_SESSION['ls']=true;

if($utype=='Vendor'){
    header("location:../vendor/vendor.php");
}
elseif($utype=='Customer'){
    header("location:../customer/customer.php");
}



?>