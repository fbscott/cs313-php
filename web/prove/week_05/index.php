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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/_reset.css">
  <link rel="stylesheet" href="../../assets/css/_base.css">
  <link rel="stylesheet" href="../../assets/css/_grid.css">
  <title>Query Data</title>
</head>
<body><div class="row"><div class="column">

<div class="row">
  <div class="column">
    <h1>Mileage Tracker</h1>
  </div>
</div>

<div class="row">
  <div class="columns">
    <p>Hello, Scott! Below is the mileage tracking info for your 2010 Jeep Wrangler.</p>
  </div>
</div>

<div class="row">
  <div class="columns">
    <p>Average MPG: 28.34</p>
    <p>Average Miles per fill-up: 431</p>
  </div>
</div>

<!----------------------------------- TEST ----------------------------------->
<!-- <div class="row">
  <div class="columns">
    <?php 

      // foreach ($db->query('SELECT username, first FROM filler') as $row)
      // {
      //   echo 'user: ' . $row['username'];
      //   echo ' first: ' . $row['first'];
      //   echo '<br/>';
      // }

     ?>
  </div>
</div> -->
<!----------------------------------- TEST ----------------------------------->

<div class="row">
  <div class="columns">
    <table>
      <tr>
        <th>Date</th>
        <th>Mileage</th>
        <th>Gallons</th>
        <th>$/gal</th>
        <th>Total</th>
        <th>MPG</th>
        <th>mi/tank</th>
      </tr>
      <?php 
        foreach ($db->query('SELECT * FROM fillUp') as $row) {
          echo '<tr>';
          echo '<td>' . $row['f_date']         . '</td>';
          echo '<td>' . $row['mileage']        . '</td>';
          echo '<td>' . $row['gallons']        . '</td>';
          echo '<td>' . $row['pricePerGallon'] . '</td>';
          echo '<td> -- </td>';
          echo '<td> -- </td>';
          echo '<td> -- </td>';
          echo '</tr>';
        }
       ?>
      <!-- <tr>
        <td>10/06/20</td>
        <td>212,430</td>
        <td>15.17</td>
        <td>$2.12</td>
        <td>$32.16</td>
        <td>$28.48</td>
        <td>432</td>
      </tr> -->
    </table>
  </div>
</div>

</div></div></body>
</html>
