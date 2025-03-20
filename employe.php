<?php session_start(); ?>
<?php

include './class/Employee.php';

$obj = new Employee();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employe</title>
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
                <h2>Add Employe</h2>
                <br />
                <a href="employeviwe.php">viwe Employe</a>
                <br /> <br />

                <?php
                if (isset($_POST["btnsubmit"])) {
                 
                    $obj->employe_name  = $_POST["txtname"];
                    $obj->employe_gender = $_POST["gender"];
                    $obj->employ_salery = $_POST["salery"];
                    $result = $obj->insert_employe();
                    if ($result) {
                        echo "Inserted";
                    } else {
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
                        <input type="radio" name="gender" value="male" checked> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                        <input type="radio" name="gender" value="other"> Other

                    </div>




                    <div class="mb-3">
                        <label for="txtprice" class="form-label">salery</label>
                        <input type="text" class="form-control" id="salery" name="salery">
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