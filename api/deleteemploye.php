<?php
header("Content-Type: application/json; charset=UTF-8");
include '../class/Employee.php';
$obj = new Employee();
$eid = $_POST["eid"];

$obj->employe_id = $eid;
$result = $obj->delete_employe();


$response=array();

if($result)
{
    $response["status"]=true;
    $response["message"] = "Employee Deleted successfully";
}
else
{
    $response["status"]=false;
    $response["message"] = "Error";
}
echo json_encode($response);