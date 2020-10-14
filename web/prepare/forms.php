<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP Forms</title>
</head>
<body>
   <!-- $_GET is an array of variables passed to the current script via the URL parameters. -->
   <form action="./welcome_get.php" method="get">
      Name:
      <input type="text" name="name_get"><br />
      E-mail:
      <input type="text" name="email_get"><br />
      <input type="submit">
   </form><br />
   <!-- $_POST is an array of variables passed to the current script via the HTTP POST method. -->
   <form action="./welcome_post.php" method="post">
      Name:
      <input type="text" name="name_post"><br />
      E-mail:
      <input type="text" name="email_post"><br />
      <input type="submit">
   </form><br />

   <form action="./validation.php" method="post">
      Name:
      <input type="text" name="name"><br />
      E-mail:
      <input type="text" name="email"><br />
      Website:
      <input type="text" name="website"><br />
      Comment:
      <textarea name="comment" rows="5" cols="40"></textarea><br />
      Gender:
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male<br />
      <input type="submit">
   </form>
</body>
</html>
