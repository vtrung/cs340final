<?php

include 'data/connect.php';
?>

<html>
<head>
</head>
<body>
  <h1> Car Ownership Data </h1>
  <p> by Ving Trung </p>
  <?php
    include '_navi.php';
  ?>
  <div style='margin: 20px 0;'>
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
      $sql .= 'INNER JOIN maker ON car.maker_id = maker.id ';
      $sql .= 'WHERE owner.first_name IS NOT NULL ';
      // Add filter where statements based on post
      if($_POST['state'] != "")
        $sql .= " AND address.state ='" . $_POST['state'] . "' ";

      if($_POST['city'] != "")
        $sql .= " AND address.city ='" . $_POST['city'] . "' ";

      if($_POST['country'] != "")
        $sql .= " AND address.state ='" . $_POST['country'] . "' ";

      if($_POST['brand'] != "")
        $sql .= " AND maker.name ='" . $_POST['brand'] . "' ";


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
  <div>
    <h4>
      Filters:
      <?php
        // Add filter where statements based on post
        if($_POST['state'] != "")
          echo "  State = " . $_POST['state'] . "  ";

        if($_POST['city'] != "")
          echo "  City = " . $_POST['city'] . "  ";

        if($_POST['country'] != "")
          echo "  Country = " . $_POST['country'] . "  ";

        if($_POST['brand'] != "")
          echo "  Brand = " . $_POST['brand'] . "  ";
      ?>

    </h4>
    <form method="POST" action="index.php">
      <span style='font-weight:600;'>Filter by Location</span> <br>
      State:
      <select name='state'>
        <option value=""></option>
        <?php
          $m_sql = "SELECT DISTINCT state FROM address; ";
          if(!($stmt = $db->prepare($m_sql))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }

          if(!$stmt->execute()){
          echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          if(!$stmt->bind_result($m_name)){
          echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          while($stmt->fetch()){
            if($m_name != "0")
              echo "<option type='text' value='" . $m_name . "'>" . $m_name . "</option>";
          }
          $stmt->close();
        ?>
      </select><br>
      City:
      <select name='city'>
        <option value=""></option>
        <?php
          $m_sql = "SELECT DISTINCT city FROM address; ";
          if(!($stmt = $db->prepare($m_sql))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }

          if(!$stmt->execute()){
          echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          if(!$stmt->bind_result($m_name)){
          echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          while($stmt->fetch()){
            if($m_name != "0")
              echo "<option type='text' value='" . $m_name . "'>" . $m_name . "</option>";
          }
          $stmt->close();
        ?>
      </select><br>
      Country:
      <select name='country'>
        <option value=""></option>
        <?php
          $m_sql = "SELECT DISTINCT country FROM address; ";
          if(!($stmt = $db->prepare($m_sql))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }

          if(!$stmt->execute()){
          echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          if(!$stmt->bind_result($m_name)){
          echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          while($stmt->fetch()){
            if($m_name != "0")
              echo "<option type='text' value='" . $m_name . "'>" . $m_name . "</option>";
          }
          $stmt->close();
        ?>
      </select><br>

      <br><span style='font-weight:600;'>Filter by Car Info</span> <br>
      Brand:
      <select name='brand'>
        <option value=""></option>
        <?php
          $m_sql = "SELECT name FROM maker; ";
          if(!($stmt = $db->prepare($m_sql))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }

          if(!$stmt->execute()){
          echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          if(!$stmt->bind_result($m_name)){
          echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          while($stmt->fetch()){
            echo "<option type='text' value='" . $m_name . "'>" . $m_name . "</option>";
          }
          $stmt->close();
        ?>
      </select><br>

      <input type='submit' value='filter'>
    </form>
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
