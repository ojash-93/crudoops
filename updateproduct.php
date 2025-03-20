<?php session_start(); ?>
<?php

include './class/Products.php';

$obj = new Products($conn);
$obj->product_id = $_GET["updateid"];
$row = $obj->get_single_product();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styel.css">
</head>
</head>

<body>

  <!-- header -->

  <?php
  include "includs/header.php"
  ?>




  <!-- header  end -->
  <div class="container mt-5">
    <div class="row">

      <div class="col-12">
        <h2>Updateproduct</h2>
        <br />
        <a href="product.php">View Product</a>
        <br /> <br />


        <?php 
        if(isset($_POST["btnsubmit"])){
          $obj->product_id = $_GET["updateid"];
          $obj->product_name = $_POST["txtname"];
          $obj->product_qty = $_POST["txtqty"];
          $obj->product_price = $_POST["txtprice"];
  
            $result = $obj->update_product();
            if($result)
            {
              echo "<script>window.location='product.php';</script>";
            }
            else
            {
              echo "Update error";
            }
        }
       
        

        ?>

        <form method="post" enctype="multipart/form-data">
      
          <div class="mb-3">
            <label for="txtname" class="form-label">Name</label>
            <input type="text" class="form-control" id="txtname" value="<?php echo $row["product_name"] ?>" name="txtname" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="txtqty" class="form-label">Qty</label>
            <input type="text" class="form-control" id="txtqty" name="txtqty" value="<?php echo $row["product_qty"] ?>">
          </div>
              <div class="mb-3">
                <label for="txtprice" class="form-label">Price</label>
                <input type="text" class="form-control" id="txtprice" name="txtprice" value="<?php echo $row["product_price"] ?>">
              </div>

              <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
        </form>




      </div>

    </div>

  </div>













  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>

</body>

</html>