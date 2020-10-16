<?php

$id = $_GET['id'];
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

    <h1>Scripture Reference</h1>
<?php
if ($id) {
  $stmt = $db->prepare('SELECT * FROM scriptures WHERE id = :id');
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - ' . '"' . $row['content'] . '"</p>';

  foreach ($rows as $row)
  {
    echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - ' . '"' . $row['content'] . '"</p>';
  }
}
// else {
//   $stmt = $db->prepare('SELECT * FROM scriptures');
//   $stmt->execute();
//   $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// }


// foreach ($rows as $row)
// {
//   echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - ' . '"' . $row['content'] . '"</p>';
// }

 ?>
  </body>
</html>
