<?php  session_start(); ?>
<?php include './class/Addition.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styel.css">
</head>
<body>
    

<!-- header -->

<?php
include "includs/header.php"
?>

About page


<form method="POST">
  Number 1 <input type="text" name="txtnum1"/><br/>
  Number 2 <input type="text" name="txtnum2"/><br/>
  <button type="submit" name="btnsubmit">ADD</button>
</form>

<!-- header  end -->

<?php

if(isset($_POST["btnsubmit"]))
{
  $num1 = $_POST["txtnum1"];
  $num2 = $_POST["txtnum2"];
  $obj = new Addition();
  $t = $obj->add($num1,$num2);
  echo "Final total = ".$t;
}
?>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>

</body>
</html>