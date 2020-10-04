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
   if (!isset($_SESSION['contact'])) {
      $_SESSION['contact'] = array();
   }

   if (isset($_POST['submit'])) {
      array_push($_SESSION['contact'], htmlentities($_POST['first_name']));
      array_push($_SESSION['contact'], htmlentities($_POST['last_name']));
      array_push($_SESSION['contact'], htmlentities($_POST['address_1']));
      array_push($_SESSION['contact'], htmlentities($_POST['address_2']));
      array_push($_SESSION['contact'], htmlentities($_POST['city']));
      array_push($_SESSION['contact'], htmlentities($_POST['state']));
      array_push($_SESSION['contact'], htmlentities($_POST['zip']));
      header('Location: confirm.php');
   }
 ?>

<div class="row">
   <div class="column medium-9">
      <h1>Place Order</h1>
   </div>
   <div class="column medium-3">
      <a class="button" href="./cart.php">Return to Cart</a>
   </div>
</div>

<div class="row">
   <div class="column medium-8">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <div class="row">
            <div class="column medium-6">
               <label>First Name</label>
               <input type="text" name="first_name" />
            </div>
            <div class="column medium-6">
               <label>Last Name</label>
               <input type="text" name="last_name" />
            </div>
         </div>
         <div class="row">
            <div class="column">
               <label for="">Address 1:</label>
               <input type="text" name="address_1" />
            </div>
         </div>
         <div class="row">
            <div class="column">
               <label for="">Address 2:</label>
               <input type="text" name="address_2" />
            </div>
         </div>
         <div class="row">
            <div class="column medium-5">
               <label>City</label>
               <input type="text" name="city" />
            </div>
            <div class="column medium-3">
               <label>State</label>
               <input type="text" name="state" />
            </div>
            <div class="column medium-4">
               <label>Zip</label>
               <input type="text" name="zip" />
            </div>
         </div>
         <div class="row">
            <div class="column">
               <button name="submit" type="submit" class="product margin-bottom">Place Order</button>
            </div>
         </div>
      </form>
   </div>
   <div class="column medium-4">
      <div class="row">
         <div class="column">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
               <ul id="order" class="panels">
                  <?php 
                     for ($product = count($_SESSION['cart']) - 1; $product >= 0; $product--) { 
                   ?>
                  <li>
                     <div class="row">
                        <div class="column">
                           <div class="row">
                              <div class="columns medium-6">
                                 <img src="<?php echo './assets/img/' . $_SESSION['cart'][$product]['img']; ?>" width="100" height="100" alt="">
                              </div>
                              <div class="columns medium-6">
                                 <p class="product-title"><?php echo $_SESSION['cart'][$product]['prod']; ?></p>
                              </div>
                           </div>
                        </div>
                        <div class="column">
                           <p class="right"><strong><?php echo '$' . $_SESSION['cart'][$product]['amt']; ?></strong></p>
                        </div>
                     </div><!-- end row -->
                  </li>
                   <?php } ?>
               </ul>
               <p>Total: $XX.XX</p>
            </form>
         </div>
      </div><!-- end row -->
   </div>   
</div>

</body>
</html>
