<?php 
include_once "../database/Header.html";
include_once "../database/db.php";
include_once "../vendor/vendor_nav.html";
include_once "../Validation/auth_gaurd.php";
include_once "prod_style.html";


if($_SESSION['utype']!='Customer'){
    echo "You are not a Customer";
    echo "<br>";
    echo "<a href='../Validation/login.html'><button>Login</button></a>";
    die;
}

$uname=$_SESSION['uname'];
$utype=$_SESSION['utype'];
echo "
<div class= 'main'>
       <div class='head'>Welcome <span>$uname</span></div >
       <div class='user'>
           <a href='../database/logout.php' class='fa-solid fa-right-from-bracket'></a>
       </div>
       
   </div>
 
";

 echo '
 <div class="main-end">
     <a href="customer.php"><button>View Product</button></a>
     <a href="viewcart.php"><button>View Cart</button></a>
     <a href="vieworder.php"><button>View Order</button></a>
 </div>
';

$status=mysqli_query($conn,"SELECT *
FROM cart INNER JOIN product ON cart.customer = '$uname' AND cart.pid = product.pid");
$total=0;
while($row = mysqli_fetch_assoc($status)){
    echo "
    
    <div class='product-card'>
     <img src='$row[img_path]' >
     <h3>$row[name]</h3>
     <p style='font-weight:900;'>Rs $row[price]</p>
     <p style='font-weight:900;'>QTY: $row[qty]</p>
     <div>
     <a href='delete_cart.php?pid=$row[pid]'>
     <button style='background-color: red;padding:8px;' >Remove</button>
    </a>
     </div>
      </div>
     "
      ;
  $total=$total+$row['qty']*$row['price'];
  }
  echo "<div>
    <h2 style='text-align:center;'>Total = $total</h2>
    <div style='text-align:center'>
    <a href='payment.php?total=$total'>
    <button style='width:50%;background-color:lightgreen;padding:10px;'>Proceed to pay</button>
    </a>
    </div>
  </div>
  ";

//     echo "
//     <div class='card' style='width: 20rem'>
//     <svg
//       class='bd-placeholder-img card-img-top'
//       width='100%'
//       height='180'
//       xmlns='http://www.w3.org/2000/svg'
//       role='img'
//       aria-label='Placeholder: Image cap'
//       preserveAspectRatio='xMidYMid slice'
//       focusable='false'
//     >
//       <title>Placeholder</title>
//       <rect width='100%' height='100%' fill='#868e96'></rect>
//       <text x='50%' y='50%' fill='#dee2e6' dy='.3em'>Image cap</text>
//     </svg>
//     <div class='card-body'>
//       <h5 class='card-title'>Card title</h5>
//       <p class='description'>Raunak is the first user of our Dildo and he was fully sastisfied</p>
//       <h6>Price : <span class='p'>500</span></h6>
//       <div class='quantity'>
//       <h6>Quantity : <span class='num'>1</span></h6>
//       <button class='btn btn-primary' onclick='handleAdd()'>+</button>
//       <button class='btn btn-primary' onclick='handleSub()'>-</button>
//       </div>
//       <a href='#' class='btn btn-primary order'>Place Order</a>
//     </div>
//   </div>
//     ";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
        /* .card{
            margin: 5rem;
        }
        .card-body h5{
            text-align: center;
        }
        .quantity h6{
            align-self: center;
        }
        .quantity button{
            align-self: center;
        }
        .quantity{
            display: flex;
            text-align: center;
            justify-content: space-between;
        }
        .order{
            width: 100%;
            margin: 2px;
        }
        .num,.p{
            border: 1px solid black;
            background-color: grey;
            padding: 0.4vh;
            margin: 1vh;
        } */
    </style>

</head>
<body>
    <!-- <script>
        var num = (Number)(document.getElementsByTagName('span')[2].innerHTML);
        const handleAdd = ()=>{
            num =num + 1;
            console.log(num);
            document.getElementsByTagName('span')[1].innerHTML=num
        }
        const handleSub = ()=>{
            if(num>1){
                num =num - 1
                document.getElementsByTagName('span')[1].innerHTML=num
            }
            else{
                window.alert("Quantity cannot be zero")
            }
        } -->
    </script>
    </body>
</html>