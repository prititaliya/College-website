<?php
//  session_start();
if (session_status() == 1)
    session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "components/_db_connect.php";
    $description = $_POST['description'];
    $visibility = $_POST['visibility'];
    $pdfName = $_FILES['pdfName']['name'];
    $sql = "INSERT INTO `downloads` (`description`, `pdfName`, `visibility`) VALUES ('$description', '$pdfName', '$visibility')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location:/bootproject/index.php');
    } else {
        echo mysqli_error($conn);
    }
    // header('Location:/bootproject/index.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php include "components/_header.php"; ?>
    <hr class="my-4">
    <div class="container">
        <?php
        $sql = "SELECT * FROM `downloads`";
        $result = mysqli_query($conn, $sql);
        $numofrow = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {

            if ($row['visibility'] == 0) {
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'faculty') { ?> <a href="Downloads/<?php echo $row['pdfName'] ?>" target="_blank"><?php echo $row['description'] ?></a><br><?php
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    continue;
                                                                                                                                                                                                }
                                                                                                                                                                                            }
                                                                                                                                                                                        } else { ?>
                <a href="Downloads/<?php echo $row['pdfName'] ?>" target="_blank"><?php echo $row['description'] ?></a><br>
            <?php

                                                                                                                                                                                        }

            ?>

        <?php }

        ?>
        <?php 
        if(isset($_SESSION['role']))
        if ($_SESSION['username'] == 'admin' && isset($_SESSION['username'])) {
            echo '<p class="my-3">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#enterImageInDatabase" aria-expanded="false" aria-controls="collapseExample">
                        upload The Images in DataBase
                        </button>
                </p>
                <div class="collapse" id="enterImageInDatabase">
                    <div class="card card-body">
                    
                    <form action="downloads.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">enter the description </label>
                            <input type="text" class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Select pdf</label>
                            <input type="file" class="form-control" name="pdfName" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <label for="exampleInputPassword1" class="form-label mx-2">Visibility</label>
                            <input type="radio" id="contactChoice1" name="visibility" value="1">
                            <label for="contactChoice1">true</label>
            
                            <input type="radio" id="contactChoice2" name="visibility" value="0">
                            <label for="contactChoice2">false</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                
                    </div>
                </div>';
        } ?>


    </div>


    <hr class="my-4">

    <?php include "components/_footer.php"; ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
-->
</body>

</html>