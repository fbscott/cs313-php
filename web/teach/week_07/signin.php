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

  if (isset($_POST['username'])) {
    // Sign in user
    
    $username = $_POST['username'];
    $password = $_POST['password'];
      
    $sql = 'SELECT username, password FROM users
            WHERE username = :username;';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($user) {
      if (password_verify($password, $user[0]['password'])) {
        $_SESSION['username'] = $user[0]['username'];
        
        header('Location: index.php');
        die();
      }
    }

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
    <h1>Sign In</h1>
    
    <form action="signin.php" method="POST">
      <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
      </p>
      <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
      </p>
      <p>
        <button type="submit">Sign In</button>
      </p>
      
      <p>Or <a href="signup.php">create an account</a>.</p>
    </form>
    
  </body>
</html>
