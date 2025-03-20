<?php
header("Content-Type: application/json; charset=UTF-8");
include '../class/Products.php';
$obj = new Products();
$pid = $_POST["pid"];

$obj->product_id = $pid;
$result=$obj->delete_product();



$response = array();

if($result)
{
    $response["status"]=true;
    $response["message"] = "product Deleted successfully";
}
else
{
    $response["status"]=false;
    $response["message"] = "Error";
}
echo json_encode($response);