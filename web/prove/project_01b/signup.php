<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_page_head.php';

$passwordValid = true;
$passwordsMatch = true;
if (isset($_POST['username'])) {
    
    $username  = $_POST['username'];
    $password  = $_POST['password'];
    $password2 = $_POST['password2'];
    
    if (strlen($password) < 7 || !preg_match('/[0-9]+/', $password)) {
        $passwordValid = false;
    }
    
    if ($password != $password2) {
        $passwordsMatch = false;
    }
    
    if ($passwordValid && $passwordsMatch) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      
        $sql = 'INSERT INTO users (username, password)
                VALUES (:username, :password)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();

        header('Location: signin.php');
        die();
    }
}
?>
  <title>Sign Up</title>
</head>
<body>
  <div class="row">
    <div class="column">
      <h1>Sign Up</h1>
    </div>
  </div>
  <div class="row">
    <div class="column">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return checkPassword();">
        <p>
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" required>
        </p>
        <p>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" required>
          <?php
            if (!$passwordValid) {
                echo "<span>* Password must be at least 7 characters, and must contain a number</span>";
            } else if (!$passwordsMatch) {
                echo "<span>* Passwords don’t match</span>";
            } ?>
        </p>
        <p>
          <label for="password2">Re-type password:</label>
          <input type="password" name="password2" id="password2" required>
          <?php if (!$passwordsMatch) { echo "<span class='red'>*</span>"; } ?>
        </p>
        <p>
          <button type="submit">Create Account</button>
        </p>
      </form>
    </div>
  </div>

  <script>
    var passwordInput  = document.getElementById('password');
    var password2Input = document.getElementById('password2');

    function checkPassword() {
      if (!passwordInput.value.match(/[0-9]+/g)) {
        alert('Password must be at least 7 characters, and must contain a number');
        return false;
      } else if (passwordInput.value != password2Input.value) {
        alert('Passwords don’t match :(');
        return false;
      }
      return true;
    }
  </script>

</body>
</html>
