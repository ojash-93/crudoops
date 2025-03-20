<?php session_start(); ?>
<?php
include './class/Database.php';
include './class/categorydb.php';
$db = new Database();
$conn = $db->connect();
$obj = new Category($conn);
$result = $obj-> read_category();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viwecategory</title>
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
                <h2>All Employe</h2>

                <br />
                <a href="employe.php">Add Emoloye</a>
                <br /> <br />

                <?php
       if(isset($_GET["deleteid"]))
       {
          $id = $_GET["deleteid"];
          $result = $obj->delete_category($id);
          if($result)
          {
            echo "<script>window.location='categoryviwe.php';</script>";
          }
          else
          {
            echo "Error";
          }
       }

        ?>


                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">description</th>
                           
                            <th scope="col">Action</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row["Category_id"]; ?></td>
                                <td><?php echo $row["category_name"]; ?></td>
                                <td><?php echo $row["category_description"]; ?></td>
                           
                                <td>
                  <a href="?deleteid=<?php echo $row["Category_id"]; ?>">Delete</a><br>
                  <a href="updatecategory.php?updateid=<?php echo $row["Category_id"]; ?>">update</a>
                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tbody>


                    </tbody>
                </table>

            </div>
        </div>

    </div>













    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>

</body>

</html>