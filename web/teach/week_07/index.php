<?php
  session_start();

  try {
    $dbUrl = getenv('DATABASE_URL');
    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts['host'];
    $dbPort = $dbOpts['port'];
    $dbUser = $dbOpts['user'];
    $dbPassword = $dbOpts['pass'];
    $dbName = ltrim($dbOpts['path'],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
  
  } catch (PDOException $exception) {
    echo 'Error!: ' . $exception->getMessage();
    die();
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Week 7 Team Activity</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1>Welcome</h1>
    
    <?php
      if (isset($_SESSION['username'])) {
        echo "<p>Welcome, {$_SESSION['username']}!</p>";
      } else {
        header('Location: signin.php');
        die();
      }
    ?>
  </body>
</html>
