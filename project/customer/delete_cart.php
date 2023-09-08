<?php 
include_once "../Validation/auth_gaurd.php";
$pid=intval($_GET['pid']);//Raunak sanitizing ...


if($_SESSION['utype']!='Customer'){
    echo "You are not a Customer";
    echo "<br>";
    echo "<a href='../Validation/login.html'><button>Login</button></a>";
    die;
}

$uname=$_SESSION['uname'];
include_once "../database/db.php";
$status=mysqli_query($conn,"select * from cart where pid=$pid and customer='$uname' ");
$row=mysqli_fetch_assoc($status);
if($row['qty']>0){
    $qty=$row['qty']-1;
    $update=mysqli_query($conn,"UPDATE cart SET qty=$qty where pid=$pid and customer='$uname' ");

    if($qty==0){
        $delete=mysqli_query($conn,"DELETE from cart where pid=$pid and customer='$uname' ");
    }
    header("location:viewcart.php");
}
else{
    $delete=mysqli_query($conn,"DELETE from cart where pid=$pid and customer='$uname' ");
    header("location:viewcart.php");

}
?>