<?php 
include_once "../Validation/auth_gaurd.php";
$p_id=$_GET['pid'];
$pname=$_POST['pname'];
$price=$_POST['price'];
$desc=$_POST["desc"];
$pc=$_POST["pcode"];
$active=$_POST["active"];
$cat=$_POST["cat"];
$img_path="../database/images/".$_FILES['pdt_img']['name'];

include_once "../database/db.php";

if($_SESSION['utype']!='Vendor'){
    echo "You are not a Vendor";
    die;
  }

if($img_path!="../database/images/"){
   
$status=mysqli_query($conn,"UPDATE product
SET name = '$pname' , price = $price, details = '$desc', category = '$cat', active = '$active', img_path = '$img_path', code = '$pc' WHERE pid = $p_id ");

move_uploaded_file($_FILES['pdt_img']['tmp_name'],$img_path);
 header("location:vendor.php");

}
else{
    
$status=mysqli_query($conn,"UPDATE product
SET name = '$pname', price = $price, details = '$desc', category = '$cat', active = '$active', code = '$pc' WHERE pid = $p_id ");

header("location:vendor.php");
}
?>