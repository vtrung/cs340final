<?php

// $db = new mysqli('oniddb.cws.oregonstate.edu', 'trungv-db', 'SgHnUpO9hMbdpdjE', 'trungv-db');
$db = new mysqli('localhost', 'root', 'root', 'cars');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
} else {
    echo 'Successfully connected to database! <br/>';
}

?>
