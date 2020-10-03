<?php 
// source: https://stackoverflow.com/questions/37954031/how-to-create-an-array-of-objects-in-php-dynamically
// associative array
$majorsArr = array(
   "Computer Science"                => "CS",
   "Web Design and Development"      => "WDD",
   "Computer information Technology" => "CIT",
   "Computer Engineering"            => "CE"
);

// cast as object
$majorsObj = (object) $majorsArr;

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../assets/css/_reset.css">
   <link rel="stylesheet" href="../assets/css/_base.css">
   <link rel="stylesheet" href="../assets/css/_grid.css">
   <title>03 Teach: Team Activity</title>
</head>
<body>
   <div class="row">
      <div class="column">
         <h1>03 Teach: Team Activity</h1>
      </div>
   </div>
   <div class="row">
      <div class="column">
         <!---------------------- team activity ---------------------->
         <form name="student" action="./teach_03_result.php" method="post">
            <label>Name:</label><br />
            <input name="name" type="text" /><br />

            <label>Email:</label><br />
            <input name="email" type="text" /><br />

            <label>Major:</label><br /><br />

            <!-- core requirement -->
            <!-- 
            <input type="radio" name="major" value="CS"> Computer Science<br />
            <input type="radio" name="major" value="WDD"> Web Design and Development<br />
            <input type="radio" name="major" value="CIT"> Computer information Technology<br />
            <input type="radio" name="major" value="CE"> Computer Engineering<br />
             -->

            <!-- stretch challenge -->
            <?php 
               foreach ($majorsArr as $key => $value) {
                  echo '<input type="radio" name="major" value="' . $value . '"> ' . $key . '<br />';
               }
             ?>

            <label>Continent(s) Visited:</label><br /><br />
            <input type="checkbox" name="continents[]" value="NA"> North America<br />
            <input type="checkbox" name="continents[]" value="SA"> South America<br />
            <input type="checkbox" name="continents[]" value="EU"> Europe<br />
            <input type="checkbox" name="continents[]" value="AS"> Asia<br />
            <input type="checkbox" name="continents[]" value="AT"> Australia<br />
            <input type="checkbox" name="continents[]" value="AF"> Africa<br />
            <input type="checkbox" name="continents[]" value="AN"> Antarctica<br />

            <label>Comment:</label><br />
            <textarea name="comment" rows="5" cols="40"></textarea><br /><br />
            <input type="submit" value="Submit">
         </form>
         <!---------------------- team activity ---------------------->
      </div>
   </div>
</body>
</html>
