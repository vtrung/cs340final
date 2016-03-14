<?php

  include 'data/connect.php';
?>

<html>
<head>
</head>
<body>
  <h1>Delete Data</h1>
  <?php include '_navi.php'; ?>

  <!-- Delete Owner_Car -->
  <div class='box-form'>
    <h3>DELETE Car Ownership</h3>
    <form id='add-maker' action='data/delete.php' method='post'>
      <input name='q' value='owner_car' style='display:none'>
      <select name='oc_id'>
      <?php
        $addr_sql = "SELECT owner_car.id, owner.first_name, owner.last_name, car.year, maker.name, car.name ";
        $addr_sql .= "FROM owner ";
        $addr_sql .= "INNER JOIN owner_car ON owner.id = owner_car.owner_id ";
        $addr_sql .= "INNER JOIN car ON owner_car.car_id = car.id ";
        $addr_sql .= "INNER JOIN maker ON car.maker_id = maker.id; ";
        if(!($stmt = $db->prepare($addr_sql))){
          echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
        echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
        }
        if(!$stmt->bind_result($oc_id, $o_first, $o_last, $car_year, $car_make, $car_name)){
        echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
        }
        while($stmt->fetch()){
          echo "<option type='text' value='" . $oc_id . "'>" . $o_first . " " . $o_last . ": " . $car_year . " ";
          echo $car_make . " " . $car_name . "</option>";
        }
        $stmt->close();
      ?>
      </select><br>
      <input type='submit' value='Delete'>
    </form>
  </div>

  <!-- Delete Owner -->
  <div class='box-form'>
    <h3>DELETE Owner</h3>
    <form id='add-maker' action='data/delete.php' method='post'>
      <input name='q' value='owner' style='display:none'>
      <select name='owner_id'>
      <?php
        $addr_sql = "SELECT owner.id, owner.first_name, owner.last_name ";
        $addr_sql .= "FROM owner ";
        if(!($stmt = $db->prepare($addr_sql))){
          echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
        echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
        }
        if(!$stmt->bind_result($o_id, $o_first, $o_last)){
        echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
        }
        while($stmt->fetch()){
          echo "<option type='text' value='" . $o_id . "'>" . $o_first . " " . $o_last . "</option>";
        }
        $stmt->close();
      ?>
      </select><br>
      <input type='submit' value='Delete'>
    </form>
  </div>

  <!-- Delete Car -->
  <div class='box-form'>
    <h3>DELETE Car</h3>
    <form id='add-maker' action='data/delete.php' method='post'>
      <input name='q' value='car' style='display:none'>
      <select name='car_id'>
      <?php
        $addr_sql = "SELECT car.id, car.year, car.name, maker.name ";
        $addr_sql .= "FROM car INNER JOIN maker ON car.maker_id = maker.id ";
        if(!($stmt = $db->prepare($addr_sql))){
          echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }

        if(!$stmt->execute()){
        echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
        }
        if(!$stmt->bind_result($c_id, $c_year, $c_model, $c_make)){
        echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
        }
        while($stmt->fetch()){
          echo "<option type='text' value='" . $c_id . "'>" . $c_year. " " . $c_make . " " . $c_model . "</option>";
        }
        $stmt->close();
      ?>
      </select><br>
      <input type='submit' value='Delete'>
    </form>
  </div>

    <!-- Delete Address -->
    <div class='box-form'>
      <h3>DELETE Address</h3>
      <form id='add-maker' action='data/delete.php' method='post'>
        <input name='q' value='address' style='display:none'>
        <select name='address_id'>
          <?php
            $addr_sql = "SELECT id, address, city, state, country FROM address";
            if(!($stmt = $db->prepare($addr_sql))){
              echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!$stmt->execute()){
            echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
            }
            if(!$stmt->bind_result($addr_id, $addr_address, $addr_city, $addr_state, $addr_country)){
            echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
            }
            while($stmt->fetch()){
              echo "<option type='text' value='" . $addr_id . "'>" . $addr_address. " , " . $addr_city . " , " . $addr_state . " , " . $addr_country . "</option>";
            }
            $stmt->close();
          ?>
        </select><br>
        <input type='submit' value='Delete'>
      </form>
    </div>

</body>
<style>
  .box-form{
    width: 100%;
    padding: 10px;
    margin: 10px;
    border: 1px solid #eee;
  }
</style>
<script>
</script>
</html>
