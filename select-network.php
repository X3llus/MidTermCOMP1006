<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Networks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/master.css">
  </head>
  <body>
    <form action="shows.php" method="post">
      <fieldset>
        <label for="networks">Networks: </label>
          <select name="network">
            <?php

            // Connect to my database
            $db = new PDO('mysql:host=172.31.22.43;dbname=Braden_W1095701', 'Braden_W1095701', 'P8TwvNsomx');

            // Make sql command to get our data
            $select = "SELECT * FROM networks;";
            $cmd = $db->prepare($select);
            $cmd->execute();

            $networks = $cmd->fetchAll();

            $db = null;

            foreach ($networks as $network) {
              echo "<option value=" . $network['networkName'] . ">" . $network['networkName'] . "</option>";
            }

            ?>
          </select>
          <input class="btn btn-outline-success" type="submit" value="Get Shows">
      </fieldset>
    </form>
  </body>
</html>
