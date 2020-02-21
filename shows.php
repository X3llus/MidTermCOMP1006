
<?php

$networkName = htmlspecialchars($_POST["network"]);

if (!empty($networkName)) {
  // Connect to my database
  $db = new PDO('mysql:host=172.31.22.43;dbname=Braden_W1095701', 'Braden_W1095701', 'P8TwvNsomx');

  // Build and execute the select command
  $select = "SELECT * FROM shows WHERE networkName = :networkName";
  $cmd = $db->prepare($select);
  $cmd->bindParam(':networkName', $networkName, PDO::PARAM_STR, 50);
  $cmd->execute();

  $shows = $cmd->fetchAll();


}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Network Shows</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/master.css">
  </head>
  <body>
    <header>
      <h1><?php echo $networkName; ?></h1>
      <a href="./select-network.php" class="btn btn-outline-primary btn-sm">Go Back</a>
    </header>
    <table class="table table-striped table-hover">
      <thead>
        <th>Show Name</th>
        <th>First Year</th>
      </thead>
      <?php

      foreach ($shows as $show) {
        echo "<tr><td>" . $show["showName"] . "</td><td>" . $show["firstYear"] . "</td></tr>";
      }

      ?>
    </table>
  </body>
</html>
