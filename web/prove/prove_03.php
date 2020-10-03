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
    array(
      'prod' => 'Product 1',
      'amt'  => 15.99,
      'qty'  => 0,
      'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing.'
    ),
    array(
      'prod' => 'Product 2',
      'amt'  => 25.99,
      'qty'  => 0,
      'desc' => 'Suspendisse rhoncus, ex quis facilisis pulvinar.'
    ),
    array(
      'prod' => 'Product 3',
      'amt'  => 35.99,
      'qty'  => 0,
      'desc' => 'Nullam quis eleifend ipsum. Nulla facilisi.'
    ),
    array(
      'prod' => 'Product 4',
      'amt'  => 45.99,
      'qty'  => 0,
      'desc' => 'Vestibulum ante ipsum primis in faucibus orci.'
    ),
    array(
      'prod' => 'Product 5',
      'amt'  => 55.99,
      'qty'  => 0,
      'desc' => 'Ut fermentum eros eget sapien dapibus, sit amet.'
    ),
    array(
      'prod' => 'Product 6',
      'amt'  => 65.99,
      'qty'  => 0,
      'desc' => 'Fusce mattis pellentesque nibh et elementum.'
    )
  );

  if (isset($_SESSION['count'])) {
    $_SESSION['count'] = $_SESSION['count'];
  } else {
    $_SESSION['count'] = 0;
  }
  
  for ($row = 0; $row < 6; $row++) {
    $_SESSION['count'] += $_SESSION['cart'][$row]['qty'];
  }

 ?>

 <div class="row">
    <div class="columns small-6">
       <h1>Prove 03</h1>
    </div>
    <div class="columns small-6">
      <p><a href="./cart_03.php"><?php echo 'Cart: ' . $_SESSION['count']; ?></a></p>
    </div>
 </div>

 <div class="row">
   <div class="column">
    <form name="products" action="prove_03.php" method="post">
      <ul id="products">

        <?php 
          for ($row = 0; $row < 6; $row++) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qty_' . $row]) && $_POST['qty_' . $row] > 0) {
               $_SESSION['cart'][$row]['qty'] = $_POST['qty_' . $row];
               $_SESSION['count'] += $_SESSION['cart'][$row]['qty'];
            }
         ?>
        <li>
          <div class="row">
            <div class="column">
              <p class="product-title"><?php echo $_SESSION['cart'][$row]['prod'] ?></p>
              <p><?php echo $_SESSION['cart'][$row]['desc'] ?></p>
            </div>
          </div>
          <div class="row">
            <div class="columns small-3">
              <p>Quantity:</p>
            </div>
            <div class="columns small-3">
              <select name="<?php echo 'qty_' . $row; ?>">
                <?php 
                  $qties = array(0, 1, 2, 3, 4, 5);
                  foreach ($qties as $qty) {
                 ?>
                <option value="<?php echo $qty; ?>"><?php echo $qty; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="columns small-6">
              <p><?php echo 'x $' .  $_SESSION['cart'][$row]['amt'] ?></p>
            </div>
          </div>
          <button name="<?php echo 'add_' . $row; ?>" type="submit" class="js-cart-button">Add to Cart<span class="accent"><span>+</span></span></button>
        </li>
        <?php } ?>

      </ul>
    </form>
   </div>
 </div>

 <!-- <script src="../assets/js/prove_03.js"></script> -->
</body>
</html>
