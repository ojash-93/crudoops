<?php session_start(); ?>
<?php
include './class/Products.php';
$obj = new Products();
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
        <h2>Add Product</h2>
        <br />
        <a href="product.php">View Product</a>
        <br /> <br />


        <?php 
        if(isset($_POST["btnsubmit"]))
        {

          $obj->product_name = $_POST["txtname"];
          $obj->product_qty = $_POST["txtqty"];
          $obj->product_price = $_POST["txtprice"];

          $result = $obj->insert();
          if($result)
          {
            echo "Inserted";
          }
          else
          {
            echo "Fail";
          }
        }

        ?>

        <form method="post" enctype="multipart/form-data">
      
          <div class="mb-3">
            <label for="txtname" class="form-label">Name</label>
            <input type="text" class="form-control" id="txtname" name="txtname" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="txtqty" class="form-label">Qty</label>
            <input type="text" class="form-control" id="txtqty" name="txtqty">
          </div>
        




              <div class="mb-3">
                <label for="txtprice" class="form-label">Price</label>
                <input type="text" class="form-control" id="txtprice" name="txtprice">
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