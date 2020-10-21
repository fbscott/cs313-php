<?php

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
    <h1>Insert a Reference</h1>
    <form class="" action="06results.php" method="POST">
      <label for="book">Book:</label>
      <input id="book" type="text" name="book" value="">
      <label for="chapter">Chapter:</label>
      <input id="chapter" type="text" name="chapter" value="">
      <label for="verse">Verse:</label>
      <input id="verse" type="text" name="verse" value="">
      <label for="content">Content:</label>
      <textarea id="content" name="content"></textarea>
      <?php
        $stmt = $db->prepare('SELECT * FROM topic');
        $stmt->execute();
        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($topics as $topic) {
          echo "<input id='topic{$topic['id']}' type='checkbox' name='topic[]' value='{$topic['id']}'>";
          echo "<label for='topic{$topic['id']}'>{$topic['name']}</label>";
        }
      ?>

      <button type="submit" name="button">Submit</button>
    </form>
  </body>
</html>
