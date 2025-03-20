<?php
header("Content-Type: application/json; charset=UTF-8");
include '../class/Products.php';
$obj = new Products();

$pname = $_POST["pname"];
$qty = $_POST["qty"];
$price = $_POST["price"];

$obj->product_name = $pname;
$obj->product_qty = $qty;
$obj->product_price = $price;

$result = $obj->insert();

$response=array();

if($result)
{
    $response["status"]=true;
    $response["message"] = "Product inserted successfully";
}
else
{
    $response["status"]=false;
    $response["message"] = "Error";
}
echo json_encode($response);