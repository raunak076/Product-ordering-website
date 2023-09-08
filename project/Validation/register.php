<?php
include_once "../database/db.php";
$uname=$_POST['uname'];
$upas1=$_POST['upass1'];
$upas2=$_POST['upass2'];
$utype=$_POST['utype'] ;

if($upas1!=$upas2){
    echo "Somthing went wrong !";
    die;
}
$pass=md5($upas1);
$status=mysqli_query($conn,"insert into users(uname,upass,utype) values('$uname','$pass','$utype')");
if($status){
    header("location:login.html");
}
else{
    echo "error";
    die;
}
?>