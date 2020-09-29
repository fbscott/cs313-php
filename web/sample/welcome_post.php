<?php 

$name = htmlspecialchars($_POST["name_post"]);
$email = htmlspecialchars($_POST["email_post"]);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome</title>
</head>
<body>
   <!-- $_POST is an array of variables passed to the current script via the HTTP POST method. -->
   Welcome: <?php echo $name ?><br />
   Your email address is: <?php echo $email ?>
</body>
</html>
