<?php

  include 'data/connect.php';
?>

<html>
<head>
</head>
<body>
  <h1>Enter Data</h1>
  <?php include '_navi.php'; ?>

  <div class='box-form'>
    <h3>Add An Address</h3>
    <form id='add-address' action='data/create.php' method='post'>
      <input name='q' value='address' style='display:none'>
      Address: <input name='address' type='text'></br>
      City:<input name='city' type='text'></br>
      State:<input name='state' type='text'></br>
      Country:<input name='country' type='text'></br>
      <input type='submit' value='Add'>
    </form>
  </div>

  <!-- Create MAKER -->
  <div class='box-form'>
    <h3>Add Car Maker</h3>
    <form id='add-maker' action='data/create.php' method='post'>
      <input name='q' value='maker' style='display:none'>
      Maker name: <input name='maker_name' type='text'></br>
      Maker address:
      <select name='maker_address'>
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
          echo "<option type='text' value='" . $addr_id . "'>" . $addr_address . " , " . $addr_city . " , " . $addr_country . "</option>";
        }
        $stmt->close();
      ?>
      </select><br>
      <input type='submit' value='Add'>
    </form>
  </div>

<!-- Create Owner -->
  <div class='box-form'>
    <h3>Add Owner</h3>
    <form id='add-owner' action='data/create.php' method='post'>
      <input name='q' value='owner' style='display:none'>
      First Name: <input name='owner_first' type='text'></br>
      Last Name: <input name='owner_last' type='text'></br>
      Birth Date Format [yyyy-mm-dd]: <input type="text" name="owner_bday" val='1900-01-01'></br>
      Address:
      <select name='owner_address'>
      <?php
        $addr_sql = "SELECT id, address, city, state, country FROM address;";
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
          echo "<option type='text' value='" . $addr_id . "'>" . $addr_address . " , " . $addr_city . " , " . $addr_country . "</option>";
        }
        $stmt->close();
      ?>
      </select><br>
      <input type='submit' value='Add'>
    </form>
  </div>

<!-- Create Owner -->
  <div class='box-form'>
    <form id='add-car' action='data/create.php' method='post'>
      <input name='q' value='car' style='display:none'>
      Name: <input name='car_name' type='text'></br>
      Year: <input name='car_year' type='number'></br>
      Maker:
      <select name='car_maker'>
      <?php
        $addr_sql = "SELECT id, name FROM maker;";
        if(!($stmt = $db->prepare($addr_sql))){
          echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
        }
        if(!$stmt->execute()){
        echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
        }
        if(!$stmt->bind_result($maker_id, $maker_name)){
        echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
        }
        while($stmt->fetch()){
          echo "<option value='" . $maker_id . "'>" . $maker_name . "</option>";
        }
        $stmt->close();
      ?>
      </select><br>
      <input type='submit' value='Add'>
    </form>
  </div>

  <div class='box-form'>
    <form id='add-owner-car' action='data/create.php' method='post'>
      <input name='q' value='owner-car' style='display:none'>
      Owner:
        <select name='oc_owner'>
        <?php
          $oco_sql = "SELECT id, first_name, last_name FROM owner;";
          if(!($stmt = $db->prepare($oco_sql))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }
          if(!$stmt->execute()){
          echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          if(!$stmt->bind_result($owner_id, $owner_fname, $owner_lname)){
          echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          while($stmt->fetch()){
            echo "<option value='" . $owner_id . "'>" . $owner_fname . " " . $owner_lname . "</option>";
          }
          $stmt->close();
        ?>
        </select><br>
      Car:
        <select name='oc_car'>
        <?php
          $occ_sql = "SELECT car.id, car.year, maker.name, car.name
                        FROM car
                        INNER JOIN maker ON car.maker_id = maker.id";
          if(!($stmt = $db->prepare($occ_sql))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }
          if(!$stmt->execute()){
          echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          if(!$stmt->bind_result($car_id, $car_year, $car_maker, $car_name)){
          echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          while($stmt->fetch()){
            echo "<option value='" . $car_id . "'>" . $car_year . " " . $car_maker . " " . $car_name . "</option>";
          }
          $stmt->close();
        ?>
        </select><br>
        Purchase Date [yyyy-mm-dd]: <input type="text" name="oc_date" val='1900-01-01'></br>
      <input type='submit' value='Add'>
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
