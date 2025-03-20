<?php
header("Content-Type: application/json; charset=UTF-8");
include '../class/Products.php';
$obj = new Products();
$result = $obj->read_products();
$response=array();
while($row = $result->fetch(PDO::FETCH_ASSOC))
{
   // if($row["product_price"] >= 900)
    {
        $response[]=$row;
    }
   
}
$json = json_encode($response);
echo $json;