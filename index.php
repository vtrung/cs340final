<?php

include 'data/connect.php';
?>

<html>
<head>
</head>
<body>
  <h1>Car Ownership Data</h1>
  <?php
    include '_navi.php';
  ?>
  <div>
    <table>
      <tr>
        <td>Car Owners</td>
      </tr>
      <tr>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Address</td>
        <td>City</td>
        <td>State</td>
        <td>Country</td>
        <td>Year</td>
        <td>Maker</td>
        <td>Model</td>
      </tr>
      <?php
      // List All Owners with Cars
      $sql = 'SELECT owner.first_name, owner.last_name, address.address, address.city, address.state, address.country, car.year, maker.name, car.name ';
      $sql .= 'FROM owner ';
      $sql .= 'INNER JOIN address ON owner.address_id = address.id ';
      $sql .= 'INNER JOIN owner_car ON owner.id = owner_car.owner_id ';
      $sql .= 'INNER JOIN car ON owner_car.car_id = car.id ';
      $sql .= 'INNER JOIN maker ON car.maker_id = maker.id; ';
      if(!($stmt = $db->prepare($sql))){
      echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
      }

      if(!$stmt->execute()){
      echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
      }
      if(!$stmt->bind_result($first_name, $last_name, $address, $city, $state, $country, $car_year, $car_maker, $car_model)){
      echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
      }
      while($stmt->fetch()){
      echo "<tr>\n<td>\n" . $first_name . "\n</td>\n<td>\n" . $last_name . "\n</td>\n<td>\n";
      echo $address . "\n</td>\n<td>\n" . $city . "\n</td>\n<td>\n". $state . "\n</td>\n<td>\n" . $country . "\n</td>\n<td>\n";
      echo $car_year . "\n</td>\n<td>\n" . $car_maker . "\n</td>\n<td>\n" . $car_model . "\n</td>\n</tr>";
      }
      $stmt->close();
      ?>
    </table>
</div>
  </div>
</body>
<style>
  table {
    border-collapse: collapse;
  }

  table, th, td {
    border: 1px solid black;
    padding: 2px;
  }

</style>
</html>
