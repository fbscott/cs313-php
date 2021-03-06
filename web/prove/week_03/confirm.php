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
   <title>Order Confirmation</title>
</head>
<body>

<?php 
   if (isset($_POST['submit'])) {
      session_destroy(); // TODO: doesn't destroy for some reason
      header('Location: index.php');
   }

   if (isset($_SESSION['contact'])) {
      $_first_name = $_SESSION['contact'][0];
      $_last_name = $_SESSION['contact'][1];
      $_address_1 = $_SESSION['contact'][2];
      $_address_2 = $_SESSION['contact'][3];
      $_city = $_SESSION['contact'][4];
      $_state = $_SESSION['contact'][5];
      $_zip = $_SESSION['contact'][6];
   }
 ?>

<div class="row">
   <div class="column medium-9">
      <h1>Order Confirmation</h1>
   </div>
   <div class="column medium-3">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <button class="product margin-bottom" name="submit" type="submit">Thank You!</button>
      </form>
   </div>
</div>
   
<div class="row">
   <div class="column">
      <p>Thank you, <?php echo $_first_name; ?>!</p>
      <p>Your order will be delivered to:</p>
      <address>
         <?php echo $_first_name . ' ' . $_last_name ?><br />
         <?php echo $_address_1; ?><br />
         <?php echo $_address_2; ?><br />
         <?php echo $_city . ', ' . $_state . ' ' . $_zip; ?><br />
      </address>
   </div>
</div>

</body>
</html>
