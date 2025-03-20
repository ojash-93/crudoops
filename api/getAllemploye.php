<?php
header("Content-Type: application/json; charset=UTF-8");
include '../class/Emplpoye.php';
include '../class/Database.php';
$db = new Database();
$conn = $db->connect();
$obj = new Emplpoye($conn);
$result = $obj->read_employe();
while($row = $result->fetch(PDO::FETCH_ASSOC))
{
   // if($row["product_price"] >= 900)
    {
        $response[]=$row;
    }
   
}
$json = json_encode($response);
echo $json;