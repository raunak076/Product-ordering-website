<?php 
include_once "../Validation/auth_gaurd.php";

if($_SESSION['utype']!='Customer'){
  echo "You are not a Customer";
  echo "<br>";
  echo "<a href='../Validation/login.html'><button>Login</button></a>";
  die;
}

$total=intval($_GET['total']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Place Order</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f4f4f4;
    }
    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 400px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    button {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
   
    .back-div{
      position: absolute;
      top: 20px;
      padding: 20px;
     left: 20px;
        }
  </style>
</head>
<body>
  <div class='back-div'>
    <a href="viewcart.php">
  <button>Back</button>
  </a>
  </div>
  <div class="container">
    <h2>Place Your Order</h2>
    <form action="order.php?total=<?php echo $total; ?>" method="post">
      <div class="form-group">
        <label >User Name</label>
        <input type="text" id="product-name" name="product-name" required>
      </div>
      <div class="form-group">
        <label >Phone Number</label>
        <input type="Number" id="product-name" name="phone" required>
      </div>
      <div class="form-group">
        <label for="shipping-address">Shipping Address</label>
        <textarea id="shipping-address" name="add" cols="1" rows="4" required></textarea>
      </div>
      <span style="font-weight: 900;padding:10px;   ">Total = <?php echo $total; ?></span>
      <button style="margin-left: 100px;" type="submit">Place Order</button>
    </form>
  </div>
</body>
</html>
