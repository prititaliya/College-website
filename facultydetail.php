<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['loginAsFaculty'])) {
    include 'components/_db_connect.php';
    $username = $_POST['username'];
    $facultyId = $_POST['facultyId'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `Faculty_Details` where Faculty_Name='$username' and `Faculty_Id` = '$facultyId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $numofrow = mysqli_num_rows($result);
    if ($numofrow == 1) {
        $haspass = password_hash($password, PASSWORD_DEFAULT);
        if (password_verify($password, $row['password'])) {
            if (session_status() == 2) {
                session_destroy();
            }
            if (session_status() == 1)
                session_start();
            $_SESSION['username'] = $username;
            $_SESSION['roleFaculty'] = 'faculty';
            $_SESSION['role'] = 'faculty';
            $_SESSION['department_id'] = $row['Department_Id'];
            header('Location:/bootproject/index.php');
            exit();
        } else {
            $showerror = "password incorrect";
            header('Location:/bootproject/index.php?showerror='.$showerror);
        }
    } else {

        $sqlid = "SELECT * FROM `Faculty_Details` where `Faculty_Id` = '$facultyId'";
        $resultid = mysqli_query($conn, $sqlid);
        $rowid = mysqli_fetch_assoc($resultid);
        $numofrowid = mysqli_num_rows($resultid);
        echo $numofrowid;
        if($numofrowid==1){
            $showerror = "username is incorrect";
        }elseif($numofrowid==0){
            $showerror="id is incorrect";
        }
        
        header('Location:/bootproject/index.php?showerror=' . $showerror);
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'components/_header.php';
    include 'components/_db_connect.php';
    $FacultyName = $_GET['facultyname'];
    $sql = "SELECT * FROM `Faculty_Details` WHERE Faculty_Name='$FacultyName'";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

?>
<head>
<style>
        .Effect {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .Effect:hover {
            box-shadow: 5px 6px 6px 2px #e9ecef;
            transform: scale(1.1)
        }
    </style>
</head>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="<?php echo $_SERVER['PHP_SELF'] . '?facultyname=' . $_GET['facultyname']; ?>">About <?php echo $_GET['facultyname']; ?></a>
                </li>
                    <?php
                    $tabSql="SELECT `Faculty_id`,`Educational Qualification`,`Work Experience`,`Skill And Knowledge`,`Course Taught`,`Professional Membership`,`Portfolios` FROM `Faculty_Details` WHERE `Faculty_Name` ='$FacultyName'";
                    // echo $tabSql;
                    $tabResult=mysqli_query($conn,$tabSql);
                    $tabRow=mysqli_fetch_assoc($tabResult);
                    // var_dump($tabRow);
                    $tabFacultyId=$tabRow['Faculty_id'];
                    $tabEDUQU=$tabRow['Educational Qualification'];
                    $tabWork=$tabRow['Work Experience'];
                    $tabSkills=$tabRow['Skill And Knowledge'];
                    $tabCourse=$tabRow['Course Taught'];
                    $tabPro=$tabRow['Professional Membership'];
                    $tabPort=$tabRow['Portfolios'];
                    // echo $tabRow['Portfolios'];
                    if($tabEDUQU !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=Education">Educational Qualification	</a>
                          </li>';
                    }
                    if($tabWork !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=work">Work Experience</a>
                          </li>';
                    }
                    if($tabSkills !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=skills">Skills and Knowledge</a>
                          </li>';
                    }
                    if($tabCourse !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=course">Course</a>
                          </li>';
                    }
                    if($tabPro !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=professionals">Professional Membership</a>
                          </li>';
                    }
                    if($tabPort !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=portfolioes">Portfolios</a>
                          </li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="card-body">
                <div class="container" align="left">
                    <div class="col-md-5">
                        <!-- <img class="Effect" width="55%" height="85%" style="border-radius: 25px;" src="facultyProfilePicture/<?php echo $row['Profile_Picture']; ?> "> -->
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Information About <?php echo $_GET['facultyname']; ?></h5>
                        <p class="lead">Designation: <?php echo $row['designation']; ?></p>
                        <p class="lead">Experience: <?php echo $row['experience']; ?> Years</p>
                        <p class="lead">Intrest Of Fields: <?php echo $row['intrest']; ?></p>
                        <p class="lead">Qualification: <?php echo $row['qualification']; ?></p>

                    </div>

                </div>
            </div>
            <?php
            if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) { ?>
                <p class="lead">
                    <a class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editFacultyInfo" role="button"><button type="button" class="btn btn-outline-primary">edit Information of <?php echo  $_GET['facultyname']; ?></button></a>
                </p>
                <?php if($tabEDUQU== NULL or $tabWork == NULL or $tabSkills==NULL or $tabCourse==NULL or $tabPro==NULL or $tabPort==NULL) {?>
                <p class="lead">
                <a class="btn btn-outline-warning btn-lg mx-3" href="insertFacultyInfo.php?facultyName=<?php echo $_GET['facultyname'] ?>" role="button">Add more information About <?php echo  $_GET['facultyname']; ?> </a>
                </p>
            <?php }} elseif (isset($_GET['Login'])) {
                echo '<p class="lead">
                        <a class="btn btn-link" role="button"><button data-bs-toggle="modal" data-bs-target="#LoginFacultyModal" type="button" class="btn btn-outline-primary">Login As faculty</button></a>
                    </p>';
            }
            ?>
        </div>
        <hr class="my-4">
        <a class="btn btn-outline-warning btn-lg mx-3" href="index.php" role="button">Go to Home Page</a>
        <hr class="my-4">
    </div>
<?php
    include 'components/_footer.php';
} ?>



<div class="modal fade" id="LoginFacultyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Login to procced further </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="facultydetail.php" method="post">

                    <div class="mb-3">
                        <label for="username" class="form-label">faculty id</label>
                        <input type="username" name="facultyId" class="form-control" id="username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">usernname</label>
                        <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="loginAsFaculty" class="btn btn-primary">login</button>
                <button type="button" name="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal" id="editFacultyInfo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Faculty Information </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Faculty.php?category=faculty" method="POST">
                    <div class="mb-3">

                        <input type="hidden" value="<?php echo $row['Faculty_Id']; ?>" name="facultyid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        <label for="just"><?php echo $row['Faculty_Id']; ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change name <?php echo $row['Faculty_Name']; ?></label>
                        <input type="text" name="editfacultyname" value="<?php echo $row['Faculty_Name']; ?>" class="form-control" id="editfacultyname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change <?php echo $row['designation']; ?></label>
                        <input type="text" name="editfacultydesignation" value="<?php echo $row['designation']; ?>" class="form-control" id="editfacultydesignation" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change <?php echo $row['experience']; ?></label>
                        <input type="text" name="editfacultyexperience" value="<?php echo $row['experience']; ?>" class="form-control" id="editfacultyexperience" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change <?php echo $row['intrest']; ?></label>
                        <input type="text" name="editfacultyintrest" value="<?php echo $row['intrest']; ?>" class="form-control" id="editfacultyintrest" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change <?php echo $row['qualification']; ?></label>
                        <input type="text" name="editfacultyqualification" value="<?php echo $row['qualification']; ?>" class="form-control" id="editfacultyqualification" aria-describedby="emailHelp">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>