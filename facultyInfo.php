<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submitEditedInformation'])) {
    print_r($_POST);
    include 'components/_db_connect.php';
   $information=$_POST['editedInfomation'];
   $informationToBeChange=$_POST['informationToBeChanged'];
   $facuId=$_GET['facultyId'];
   $porteditsql="UPDATE `Faculty_Details` SET `$informationToBeChange` = '$information' WHERE `Faculty_Details`.`Faculty_Id` = $facuId";
   echo $porteditsql;
   $porResult=mysqli_query($conn,$porteditsql);
   if($porResult){
       echo "in if statement";
       header('Location:index.php?isdatachaged=data changed successfully');
    //    ob_end_flush();
       exit();
   }else{
       echo "in  else stat";
       header('Location:index.php?showerror=data could not changed');
       mysqli_error($conn);
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
                        <a class="nav-link" aria-current="true" href="<?php echo "facultydetail.php" . '?facultyname=' . $_GET['facultyname']; ?>">About <?php echo $_GET['facultyname']; ?></a>
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
                        <a class="nav-link '; ?><?php if ($_GET['type'] == 'Education') {
                            echo 'active';
                          } ?><?php echo '" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=Education">Educational Qualification	</a>
                          </li>';
                    }
                    if($tabWork !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link '; ?><?php if ($_GET['type'] == 'work') {
                            echo 'active';
                          } ?><?php echo '" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=work">Work Experience	</a>
                          </li>';
                    }
                    if($tabSkills !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link '; ?><?php if ($_GET['type'] == 'skills') {
                            echo 'active';
                          } ?><?php echo '" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=skills">Skills and Knowledge	</a>
                          </li>';
                    }
                    if($tabCourse !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link '; ?><?php if ($_GET['type'] == 'course') {
                            echo 'active';
                          } ?><?php echo '" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=course">Course</a>
                          </li>';
                    }
                    if($tabPro !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link '; ?><?php if ($_GET['type'] == 'professionals') {
                            echo 'active';
                          } ?><?php echo '" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=professionals">Professional Membership	</a>
                          </li>';
                    }
                    if($tabPort !=NULL){
                        echo '<li class="nav-item">
                        <a class="nav-link '; ?><?php if ($_GET['type'] == 'portfolioes') {
                            echo 'active';
                          } ?><?php echo '" href="facultyInfo.php?facultyname='.$_GET['facultyname'].'&type=portfolioes">Portfolios</a>
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
                    <?php if($_GET['type']=='Education'){ ?>
                        <?php 
                        echo $row['Educational Qualification'];
                        ?>
                        <?php }elseif($_GET['type']=='work'){?>
                            <?php 
                        echo $row['Work Experience'];
                        ?>
                            <?php }elseif($_GET['type']=='skills'){?>
                            <?php 
                        echo $row['Skill And Knowledge'];
                        ?>
                            <?php }elseif($_GET['type']=='course'){?>
                            <?php 
                        echo $row['Course Taught'];
                        ?>
                            <?php }elseif($_GET['type']=='professionals'){?>
                            <?php 
                        echo $row['Professional Membership'];
                        ?>
                            <?php }elseif($_GET['type']=='portfolioes'){?>
                            <?php 
                        echo $row['Portfolios'];
                        ?>
                            <?php }  ?>
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
<div class="modal" id="editFacultyInfo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Faculty Information </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if(isset($_GET['type']) and $_GET['type']=='Education'){?>
                    <form action="facultyInfo.php?facultyId=<?php echo $tabFacultyId;?>" method="POST">
                    <div class="mb-3">

                        <input type="hidden" value="<?php echo $row['Faculty_Id']; ?>" name="facultyid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        <label for="just"><?php echo $row['Faculty_Id']; ?></label>
                        <input type="hidden" value="<?php echo $row['Faculty_Id']; ?>" name="facultyid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        <input type="hidden" value="Educational Qualification" name="informationToBeChanged" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change Portfolios</label>
                        <textarea rows="10" cols="20" name="editedInfomation" class="form-control" id="editeddeptname" aria-describedby="emailHelp"> <?php echo $row['Educational Qualification']; ?> </textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submitEditedInformation" class="btn btn-primary">Save changes</button>
            </div>
            </form><?php }else if(isset($_GET['type']) and $_GET['type']=='work'){ ?>
                <form action="facultyInfo.php?facultyId=<?php echo $tabFacultyId;?>" method="POST">
                    <div class="mb-3">

                        <input type="hidden" value="<?php echo $row['Faculty_Id']; ?>" name="facultyid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        <input type="hidden" value="Work Experience" name="informationToBeChanged" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change Portfolios</label>
                        <textarea rows="10" cols="20" name="editedInfomation" class="form-control" id="editeddeptname" aria-describedby="emailHelp"> <?php echo $row['Work Experience']; ?> </textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submitEditedInformation" class="btn btn-primary">Save changes</button>
            </div>
            </form>

                <?php }else if(isset($_GET['type']) and $_GET['type']=='skills'){ ?>
                <form action="facultyInfo.php?facultyId=<?php echo $tabFacultyId;?>" method="POST">
                    <div class="mb-3">

                        <input type="hidden" value="<?php echo $row['Faculty_Id']; ?>" name="facultyid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        <input type="hidden" value="Skill And Knowledge" name="informationToBeChanged" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change Portfolios</label>
                        <textarea rows="10" cols="20" name="editedInfomation" class="form-control" id="editeddeptname" aria-describedby="emailHelp"> <?php echo $row['Skill And Knowledge']; ?> </textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submitEditedInformation" class="btn btn-primary">Save changes</button>
            </div>
            </form>

                <?php } else if(isset($_GET['type']) and $_GET['type']=='course'){ ?>
                <form action="facultyInfo.php?facultyId=<?php echo $tabFacultyId;?>" method="POST">
                    <div class="mb-3">

                        <input type="hidden" value="<?php echo $row['Faculty_Id']; ?>" name="facultyid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        <input type="hidden" value="Course Taught" name="informationToBeChanged" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change Portfolios</label>
                        <textarea rows="10" cols="20" name="editedInfomation" class="form-control" id="editeddeptname" aria-describedby="emailHelp"> <?php echo $row['Course Taught']; ?> </textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submitEditedInformation" class="btn btn-primary">Save changes</button>
            </div>
            </form>

                <?php }else if(isset($_GET['type']) and $_GET['type']=='professionals'){ ?>
                <form action="facultyInfo.php?facultyId=<?php echo $tabFacultyId;?>" method="POST">
                    <div class="mb-3">

                        <input type="hidden" value="<?php echo $row['Faculty_Id']; ?>" name="facultyid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        <input type="hidden" value="Professional Membership" name="informationToBeChanged" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change Portfolios</label>
                        <textarea rows="10" cols="20" name="editedInfomation" class="form-control" id="editeddeptname" aria-describedby="emailHelp"> <?php echo $row['Professional Membership']; ?> </textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submitEditedInformation" class="btn btn-primary">Save changes</button>
            </div>
            </form>

                <?php }else if(isset($_GET['type']) and $_GET['type']=='portfolioes'){ ?>
                <form action="facultyInfo.php?facultyId=<?php echo $tabFacultyId;?>" method="POST">
                    <div class="mb-3">

                        <input type="hidden" value="<?php echo $row['Faculty_Id']; ?>" name="facultyid" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                        <input type="hidden" value="Portfolios" name="informationToBeChanged" " class=" form-control" id="editeddeptname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="labelname" class="form-label">Change Portfolios</label>
                        <textarea rows="10" cols="20" name="editedInfomation" class="form-control" id="editeddeptname" aria-describedby="emailHelp"> <?php echo $row['Portfolios']; ?> </textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submitEditedInformation" class="btn btn-primary">Save changes</button>
            </div>
            </form>

                <?php }?>
        </div>
    </div>
</div>