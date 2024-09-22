<?php 
session_start();
ob_start();
include 'components/_header.php';
include 'components/_db_connect.php';
if(isset($_POST['submitEducation']) and isset($_POST['education'])){
    $education=$_POST['education'];
    $name=$_GET['facultyName'];
    $eduSql="UPDATE `Faculty_Details` SET `Educational Qualification` = '$education' WHERE `Faculty_Details`.`Faculty_Name` = '$name'";
    $eduResult=mysqli_query($conn,$eduSql);
    if($eduResult){
        header('Location:index.php');
        ob_end_flush();
        exit();
    }else{
        echo mysqli_error($conn);
    }
    
}
if(isset($_POST['submitWork']) and isset($_POST['work'])){
    $work=$_POST['work'];
    $name=$_GET['facultyName'];
    $eduSql="UPDATE `Faculty_Details` SET `Work Experience` = '$work' WHERE `Faculty_Details`.`Faculty_Name` = '$name'";
    $eduResult=mysqli_query($conn,$eduSql);
    if($eduResult){
        header('Location:index.php');
        ob_end_flush();
        exit();
    }else{
        echo mysqli_error($conn);
    }
    
}
if(isset($_POST['submitProfessional']) and isset($_POST['Professional'])){
    $Professional=$_POST['Professional'];
    $name=$_GET['facultyName'];
    $eduSql="UPDATE `Faculty_Details` SET `Professional Membership` = '$Professional' WHERE `Faculty_Details`.`Faculty_Name` = '$name'";

    $eduResult=mysqli_query($conn,$eduSql);
    if($eduResult){
        header('Location:index.php');
        ob_end_flush();
        exit();
    }else{
        echo mysqli_error($conn);
    }
    
}
if(isset($_POST['submitCourse']) and isset($_POST['Course'])){
    $Course=$_POST['Course'];
    $name=$_GET['facultyName'];
    $eduSql="UPDATE `Faculty_Details` SET `Course Taught` = '$Course' WHERE `Faculty_Details`.`Faculty_Name` = '$name'";
    $eduResult=mysqli_query($conn,$eduSql);
    if($eduResult){
        header('Location:index.php');
        ob_end_flush();
        exit();
    }else{
        echo mysqli_error($conn);
    }
    
}
if(isset($_POST['submitPortfolios']) and isset($_POST['Portfolios'])){
    $Portfolios=$_POST['Portfolios'];
    $name=$_GET['facultyName'];
    $eduSql="UPDATE `Faculty_Details` SET `Portfolios` = '$Portfolios' WHERE `Faculty_Details`.`Faculty_Name` = '$name'";
    $eduResult=mysqli_query($conn,$eduSql);
    if($eduResult){
        header('Location:index.php');
        ob_end_flush();
        exit();
    }else{
        echo mysqli_error($conn);
    }
    
}
if(isset($_POST['submitSkills']) and isset($_POST['skills'])){
    echo "skills";
    $skills=$_POST['skills'];
    $name=$_GET['facultyName'];
    $eduSql="UPDATE `Faculty_Details` SET `Skill And Knowledge` = '$skills' WHERE `Faculty_Details`.`Faculty_Name` = '$name'";
    echo $eduSql;
    $eduResult=mysqli_query($conn,$eduSql);
    if($eduResult){
        header('Location:index.php');
        ob_end_flush();
        exit();
    }else{
        echo mysqli_error($conn);
    }
    
}
?>
<?php 
$FacultyName=$_GET['facultyName'];
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

if($tabEDUQU ==NULL){?>
   <form action="insertFacultyInfo.php?facultyName=<?php echo $_GET['facultyName']; ?>" method="POST" class="container">
  <div class="mt-3">
    <label for="exampleInputEmail1" class="form-label">Educational Qualification</label >
    <textarea name="education" required></textarea>
    <button type="submit" name="submitEducation" class="btn btn-primary">add Educational Qualification</button>
  </div>
  
</form>
<?php }
if($tabWork ==NULL){?>
    <form action="insertFacultyInfo.php?facultyName=<?php echo $_GET['facultyName']; ?>" method="POST" class="container">
   <div>
     <label for="exampleInputEmail1" class="form-label" style="text-align:center;">Work Experience</label>
   </div>
   <div><textarea name="work" required ></textarea></div>
   <div>
   <button type="submit" name="submitWork" class="btn btn-primary" text-align:right;">add Work Experience</button>
   </div>
 </form>
 <?php }
//   echo '<hr class="my-4">';
echo "<br>";
if($tabSkills ==NULL){?>
    <form action="insertFacultyInfo.php?facultyName=<?php echo $_GET['facultyName']; ?>" method="POST" class="container">
   <div>
     <label for="exampleInputEmail1" class="form-label">Skill And Knowledge	</label>
   </div>
   <div>
       <textarea name="skills"  required></textarea>
  </div>
   <div>
   <button type="submit" name="submitSkills" class="btn btn-primary">add Skill And Knowledge</button>
   </div>
 </form>
 <?php }
 echo '<hr class="my-4">';
if($tabCourse ==NULL){?>
    <form action="insertFacultyInfo.php?facultyName=<?php echo $_GET['facultyName']; ?>" method="POST" class="container">
   <div class="mt-3">
     <label for="exampleInputEmail1" class="form-label">Course Taught</label>
     
   </div>
   <div>
   <textarea name="Course" required></textarea>
   </div>
   <div>
   <button type="submit" name="submitCourse" class="btn btn-primary">add Course Taught</button>
   </div>
 </form>
 <?php }
 echo '<hr class="my-4">';
if($tabPro ==NULL){?>
    <form action="insertFacultyInfo.php?facultyName=<?php echo $_GET['facultyName']; ?>" method="POST" class="container">
   <div>
     <label for="exampleInputEmail1" class="form-label">Professional Membership</label>
   </div>
   <div>
        <textarea name="Professional" required></textarea>
   </div>
   <div>
   <button type="submit" name="submitProfessional" class="btn btn-primary">Professional Membership</button>
   </div>
 </form>
 <?php }
 echo '<hr class="my-4">';
if($tabPort ==NULL){?>
    <form action="insertFacultyInfo.php?facultyName=<?php echo $_GET['facultyName']; ?>" method="POST" class="container">
   <div>
     <label for="exampleInputEmail1" class="form-label">Portfolios</label>
   </div>
   <div>
   <textarea name="Portfolios" required></textarea>
   </div>
   <div>
   <button type="submit" name="submitPortfolios" class="btn btn-primary">add Portfolios</button>
   </div>
 </form>
 <?php }
?>

<?php 

include 'components/_footer.php';
?>