<?php
  include 'connect.php';

  $q = $_POST["q"];

  //  DELETE OWNERSHIP
  if($q == "owner_car"){
    echo " Deleting Car Ownership</br> ";
    $sql =    "DELETE FROM owner_car WHERE id = ?";
    if(!($stmt = $db->prepare($sql))){
    	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!($stmt->bind_param("s",$_POST["oc_id"]))){
    	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!$stmt->execute()){
    	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
    } else {
    	echo "</br> Added " . $stmt->affected_rows . " rows address.";
    }
    $stmt->close();
  }

//  DELETE OWNER
  else if($q == "owner"){
    echo " Deleting Owner</br> ";
    $sql =    "DELETE FROM owner WHERE id = ?";
    if(!($stmt = $db->prepare($sql))){
    	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!($stmt->bind_param("s",$_POST["owner_id"]))){
    	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!$stmt->execute()){
    	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
    } else {
    	echo "</br> Added " . $stmt->affected_rows . " rows address.";
    }
    $stmt->close();
  }

//  DELETE CAR
  else if($q == "car"){
    echo " Deleting Car</br> ";
    $sql =    "DELETE FROM car WHERE id = ?";
    if(!($stmt = $db->prepare($sql))){
    	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!($stmt->bind_param("s",$_POST["car_id"]))){
    	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!$stmt->execute()){
    	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
    } else {
    	echo "</br> Added " . $stmt->affected_rows . " rows address.";
    }
    $stmt->close();
  }

//  DELETE ADDRESS
  else if($q == "address"){
    echo " Deleting Address</br> ";
    $sql =    "DELETE FROM address WHERE id = ?";
    if(!($stmt = $db->prepare($sql))){
    	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!($stmt->bind_param("s",$_POST["address_id"]))){
    	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!$stmt->execute()){
    	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
    } else {
    	echo "</br> Added " . $stmt->affected_rows . " rows address.";
    }
    $stmt->close();
  }
  else {
    echo " Not a valid request </br>";
  }

?>
<html>
<head>
</head>
<body>
  <?php include '_navi.php'; ?>
</body>
</html>
