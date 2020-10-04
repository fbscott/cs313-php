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
   <title>Products</title>
</head>
<body>

<?php 
   include $_SERVER['DOCUMENT_ROOT'] . '/prove/week_03/products.php';

   // define products
   if (!isset($_SESSION['products'])) {
      $_SESSION['products'] = $products;
   }

   // define cart count
   if (!isset($_SESSION['count'])) {
      $_SESSION['count'] = 0;
   }
   
   // define cart
   if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
   }

   for ($_product = 0; $_product < 6; $_product++) {
      if (isset($_POST['submit_' . $_product]) && $_POST['qty_' . $_product] !== 0) {

         // define cart count
         if (isset($_SESSION['count'])) {
            $_SESSION['count'] += htmlentities($_POST['qty_' . $_product]);
         } else {
            $_SESSION['count'] = 0;
         }

         array_push($_SESSION['cart'], $products[$_product]);
      }
   }

   $count = $_SESSION['count'];

   // print_r($_SESSION['products']);

   // session_destroy();
 ?>

<div class="row">
   <div class="column medium-9">
      <h1>Menu</h1>
   </div>
   <div class="column medium-3">
      <!-- <a href="./cart.php"><?php echo 'Cart: ' . $count ?></a> -->
      <a class="button" href="./cart.php">View Cart</a>
   </div>
</div>

<div class="row">
   <div class="column">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <ul id="products" class="panels">

            <?php 
               for ($row = 0; $row < 6; $row++) {
             ?>
            <li>
               <div class="row">
                  <div class="column">
                     <p class="product-title"><?php echo $products[$row]['prod'] ?></p>
                     <img src="<?php echo './assets/img/' . $products[$row]['img']; ?>" alt="">
                     <p><?php echo $products[$row]['desc'] ?></p>
                  </div>
               </div>
               <div class="row">
                  <div class="columns small-3">
                     <p>Quantity:</p>
                  </div>
                  <div class="columns small-3">
                     <select name="<?php echo 'qty_' . $row; ?>">
                        <?php 
                           $qties = array(1, 2, 3, 4, 5);
                           foreach ($qties as $qty) {
                        ?>
                        <option value="<?php echo $qty; ?>"><?php echo $qty; ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="columns small-6">
                     <p><strong><?php echo '$' .  $products[$row]['amt'] ?></strong></p>
                  </div>
               </div>
               <button name="<?php echo 'submit_' . $row; ?>" type="submit" class="product">Add to Cart<span class="accent"><span>+</span></span></button>
            </li>
            <?php } ?>

         </ul>
      </form>
   </div>
</div>

</body>
</html>
