<?php
header("Content-Type: application/json; charset=UTF-8");
include '../class/Employee.php';
$obj = new Employee();

$eName = $_POST["eName"];
$gender = $_POST["gender"];
$salery = $_POST["salery"];


$obj->employe_name  = $eName;
$obj->employe_gender = $gender;
$obj->employ_salery = $salery;


$result = $obj->insert_employe();

$response = array();

if ($result) {
    $response["status"] = true;
    $response["message"] = "employe inserted successfully";
     $obj->delete_employe();
} else {
    $response["status"] = false;
    $response["message"] = "Error";
}
echo json_encode($response);
