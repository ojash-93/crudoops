<?php session_start(); ?>
<?php
include './class/Database.php';
include './class/Categorydb.php';
$db = new Database();
$conn = $db->connect();
$obj = new Category($conn);
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
                <h2>Add Categoryz</h2>
                <br />
                <a href="categoryviwe.php">viwe </a>
                <br /> <br />

                <?php
                if (isset($_POST["btnsubmit"])) {
                    $name = $_POST["txtname"];
                    $description = $_POST["description"];

                    $result = $obj->insert_category($name,$description);
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
                        <label for="txtname" class="form-label">description</label>
                        <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp">
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