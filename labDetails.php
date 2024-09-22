<?php
session_start();
include 'components/_header.php';
?>
<?php
if (isset($_POST['labEditButton'])) {
    include "components/_db_connect.php";
    print_r($_POST);
    $labId = $_POST['labId'];
    $labName = $_POST['labName'];
    $deptId = $_POST['deptId'];
    $labDesc = $_POST['labDesc'];
    $path_filename_ext = $target_dir . $name;
    $sql = "UPDATE `deptLab` SET `labId` = $labId, `deptId` = $deptId, `labName` = '$labName', `labDesc` ='$labDesc' WHERE `deptLab`.`labId` = $labId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if(!headers_sent())
        header('Location:/bootproject/index.php');
        exit();
    } else {
        mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h3 class="mx-2 my-2" style="text-align: center;">Changing Data about Lab</h3>
        <?php

        $LabId = $_GET['labId'];
        include "components/_db_connect.php";
        $sql = "SELECT * FROM `deptLab` WHERE `labId` = $LabId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<form  action="labDetails.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">enter the labId</label>
            <input type="number" class="form-control" value="' . $row['labId'] . '" id="labid" name="labId" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">department id</label>
            <input type="number" class="form-control" value="' . $row['deptId'] . '" id="deptId" name="deptId">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lab Name</label>
            <input type="text" class="form-control" value="' . $row['labName'] . '" id="labName" name="labName">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">lab description </label>
            <div class="mb-3">
                        <textarea rows="5" cols="50" name="labDesc" class="form-control" id="editeddeptname" aria-describedby="emailHelp">' . $row['labDesc'] . '" </textarea>
             </div>
        </div>
        <div class="mb-3">
            <label for="Image" class="form-label">Inorder to change image replace new image with old image in resources folder ' . $row['labImage'] . ' and add new image with ' . $row['labImage'] . '</label>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" href="Labs.php" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="labEditButton" class="btn btn-primary">Save Changes</button>
        </div>
    </form>';

        ?>
    </div>
</body>

</html>
<?php
include 'components/_footer.php';
?>