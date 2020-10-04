<?php 
   session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../assets/css/_reset.css">
   <link rel="stylesheet" href="../../assets/css/_base.css">
   <link rel="stylesheet" href="../../assets/css/_grid.css">
   <link rel="stylesheet" href="./assets/css/prove_03.css">
   <title>Shopping Cart</title>
</head>
<body>

<?php 

   if (isset($_SESSION['count'])) {
      $count = $_SESSION['count'];
   } else {
      $count = 0;
   }

   // $_SESSION['cart'][0]['prod'] = 'Some kind of food.';

   if(isset($_POST['remove'])) {
      // handle remove
      $key = $_POST['remove'];
      unset($_SESSION['cart'][$key]);
   }

   if (isset($_POST['order'])) {
      header('Location: order.php');
   }

   // print_r($_SESSION['cart']);

   // print_r(count($_SESSION));

   // session_destroy();

   // session_unset($_SESSION['cart'][0]);
 ?>

<div class="row">
   <div class="column medium-6">
      <h1>Shopping Cart</h1>
   </div>
   <div class="column medium-6">
      <div class="row">
         <div class="columns medium-6">
            <a class="button" href="./index.php">Continue Shopping</a>
         </div>
         <div class="columns medium-6">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
               <button class="product" name="order">Checkout</button>
               <!-- <a class="button" href="./order.php">Checkout</a> -->
            </form>
         </div>
      </div>
   </div>
</div>

<!-- <div class="row">
   <div class="column">
      <p><?php echo $count ?></p>
   </div>
</div> -->

<div class="row">
   <div class="column">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <ul id="cart" class="panels">
            <?php 
               for ($product = count($_SESSION['cart']) - 1; $product >= 0; $product--) { 
             ?>
            <li>
               <div class="row">
                  <div class="column small-2">
                     <img src="<?php echo './assets/img/' . $_SESSION['cart'][$product]['img']; ?>" width="100" height="100" alt="">
                  </div>
                  <div class="column small-8">
                     <div class="row">
                        <div class="columns small-9">
                           <p class="product-title"><?php echo $_SESSION['cart'][$product]['prod']; ?></p>
                        </div>
                        <div class="columns small-3">
                           <p class="right"><strong><?php echo '$' . $_SESSION['cart'][$product]['amt']; ?></strong></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="columns">
                           <p><?php echo $_SESSION['cart'][$product]['desc']; ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="columns small-2">
                     <!-- button doesn't work w/o value -->
                     <button name="remove" type="submit" value="<?php echo $product; ?>" class="product">Remove</button>
                  </div>
               </div>
            </li>
             <?php } ?>
         </ul>
      </form>
   </div>
</div>

</body>
</html>
