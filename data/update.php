<?php

include 'connect.php';

$q = $_POST["q"];
echo $q;

// Updating Address
if($q == "address"){
  echo " Updating Address</br> ";
  $sql =    "UPDATE address SET address=?, city=?, state=?, country=? WHERE id=?;";
  if(!($stmt = $db->prepare($sql))){
  	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("ssssi",$_POST['address'],$_POST['city'],$_POST['state'],$_POST['country'], $_POST['a_id']))){
  	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!$stmt->execute()){
  	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
  } else {
  	echo "</br> Added " . $stmt->affected_rows . " rows address.";
  }
  $stmt->close();
}

// Updating Maker
else if($q == "maker"){
  echo "Updating Maker</br> ";
  $sql =    "UPDATE maker SET name=?, address_id=? WHERE id=?;";
  if(!($stmt = $db->prepare($sql))){
  	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("ssi",$_POST['maker_name'], $_POST['maker_address'], $_POST['m_id']))){
  	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!$stmt->execute()){
  	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
  } else {
  	echo "</br> Added " . $stmt->affected_rows . " rows address.";
  }
  $stmt->close();
}

// Updating Owner
else if($q == "owner"){
  echo "Updating Owner</br> ";

  $sql =    "UPDATE owner SET first_name=?, last_name=?, birth_date=?, address_id=? WHERE id=?;";
  if(!($stmt = $db->prepare($sql))){
  	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("ssssi",$_POST['owner_first'], $_POST['owner_last'],$_POST['owner_bday'],$_POST['owner_address'], $_POST['o_id'] ))){
  	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!$stmt->execute()){
  	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
  } else {
  	echo "</br> Added " . $stmt->affected_rows . " rows address.";
  }
  $stmt->close();
}

// Update Car
else if($q == "car"){
  echo "Updating Car</br> ";
  $sql =    "UPDATE car SET name=?, year=?, maker_id=? WHERE id=?;";
  if(!($stmt = $db->prepare($sql))){
    echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("siii",$_POST['car_name'], $_POST['car_year'],$_POST['car_maker'],$_POST['c_id'] ))){
    echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!$stmt->execute()){
    echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
  } else {
    echo "</br> Added " . $stmt->affected_rows . " rows address.";
  }
  $stmt->close();
}

// Update Car Ownership
else if($q == "owner-car"){
  echo "Updating Owner-Car</br> ";
  $sql =    "UPDATE owner_car SET owner_id=?, car_id=?, purchase_date=? WHERE id=?;";
  if(!($stmt = $db->prepare($sql))){
    echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("sii",$_POST['oc_owner'], $_POST['oc_car'],$_POST['oc_date'],$_POST['oc_id'] ))){
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
