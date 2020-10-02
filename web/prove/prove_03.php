<?php 
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../assets/css/_reset.css">
   <link rel="stylesheet" href="../assets/css/_base.css">
   <link rel="stylesheet" href="../assets/css/_grid.css">
   <link rel="stylesheet" href="../assets/css/prove_03.css">
   <title>Prove 03</title>
</head>
<body>

  <?php 

    $_SESSION['cart'] = array(
      "Product 1" => null,
      "Product 2" => null,
      "Product 3" => null,
      "Product 4" => null,
      "Product 5" => null,
      "Product 6" => null
    );
    $_SESSION['count'] = 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qty_01']) && $_POST['qty_01'] > 0) {
      $_SESSION['count'] = $_POST['qty_01'];
      $_SESSION['cart']['Product 1'] = $_POST['qty_01'];
    }

   ?>

   <div class="row">
      <div class="column medium-6">
         <h1>Prove 03</h1>
      </div>
      <div class="columns medium-6">
        <p><a href="./cart_03.php"><?php echo 'Cart: ' . $_SESSION['count']; ?></a></p>
      </div>
   </div>

   <div class="row">
     <div class="column">
      <form name="products" action="prove_03.php" method="post">
         <ul id="products">

          <li>
            <div class="row">
              <div class="column">
                <p class="product-title">Product 1</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin bibendum felis eu luctus.</p>
              </div>
            </div>
            <div class="row">
              <div class="columns small-3">
                <p>Quantity:</p>
              </div>
              <div class="columns small-3">
                <select name="qty_01">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
              <div class="columns small-6">
                <p>x $1.00</p>
              </div>
            </div>
            <button name="add_01" type="submit" class="js-cart-button">Add to Cart<span class="accent"><span>+</span></span></button>
          </li>

         </ul>
      </form>
     </div>
   </div>

   <!-- <script src="../assets/js/prove_03.js"></script> -->
</body>
</html>
