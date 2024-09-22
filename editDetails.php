<?php
include 'components/_db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['editchanges'])) {
    $sno = $_POST['sno'];
    print_r($_POST);
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE `userrole` SET  `username` = '$username', `email` = '$email' WHERE `userrole`.`sno` = $sno";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    echo mysqli_error($conn);
    if ($result) {
        echo "thi";
        $showerror = "changed successfully";
        header('Location:/bootproject/index.php?$showerror');
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['editFacultyChanges'])) {
    // print_r($_POST);
    $facultyId = $_POST['facultyId'];
    $facultyUsername = $_POST['username'];
    $facultyEmail = $_POST['email'];
    $designation = $_POST['designation'];
    $experience = $_POST['experience'];
    $intrest = $_POST['intrest'];
    $qualification = $_POST['qualification'];
    $Department_Id = $_POST['deptId'];
    $Profile_Picture = $_POST['Profile_Picture'];
    $category = $_POST['category'];


    $sql = "UPDATE `Faculty_Details` SET `Faculty_Name` = '$facultyUsername', `Faculty_Email` = '$facultyEmail', `designation` = '$designation', `experience` = '$experience', `intrest` = '$intrest', `qualification` = '$qualification', `Department_Id` = '$Department_Id', `Profile_Picture` = '$Profile_Picture', `Category` = '$category' WHERE `Faculty_Details`.`Faculty_Id` = $facultyId";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $showerror = "Login Agian";

        header('Location:/bootproject/components/_logout.php');
        // header('Location:/bootproject/index.php?showerror='.$showerror);
    }
}
?>
<?php

if (isset($_GET['sno'])) {
    $sno = $_GET['sno'];
    $sql = "SELECT * FROM `userrole` WHERE `sno`=$sno";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sno = $row['sno'];
    $username = $row['username'];
    $sno = $row['sno'];
    $email = $row['email'];
} elseif (isset($_GET['facultyId'])) {
    $facultyId = $_GET['facultyId'];
    $sql = "SELECT * FROM `Faculty_Details` where Faculty_Id='$facultyId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $numofrow = mysqli_num_rows($result);
    echo $row['Profile_Picture'] ;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>changes</title>
</head>

<body class="container">
    <?php
    if (isset($_GET['sno'])) { ?>
        <form action="editDetails.php" method="POST">


            <div class="mb-3">
                <input type="hidden" name="sno" value="<?php echo $sno ?>" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">usernname</label>
                <input type="username" name="username" value="<?php echo $username ?>" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" aria-describedby="emailHelp" required>
            </div>
            <button type="submit" name="editchanges" class="btn btn-primary">edit changes </button>
        </form>
    <?php } elseif (isset($_GET['facultyId'])) { ?>
        <form action="editDetails.php" method="POST">


            <div class="mb-3">
                <input type="hidden" name="facultyId" value="<?php echo $row['Faculty_Id'] ?>" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">usernname</label>
                <input type="username" name="username" value="<?php echo $row['Faculty_Name']  ?>" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['Faculty_Email']; ?>" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">designation</label>
                <input type="text" name="designation" value="<?php echo $row['designation']  ?>" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">experience</label>
                <input type="number" name="experience" value="<?php echo $row['experience']  ?>" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">intrest</label>
                <input type="text" name="intrest" value="<?php echo $row['intrest']  ?>" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">qualification</label>
                <input type="text" name="qualification" value="<?php echo $row['qualification']  ?>" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="cars">Choose a Department:</label>

                <select name="deptId" id="cars">
                    <?php
                    $sql = "SELECT * FROM `tb_dept`";
                    $deptresult = mysqli_query($conn, $sql);
                    $numofrow = mysqli_num_rows($deptresult);
                    while ($deptrow = mysqli_fetch_assoc($deptresult)) {
                        echo '<option value="' . $deptrow['dept_id'] . '">' . $deptrow['dept_name'] . '</option>';
                    }
                    ?>

                </select>
            </div>
            
            <div class="mb-3">
                <label for="username" class="form-label">Profile_Picture</label>
                <input type="text" name="Profile_Picture" value="<?php echo $row['Profile_Picture']  ?>" class="form-control" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">

                <label for="exampleInputPassword1" class="form-label">category </label>
                <div>
                    <input type="radio" id="faculty" name="category" value="faculty" checked required>
                    <label for="huey">faculty</label>
                </div>

                <div>
                    <input type="radio" id="staff" name="category" value="staff" required>
                    <label for="dewey">staff</label>
                </div>
            </div>

            <button type="submit" name="editFacultyChanges" class="btn btn-primary">edit changes </button>
        </form>
    <?php }

    ?>


</body>

</html>