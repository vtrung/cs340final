<?php

include 'connect.php';

$q = $_POST["q"];
echo $q;

if($q == "address"){
  echo " Creating Address</br> ";
  $sql =    "INSERT INTO address (address, city, state, country) VALUES (?,?,?,?);";
  if(!($stmt = $db->prepare($sql))){
  	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("ssii",$_POST['address'],$_POST['city'],$_POST['state'],$_POST['country']))){
  	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!$stmt->execute()){
  	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
  } else {
  	echo "</br> Added " . $stmt->affected_rows . " rows address.";
  }
  $stmt->close();
}

else if($q == "maker"){
  echo " Creating Maker</br> ";
  $sql =    "INSERT INTO maker (name, address_id) VALUES (?,?);";
  if(!($stmt = $db->prepare($sql))){
  	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("ss",$_POST['maker_name'], $_POST['maker_address']))){
  	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!$stmt->execute()){
  	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
  } else {
  	echo "</br> Added " . $stmt->affected_rows . " rows address.";
  }
  $stmt->close();
}

else if($q == "owner"){
  echo " Creating Owner</br> ";

  $sql =    "INSERT INTO owner (first_name, last_name, birth_date, address_id) VALUES (?,?,?,?);";
  if(!($stmt = $db->prepare($sql))){
  	echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("ssss",$_POST['owner_first'], $_POST['owner_last'],$_POST['owner_bday'],$_POST['owner_address'] ))){
  	echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!$stmt->execute()){
  	echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
  } else {
  	echo "</br> Added " . $stmt->affected_rows . " rows address.";
  }
  $stmt->close();
}

else if($q == "car"){
  echo " Creating Car</br> ";
  $sql =    "INSERT INTO car (name, year, maker_id) VALUES (?,?,?);";
  if(!($stmt = $db->prepare($sql))){
    echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("sii",$_POST['car_name'], $_POST['car_year'],$_POST['car_maker'] ))){
    echo "</br> Bind failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!$stmt->execute()){
    echo "</br> Execute failed: "  . $stmt->errno . " " . $stmt->error;
  } else {
    echo "</br> Added " . $stmt->affected_rows . " rows address.";
  }
  $stmt->close();
}

else if($q == "owner-car"){
  echo " Creating Owner-Car</br> ";
  $sql =    "INSERT INTO owner_car (owner_id, car_id, purchase_date) VALUES (?,?,?);";
  if(!($stmt = $db->prepare($sql))){
    echo "</br> Prepare failed: "  . $stmt->errno . " " . $stmt->error;
  }
  if(!($stmt->bind_param("sii",$_POST['oc_owner'], $_POST['oc_car'],$_POST['oc_date'] ))){
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

print(" end create </br>");


?>
<html>
<head>
</head>
<body>
  <div style='border:1px solid #000; padding-left: 50px;'>
    Links <br>
    <a href='../index.php'> View Data </a> <br>
    <a href='../dataentry.php'> Enter Data </a> <br>
  </div>
</body>
</html>
