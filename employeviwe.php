<?php session_start(); ?>
<?php

include './class/Employee.php';

$obj = new Employee();
$result = $obj->read_employe();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewemploye</title>
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
          $result = $obj->delete_employe($id);
          if($result)
          {
            echo "<script>window.location='employeviwe.php';</script>";
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
                            <th scope="col">gender</th>
                            <th scope="col">salery</th>
                            <th scope="col">Action</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row["employe_id"]; ?></td>
                                <td><?php echo $row["employe_name"]; ?></td>
                                <td><?php echo $row["employe_gender"]; ?></td>
                                <td><?php echo $row["employ_salery"]; ?></td>
                                <td>
                  <a href="?deleteid=<?php echo $row["employe_id"]; ?>">Delete</a><br>
                  <a href="updateemploye.php?updateid=<?php echo $row["employe_id"]; ?>">update</a>
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