<?php 

include_once "../Validation/auth_gaurd.php";
include_once "../vendor/vendor_nav.html";
include_once "../database/db.php";
include_once "prod_style.html";

if($_SESSION['utype']!='Customer'){
    echo "You are not a Customer";
    echo "<br>";
    echo "<a href='../Validation/login.html'><button>Login</button></a>";
    die;
}
include_once "../database/Header.html";
$uname=$_SESSION['uname'];
$utype=$_SESSION['utype'];


echo "
<div class= 'main'>
       <div class='head'>Welcome <span>$uname</span></div >
       <form action='customer_search.php' method='post'>
       <div class='search'>
           <input type='text' name='search' id='' placeholder='search...'>
           <button type='submit'><i class='fa-solid fa-magnifying-glass'></i></button>
       </div>
       </form>
       <div class='user'>
           <a href='../database/logout.php' class='fa-solid fa-right-from-bracket'></a>
       </div>
       
   </div>
 
";

include_once "cat.html";
 echo '
    <div class="main-end">
        <a href="customer.php"><button>View Product</button></a>
        <a href="viewcart.php"><button>View Cart</button></a>
        <a href="vieworder.php"><button>View Order</button></a>
        <a>
        <div id="select-div">
        <form action="" method="post">
        <select name="filter" id="select" ">
        <option class="select-item" >all</option>
        <option class="select-item" value="electronics" >electronics</option>
        <option class="select-item" value="Home applience">Home applience</option>
        <option class="select-item" value="sports">sports</option>
        <option class="select-item" value="fashion">fashion</option>
    </select>
    <input type="submit" class="fil-inp" value="Filter">
    </form>
    </div>
        </a>
    </div>
 ';

 

//Adding product to cart

$count="Add to Cart";
if(isset($_POST['filter'])){
    $cat=$_POST['filter'];
}
else{
    $cat="all";
}

if($cat=="all"){
    $status=mysqli_query($conn,"select * from product");
}
else{
    $status=mysqli_query($conn,"select * from product where category='$cat'");
}
  while($rows = mysqli_fetch_assoc($status)){
   echo "
   
   <div class='product-card'>
    <img src='$rows[img_path]' >
    <h3>$rows[name]</h3>
    <p style='font-weight:900;'>Rs $rows[price]</p>
    <p>$rows[details]</p>
    <div>
    
    <button style='background-color: green;padding:8px;' onclick='addCart(this,$rows[pid])' >$count</button>
   
    </div>
     </div>
    "
     ;}

 
?>


<!DOCTYPE html>
<html lang="en">
<!-- <head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    -->
</head>
<body>
    <script>
       function addCart(buttonElement,pid) {
        buttonElement.innerHTML = 'Added';
        setTimeout(function() {
            window.location.href = 'AddInDb.php?pid='+pid;
        }, 100); // Delay in milliseconds (1 second in this case)
    }
   
    </script>
   
</body>
</html>