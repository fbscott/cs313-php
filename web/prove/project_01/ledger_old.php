<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_page_head.php';
?>
  <title>Mileage Tracker</title>
</head>
<body>
<body>

<div class="row">
  <div class="column">

    <div class="row">
      <div class="column">
        <h1>Logged Fill-up Data</h1>
      </div>
    </div>

    <div class="row">
      <div class="column">
        <?php 
            $query = 'SELECT first, vehicle_id, year, make, model, fillUp_id, f_date, mileage, gallons, pricepergallon
                      FROM filler AS f
                      JOIN ledger AS l
                      ON f.id = l.filler_id
                      JOIN fillup as u
                      ON u.id = l.fillup_id
                      JOIN vehicle as v
                      ON v.id = l.vehicle_id
                      WHERE f.id = :filler_id AND v.id = :vehicle_id
                      ORDER BY fillUp_id DESC;';

            $stmt = $db->prepare($query);
            $stmt->execute(array(
                ':filler_id'  => $_SESSION['filler_id'],
                ':vehicle_id' => $_SESSION['vehicle_id']
            ));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (isset($_POST['add'])) {
                header('Location: add_fillup.php');
            }
        ?>
        <h2>Hello, <?php echo $rows[0]['first'] ?>!</h2>
        <div class="row">
          <div class="columns large-9">
            <p>Below is the mileage tracking info for your <strong><?php echo $rows[0]['year'] . ' ' . $rows[0]['make'] . ' ' . $rows[0]['model']; ?></strong>.</p>
          </div>
          <div class="columns large-3">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <input type="submit" value="Add Record" name="add">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="column">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <table>
            <tr>
              <th>Date</th>
              <th>Mileage</th>
              <th>Gallons</th>
              <th>$/gal</th>
              <th>Delete</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
            <tr>
              <td><?php echo $row['f_date']; ?></td>
              <td><?php echo $row['mileage']; ?></td>
              <td><?php echo $row['gallons']; ?></td>
              <td>$<?php echo $row['pricepergallon']; ?></td>
              <td><input type="submit" value="Delete" name="remove" class="margin-buttom-none"></td>
            </tr>
            <?php console_log($row); ?>
            <?php } ?>
          </table>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="column">
        <button onclick="location.href = './';">Return to Home Page</button>
      </div>
    </div>

  </div>
</div>

</body>
</html>
