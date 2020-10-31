<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_page_head.php';
?>
  <title>Query Vehicle Data</title>
</head>
<body>
<?php 
if (isset($_POST['submit'])) {
    $vehicle_id = $_POST['vehicle_id'];
    $_SESSION['vehicle_id'] = $vehicle_id;

    header('Location: ledger.php');
}
?>

<div class="row">
  <div class="large-6 large-offset-3 columns">

    <div class="row">
      <div class="column">
        <h1>Select a Vehicle</h1>
      </div>
    </div>

    <!---------------------------------- FORM ---------------------------------->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
        <div class="column">

          <label for="vehicle_id">Vehicle</label>
          <select name="vehicle_id">
            <option value="" selected="true" disabled> -- </option>
            <?php 
            $query = 'SELECT DISTINCT vehicle_id, year, make, model
                      FROM filler AS f
                      JOIN vehicle AS v
                      ON f.id = v.filler_id
                      WHERE f.id = :filler_id;';

            $stmt = $db->prepare($query);
            $stmt->execute(array(':filler_id' => $_SESSION['filler_id']));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row) {
            ?>
            <option value="<?php echo $row['vehicle_id']; ?>"><?php echo $row['year'] . ' ' . $row['make'] . ' ' . $row['model']; ?></option>
            <?php } ?>
          </select>

        </div>
      </div>

      <div class="row">
        <div class="column">
          <input type="submit" value="Submit" name="submit" />
        </div>
      </div>
    </form>
    <!---------------------------------- /FORM --------------------------------->

  </div>
</div>

</body>
</html>
