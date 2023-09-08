<?php 
include_once "../Validation/auth_gaurd.php";

if($_SESSION['utype']!='Vendor'){
    echo "You are not a Vendor";
    die;
  }
$up_by=$_SESSION['uname'];
$pname=$_POST['pname'];
$price=$_POST['price'];
$desc=$_POST["desc"];
$pc=$_POST["pcode"];
$active=$_POST["active"];
$cat=$_POST["cat"];
include_once "../database/db.php";
$img_path="../database/images/".$_FILES['pdt_img']['name'];

$status=mysqli_query($conn,"insert into product(name,price,details,category,active,img_path,uploaded_by,code) values('$pname',$price,'$desc','$cat','$active','$img_path','$up_by','$pc')");
move_uploaded_file($_FILES['pdt_img']['tmp_name'],$img_path);
if($status){
    header("location:vendor.php");
}
else{
    echo ($conn);
}

?>