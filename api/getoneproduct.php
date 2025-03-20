<?php
header("Content-Type: application/json; charset=UTF-8");
include '../class/Products.php';
$obj = new Products();
$pid = $_POST["pid"];
$row = $obj->get_single_product();

