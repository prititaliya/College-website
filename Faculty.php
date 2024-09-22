<?php
include 'components/_db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['facultyInsertButton'])) {
    $facultyName = $_POST['facultyName'];
    $facultyEmail = $_POST['facultyEmail'];
    $deptId = $_POST['deptId'];
    $designation = $_POST['designation'];
    $experience = $_POST['experience'];
    $intrest = $_POST['intrest'];
    $qualification = $_POST['qualification'];
    $category = $_POST['category'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $name = $_POST['profilepicture'];
    $name = $_FILES['profilepicture']['name'];
    $tmp = $_FILES['profilepicture']['tmp_name'];
    move_uploaded_file($tmp, "facultyProflePicture/" . $name);
    $path = pathinfo($name);
    $target_dir = "facultyProfilePicture/";
    $ext = $path['extension'];
    $path_filename_ext = $target_dir . $name;
    // $imageDesc = $_POST['inputedImageDesc'];
    // $alterText = $_POST['inputedImageAlterText'];
    // $deptId = $_POST['deptId'];
    echo $tmp . " " . $path_filename_ext;
    if (move_uploaded_file($tmp, $path_filename_ext)) {
        $check = "SELECT Faculty_Name FROM `Faculty_Details` where Faculty_Name='$facultyName'";
        $checkresult = mysqli_query($conn, $check);
        $facultyName = str_replace(">", "&gt;", $facultyName);
        $facultyName = str_replace("<", "&lt;", $facultyName);
        echo "come";
        $numofrow = mysqli_num_rows($checkresult);
        if ($numofrow == 0) {
            if ($password == $cpassword) {
                $hashPass = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `Faculty_Details` (`Faculty_Name`,`Faculty_Email`, `designation`, `experience`, `intrest`, `qualification`, `Department_Id`, `Profile_Picture`, `Category`, `password`) VALUES ('$facultyName','$facultyEmail', '$designation', '$experience', '$intrest', '$qualification', '$deptId', '$name', '$category', '$hashPass')";
                echo $sql;
                $result = mysqli_query($conn, $sql);
                mysqli_error($conn);
                if ($result) {
                    header('Location:/bootproject/index.php?category=faculty');
                    die();
                } else {
                    echo "dfvui";
                }
            }
        }
    } else {
        if (move_uploaded_file($tmp, $path_filename_ext)) {
            $check = "SELECT Faculty_Name FROM `Faculty_Details` where Faculty_Name='$facultyName'";
            $checkresult = mysqli_query($conn, $check);
            $facultyName = str_replace(">", "&gt;", $facultyName);
            $facultyName = str_replace("<", "&lt;", $facultyName);
            echo "come";
            $numofrow = mysqli_num_rows($checkresult);
            if ($numofrow == 0) {
                if ($password == $cpassword) {
                    $hashPass = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `Faculty_Details` (`Faculty_Name`,`Faculty_Email`, `designation`, `experience`, `intrest`, `qualification`, `Department_Id`, `Profile_Picture`, `Category`, `password`) VALUES ('$facultyName','$facultyEmail', '$designation', '$experience', '$intrest', '$qualification', '$deptId', '$name', '$category', '$hashPass')";
                    echo $sql;
                    $result = mysqli_query($conn, $sql);
                    mysqli_error($conn);
                    if ($result) {
                        header('Location:/bootproject/index.php?category=faculty');
                        die();
                    } else {
                        echo "dfvui";
                    }
                }
            }
        }
        echo "something went wrong";
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $facutlyname = $_POST['editfacultyname'];
    $designation = $_POST['editfacultydesignation'];
    $experience = $_POST['editfacultyexperience'];
    $intrest = $_POST['editfacultyintrest'];
    $qualification = $_POST['editfacultyqualification'];
    $facutlyid = $_POST['facultyid'];
    // $sql = "UPDATE `tb_dept` SET `dept_name` ='$deptname' WHERE `tb_dept`.`dept_id` = '$deptid'";
    $sql = "UPDATE `Faculty_Details` SET `Faculty_Name` = '$facutlyname', `designation` = '$designation', `experience` = '$experience', `intrest` = '$intrest', `qualification` = ' $qualification' WHERE `Faculty_Details`.`Faculty_Id` = $facutlyid";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        $haschanged = $facutlyname;
    } else {
        $haschanged = $facutlyname;
    }
}
?>

<?php
if (isset($haschanged)) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>information about ' . $haschanged . '!</strong> has changed successfully 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}
?>
<?php
if (session_status() == 1)
    session_start();
$haschanged = false;
include 'components/_db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['editeddeptname'])) {
        $deptname = $_POST['editeddeptname'];
        $deptid = $_POST['deptid'];
        $sql = "UPDATE `tb_dept` SET `dept_name` ='$deptname' WHERE `tb_dept`.`dept_id` = '$deptid'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $haschanged = $deptname;
        } else {
            $haschanged = $deptname;
        }
    } else if (isset($_POST['editeddeptdesc'])) {
        $deptdesc = $_POST['editeddeptdesc'];
        $deptid = $_POST['deptid'];
        $sql = "UPDATE `tb_dept` SET `dept_desc` ='$deptdesc' WHERE `tb_dept`.`dept_id` = '$deptid'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            $haschanged = 'description';
        } else {
            $haschanged = 'description';
        }
    }
}
?>
<?php
include 'components/_db_connect.php';
$sql = "SELECT * FROM tb_dept";
$result = mysqli_query($conn, $sql);
$numofrow = mysqli_num_rows($result);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="components/animation.css" rel="stylesheet">

    <title>Hello, world!</title>
</head>

<body>
    <?php include 'components/_header.php' ?>

    <?php
    if ($haschanged) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $haschanged . '!</strong> has changed successfully 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    ?>
    <div class="card-body my-3 mx-5 mb-3" style="border-radius:25px;border: 1px solid black;background-color:rgba(0,0,0,.03);">
    <?php
    $i = 2;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($i % 2 == 0) {    ?>
            <div class="container marketing my-2">
                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading"><?php echo $row['dept_name']; ?> <span class="text-muted">id.<?php echo $row['dept_id']; ?></span></h2>
                        <p class="lead">Read About Faculties of <?php echo $row['dept_name'] ?></p>
                        <p><a class="btn btn-secondary" href="/bootproject/people.php?deptname=<?php echo $row['dept_name']; ?>&category=<?php echo  $_GET['category']; ?>">See more»</a></p>
                    </div>
                    <div class="col-md-5">

                        <img class="Effect" style="border-radius: 25px;" src="resources/<?php echo $row['dept_id'] ?>.jpg" alt="<?php echo $row['dept_name']; ?>" height="250dp" width="75%">

                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container marketing my-2">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading"><?php echo $row['dept_name']; ?> <span class="text-muted">id.<?php echo $row['dept_id']; ?></span></h2>
                        <p class="lead">Read About Faculties of <?php echo $row['dept_name'] ?></p>
                        <p><a class="btn btn-secondary" href="/bootproject/people.php?deptname=<?php echo $row['dept_name']; ?>&category=<?php echo  $_GET['category']; ?>"">See more»</a></p>
                    </div>
                    <div class=" col-md-5">
                                <img class="Effect" style="border-radius: 25px;" src="resources/<?php echo $row['dept_id'] ?>.jpg" alt="<?php echo $row['dept_name']; ?>" height="250dp" width="75%">

                    </div>
                </div>
            </div>

    <?php  }
        $i++;
    } ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="facultyInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Faculty details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="Faculty.php" method="POST" enctype="multipart/form-data">
                        <div class=" mb-3">
                            <label for="exampleInputEmail1" class="form-label">Faculty Name</label>
                            <input type="text" class="form-control" id="facultyName" name="facultyName" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <div class=" mb-3">
                                <label for="exampleInputEmail1" class="form-label">Faculty Email</label>
                                <input type="text" class="form-control" id="facultyEmail" name="facultyEmail" aria-describedby="emailHelp">
                            </div>
                            <label for="cars">Choose a Department:</label>

                            <select name="deptId" id="cars">
                                <?php
                                $sql = "SELECT * FROM `tb_dept`";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $numofrow = mysqli_num_rows($result);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['dept_id'] . '">' . $row['dept_name'] . '</option>';
                                }
                                ?>

                            </select>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">designation</label>
                                <input type="text" class="form-control" id="designation" name="designation">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">experience </label>
                                <input type="number" class="form-control" id="experience" name="experience">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">intrest </label>
                                <input type="text" class="form-control" id="intrest" name="intrest">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">qualification </label>
                                <input type="text" class="form-control" id="qualification" name="qualification">
                            </div>
                            <div class="mb-3">

                                <label for="exampleInputPassword1" class="form-label">category </label>
                                <div>
                                    <input type="radio" id="faculty" name="category" value="faculty" checked>
                                    <label for="huey">faculty</label>
                                </div>

                                <div>
                                    <input type="radio" id="staff" name="category" value="staff">
                                    <label for="dewey">staff</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Image" class="form-label">Image</label>
                                <input type="file" name="profilepicture">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" id="cpassword">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="facultyInsertButton" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) { ?>
        <div class="container">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#facultyInsert">
                Insert Faculty in database
            </button>
        </div>
    <?php } ?>
    <?php include 'components/_footer.php' ?>
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