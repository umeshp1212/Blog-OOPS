<?php
include 'config/config.php';
include 'lib/Database.php';

$db = new Database();



$query = "SELECT * FROM tbl_post ORDER BY id";
$read = $db->select($query);


if($read){
while($row = $read->fetch_assoc()){
    echo $row['title'];
}
}


