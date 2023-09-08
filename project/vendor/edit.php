<?php 
include_once "../Validation/auth_gaurd.php";

if($_SESSION['utype']!='Vendor'){
    echo "You are not a Vendor";
    die;
  }
  
$p_id=$_GET['pid'];
include_once "../database/db.php";
$status=mysqli_query($conn,"select * from product where pid=$p_id");
$row=mysqli_fetch_assoc($status);
$name=$row['name'];
$price=$row['price'];
$desc=$row["details"];
$pc=$row["code"];
$active=$row["active"];
$cat=$row["category"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: auto;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    margin-top: 50px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input,select {
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social a{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social a:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
a{
    text-decoration: none;
}
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="edit_upload.php?pid=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">
        <h3>Edit Product</h3>
        <input type="text" placeholder="new name of product" value="<?php echo $name ; ?>"  name="pname">

        <input type="Number" placeholder="new price" value="<?php echo $price; ?>" id="price" name="price">

        <textarea style="background-color: inherit;padding:10px;margin-top:5px;" placeholder="Product details" id="Description" cols="44" rows="2" name="desc"><?php echo $desc; ?></textarea>

        <input type="text" placeholder="new code" value="<?php echo $pc; ?>" id="code" name="pcode">

        <label for="avail">Availibility</label>
        <select style="background-color: inherit;" name="active" id="">
          <option style="color: black;" <?php if ($active == 'Yes') echo 'selected'; ?>>Yes</option>
          <option style="color: black;" <?php if ($active == 'NO') echo 'selected'; ?>>NO</option>
       </select>
       
        <label for="price">Category</label>
        <select style="background-color: inherit;" name="cat" id="">
         <option style="color: black;" <?php if ($cat == 'electronics') echo 'selected'; ?>>electronics</option>
         <option style="color: black;" <?php if ($cat == 'Fashion') echo 'selected'; ?>>Fashion</option>
         <option style="color: black;" <?php if ($cat == 'sports') echo 'selected'; ?>>sports</option>
         <option style="color: black;" <?php if ($cat == 'home applience') echo 'selected'; ?>>home applience</option>
        </select>

        <input type="file" accept=".jpg,.png" name="pdt_img">

        <button type="submit">Submit</button>
       
    </form>
   
</body>
</html>
