<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_page_head.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_error_message.php';
?>
  <title>Query User Data</title>
</head>
<body>
<?php 
    $filler_id = $_POST['filler_id'];

    // are all inputs filled in
    $isFormValid = true;
    $errorMsg = '';

    $_SESSION['filler_id'] = $filler_id;

    if (empty($filler_id)) {
        $isFormValid = false;
    }

    if (isset($_POST['submitQuery'])) {
        if ($isFormValid) {
            header('Location: vehicle.php');
        } else {
            $errorMsg = $errorFillFields;
        }
    }

    if (isset($_POST['back'])) {
        header('Location: index.php');
    }
?>

<div class="row">
  <div class="large-6 large-offset-3 columns">

    <div class="row">
      <div class="column">
        <h1>Select a User</h1>
      </div>
    </div>

    <?php echo $errorMsg; ?>

    <!---------------------------------- FORM ---------------------------------->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

      <label for="filler_id">User</label>
      <select name="filler_id">
        <option value="" selected="true" disabled> -- </option>
        <?php foreach ($db->query('SELECT * FROM filler') as $row) { ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['first']; ?> <?php echo $row['last']; ?></option>
        <?php } ?>
      </select>

      <div class="row">
        <div class="columns large-6">
          <input type="submit" value="Back" name="back" />
        </div>
        <div class="columns large-6">
          <input type="submit" value="Submit" name="submitQuery" />
        </div>
      </div>

    </form>
    <!---------------------------------- /FORM --------------------------------->

  </div>
</div>

</body>
</html>
