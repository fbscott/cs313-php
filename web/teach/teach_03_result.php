<?php 
   $name = $email = $comment = "";

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name       = test_input($_POST["name"]);
      $email      = test_input($_POST["email"]);
      $major      = $_POST["major"];
      $comment    = test_input($_POST["comment"]);
   }

   function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   $continents = $_POST["continents"];

   $continentAbbrsArr = array(
      "North America" => "NA",
      "South America" => "SA",
      "Europe"        => "EU",
      "Asia"          => "AS",
      "Australia"     => "AT",
      "Africa"        => "AF",
      "Antarctica"    => "AN"
   );
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../assets/css/_reset.css">
   <link rel="stylesheet" href="../assets/css/_base.css">
   <link rel="stylesheet" href="../assets/css/_grid.css">
   <title>02 Teach: Team Activity Result</title>
</head>
<body>
   <div class="row">
      <div class="column">
         <h1>02 Teach: Team Activity Result</h1>
      </div>
   </div>
   <div class="row">
      <div class="column">
         <!---------------------- team activity ---------------------->
         <p>Name: <?php echo $name; ?></p>
         <p>Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a> </p>
         <p>Major: <?php echo $major; ?></p>
         <p>Continents Visited:</p>
         <ul>
         <?php 
            foreach ($continents as $continent) {
               // core requirement
               // echo '<li>&ndash; ' . $continent . '</li>';
               
               // stretch challenge
               echo '<li>&ndash; ' . array_search($continent, $continentAbbrsArr) . '</li>';
            }
          ?>
         </ul>
         <p>Comment: <?php echo $comment; ?></p>
         <!---------------------- team activity ---------------------->
      </div>
   </div>
</body>
</html>
