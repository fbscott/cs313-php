<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_page_head.php';
?>
  <title>Add New Filler Data</title>
</head>
<body>
<?php 
/***************************************************************************
* ADD NEW RECORD
**************************************************************************/
if (isset($_POST['submitAddFiller'])) {
    $username = $_POST['username'];
    $first = $_POST['first'];
    $last = $_POST['last'];

    /* filler table */
    $stmt = $db->prepare('INSERT INTO filler(username, first, last) VALUES (:username, :first, :last);');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':first', $first, PDO::PARAM_STR);
    $stmt->bindValue(':last', $last, PDO::PARAM_STR);
    $stmt->execute();

    $filler_id = $db->lastInsertId('filler_id_seq');

    $_SESSION['filler_id'] = $filler_id;

    header('Location: add_vehicle.php');
}

/***************************************************************************
* DELETE A RECORD
**************************************************************************/
/*
if (isset($_POST['submitDelete'])) {
    $userData = $_POST['user'];

    $stmt = $db->prepare('DELETE FROM ledger WHERE filler_id = :userData');
    $stmt->bindValue(':userData', $userData, PDO::PARAM_INT);
    $stmt->execute();
}
*/
?>
<div class="row">
  <div class="large-6 large-offset-3 columns">

    <div class="row">
      <div class="column">
        <h1>Add a User</h1>
      </div>
    </div>

    <!---------------------------------- FORM ---------------------------------->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
        <div class="large-6 columns">
          <label for="first">First</label>
          <input name="first" type="text" />
        </div>
        <div class="large-6 columns">
          <label for="last">Last</label>
          <input name="last" type="text" />
        </div>
      </div>
      <label for="username">User Name</label>
      <input name="username" type="text" />
      <input type="submit" value="Submit" name="submitAddFiller" />
    </form>
    <!---------------------------------- /FORM --------------------------------->

  </div>
</div>

</body>
</html>
