<?php

  include 'data/connect.php';
?>

<html>
<head>
</head>
<body>
  <h1>Update Data</h1>
  <?php include '_navi.php'; ?>

  <!-- Update Address -->
  <div class='box-form'>
    <h3>Update An Address</h3>
    <form id='add-address' action='data/update.php' method='post'>
      <input name='q' value='address' style='display:none'>
      <select name='a_id'>
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
            if($addr_address != "No Address")
            echo "<option type='text' value='" . $addr_id . "'>" . $addr_address. " , " . $addr_city . " , " . $addr_state . " , " . $addr_country . "</option>";
          }
          $stmt->close();
        ?>
      </select><br>
      Address: <input name='address' type='text'></br>
      City:<input name='city' type='text'></br>
      State:<input name='state' type='text'></br>
      Country:<input name='country' type='text'></br>
      <input type='submit' value='Update'>
    </form>
  </div>

  <!-- Update MAKER -->
  <div class='box-form'>
    <h3>Update Car Maker</h3>
    <form id='add-maker' action='data/update.php' method='post'>
      <input name='q' value='maker' style='display:none'>
      <select name='m_id'>
        <?php
          $m_sql = "SELECT id, name FROM maker;";
          if(!($stmt = $db->prepare($m_sql))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }
          if(!$stmt->execute()){
            echo "Execute failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          if(!$stmt->bind_result($m_id, $m_name)){
            echo "Bind failed: "  . $db->connect_errno . " " . $db->connect_error;
          }
          while($stmt->fetch()){
            echo "<option type='text' value='" . $m_id . "'>" . $m_name .  "</option>";
          }
          $stmt->close();
        ?>
      </select><br>
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
      <input type='submit' value='Update'>
    </form>
  </div>

<!-- Create Owner -->
  <div class='box-form'>
    <h3>Add Owner</h3>
    <form id='add-owner' action='data/update.php' method='post'>
      <input name='q' value='owner' style='display:none'>
      <select name='o_id'>
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
      <input type='submit' value='Update'>
    </form>
  </div>

<!-- Create Car -->
  <div class='box-form'>
    <h3>Update Car</h3>
    <form id='add-car' action='data/update.php' method='post'>
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
      <input type='submit' value='Update'>
    </form>
  </div>

<!-- Create Ownership -->
  <div class='box-form'>
    <h3>Update Ownership</h3>
    <form id='add-owner-car' action='data/update.php' method='post'>
      <input name='q' value='owner-car' style='display:none'>
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
      <input type='submit' value='Update'>
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
