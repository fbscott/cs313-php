<?php 

$name = htmlspecialchars($_GET["name_get"]);
$email = htmlspecialchars($_GET["email_get"]);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome</title>
</head>
<body>
   <!-- $_GET is an array of variables passed to the current script via the URL parameters. -->
   <!-- Use $_GET when bookmarking is needed or if security doesn't matter (public data). -->
   Welcome: <?php echo $name ?><br />
   Your email address is: <?php echo $email ?>
</body>
</html>
