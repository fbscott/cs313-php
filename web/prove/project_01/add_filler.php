<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_page_head.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_error_message.php';
?>
  <title>Add New Filler Data</title>
</head>
<body>
<?php 
    /***************************************************************************
    * ADD NEW RECORD
    **************************************************************************/

    if (isset($_POST['submitAddFiller'])) {
        $username = htmlentities($_POST['username']);
        $first    = htmlentities($_POST['first']);
        $last     = htmlentities($_POST['last']);
        // are all inputs filled in
        $isFormValid = true;
        $errorMsg = '';

        // all of these elems should be filled in
        $elems = array($username, $first, $last);

        // iterate through inputs, make sure they're all filled in
        for ($i = 0; $i < sizeof($elems); $i++) { 
            if (empty($elems[$i])) {
                $isFormValid = false;
            }
        }

        if ($isFormValid) {
            /* filler table */
            $stmt = $db->prepare('INSERT INTO filler(username, first, last) VALUES (:username, :first, :last);');
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':first', $first, PDO::PARAM_STR);
            $stmt->bindValue(':last', $last, PDO::PARAM_STR);
            $stmt->execute();

            $filler_id = $db->lastInsertId('filler_id_seq');

            $_SESSION['filler_id'] = $filler_id;

            header('Location: add_vehicle.php');
        } else {
            $errorMsg = $errorFillFields;
        }
    }
?>
<div class="row">
  <div class="large-6 large-offset-3 columns">

    <div class="row">
      <div class="column">
        <h1>Add a User</h1>
      </div>
    </div>

    <?php echo $errorMsg; ?>

    <!---------------------------------- FORM ---------------------------------->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
        <div class="large-6 columns">
          <label for="first">First</label>
          <input name="first" type="text" required/>
        </div>
        <div class="large-6 columns">
          <label for="last">Last</label>
          <input name="last" type="text" required/>
        </div>
      </div>
      <label for="username">User Name</label>
      <input name="username" type="text" required/>
      <input type="submit" value="Submit" name="submitAddFiller" />
    </form>
    <!---------------------------------- /FORM --------------------------------->

  </div>
</div>

</body>
</html>
