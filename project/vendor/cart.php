<?php 
include_once "../database/Header.html";

if($_SESSION['utype']!='Vendor'){
    echo "You are not a Vendor";
    die;
  }
 echo '
 <div class="main-end">
     <a href="http://"><button>View Product</button></a>
     <a href="http://"><button>View Cart</button></a>
     <a href="http://"><button>View Order</button></a>
 </div>
';
    echo "
    <div class='card' style='width: 20rem'>
    <svg
      class='bd-placeholder-img card-img-top'
      width='100%'
      height='180'
      xmlns='http://www.w3.org/2000/svg'
      role='img'
      aria-label='Placeholder: Image cap'
      preserveAspectRatio='xMidYMid slice'
      focusable='false'
    >
      <title>Placeholder</title>
      <rect width='100%' height='100%' fill='#868e96'></rect>
      <text x='50%' y='50%' fill='#dee2e6' dy='.3em'>Image cap</text>
    </svg>
    <div class='card-body'>
      <h5 class='card-title'>Card title</h5>
      <p class='description'>Raunak is the first user of our Dildo and he was fully sastisfied</p>
      <h6>Price : <span>500</span></h6>
      <div class='quantity'><h6>Quantity : <span class='num'>1</span></h6><button class='btn btn-primary' onclick='handleAdd()'>+</button><button class='btn btn-primary' onclick='handleSub()'>-</button></div>
      <a href='#' class='btn btn-primary order'>Place Order</a>
    </div>
  </div>
    ";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
        .card{
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
    </style>

</head>
<body>
    <script>
        var num = document.getElementsByClassName("num")
        // alert((Number)(num[0].textContent)+1)
        console.log(num[0].textContent)
        const handleAdd = ()=>{
            document.getElementsByClassName("num").innerHtml = (Number)(num[0].textContent)+1

        }
        const handleSub = ()=>{
            if((Number)(num[0].textContent)>=1){
                document.getElementsByClassName("num").innerHtml = (Number)(num[0].textContent)+1
            }
            else{
                window.alert("Quantity cannot be zero")
            }


        }
    </script>
</body>
</html>
