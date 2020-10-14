<?php 

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // $name    = test_input($_POST["name"]);
   // $email   = test_input($_POST["email"]);
   // $website = test_input($_POST["website"]);
   // $comment = test_input($_POST["comment"]);
   // $gender  = test_input($_POST["gender"]);

   if (empty($_POST["name"])) {
      $nameErr = "Name is required";
   } else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
         $nameErr = "Only letters and white space allowed";
      }
   }

   if (empty($_POST["email"])) {
      $emailErr = "Email is required";
   } else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $emailErr = "Invalid email format";
      }
   }

   if (empty($_POST["website"])) {
      $websiteErr = "";
   } else {
      $website = test_input($_POST["website"]);
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
         $websiteErr = "Invalid URL";
      }
   }

   if (empty($_POST["comment"])) {
      $commentErr = "";
   } else {
      $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
   } else {
      $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Validation</title>
</head>
<body>
   Welcome: <?php echo $name ?> <span><?php echo $nameErr;?></span><br />
   email: <?php echo $email ?> <span><?php echo $emailErr;?></span><br />
   Website: <?php echo $website ?> <span><?php echo $websiteErr;?></span><br />
   Comment: <?php echo $comment ?> <span><?php echo $commentErr;?></span><br />
   Gender: <?php echo $gender ?> <span><?php echo $genderErr;?></span><br />
</body>
</html>
