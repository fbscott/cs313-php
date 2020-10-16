<?php

$book = $_GET['book'];
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="week05.php" method="GET">
    <label for="book">Book:</label>
    <input id="book" type="text" name="book" value="">
    <button type="submit" name="button">Submit</button>
    <h1>Scripture Resources</h1>
<?php
if ($book) {
  $stmt = $db->prepare('SELECT * FROM scriptures WHERE book = :book');
  $stmt->bindValue(':book', $book, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else {
  $stmt = $db->prepare('SELECT * FROM scriptures');
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


foreach ($rows as $row)
{
  echo '<p><a href="details.php?id=' . $row['id'] . '">' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</a></p>';
}
 ?>
 </form>
  </body>
</html>
