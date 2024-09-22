<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labs</title>
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
<body>
    
</body>
</html>

<?php
session_start();
include 'components/_header.php';
?>
<?php
$deptId = $_GET['deptId'];
$sql = "SELECT dept_name FROM `tb_dept` WHERE `dept_id`='$deptId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$deptname = $row['dept_name'];
$result = mysqli_query($conn, $sql);
$numofrow = mysqli_num_rows($result);
$deptidquery = "SELECT * FROM `tb_dept` WHERE `dept_name` LIKE '$deptname'";
$deptidResult = mysqli_query($conn, $deptidquery);
$deptiRow = mysqli_fetch_assoc($deptidResult);
$deptId = $deptiRow['dept_id'];
$i = 2;
$sql = "SELECT * FROM `deptLab` WHERE deptId='$deptId' ";
$result = mysqli_query($conn, $sql);
$numofrow = mysqli_num_rows($result);
?>
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo 'departmentdetail.php?deptname=' . $deptname; ?>">About <?php echo $deptname; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="<?php echo 'people.php' . '?deptname=' . $deptname . "&category=faculty"; ?>">FACULTY of <?php echo $deptname; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="<?php echo 'people.php' . '?deptname=' . $deptname . "&category=staff"; ?>">STAFF of <?php echo $deptname; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    <?php
                    if ($_SERVER['PHP_SELF'] == "/bootproject/departmentLabs.php") {
                        echo "active";
                    } ?>
                    " href="<?php echo "departmentLabs.php" . '?deptname=' . $deptname . '&deptId=' . $deptId; ?>">Labs</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <h1 class="card-title"><?php echo $deptname; ?></h1>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                if ($i % 2 == 0) {    ?>
                    <div class="container">
                        <div class="container marketing my-3">
                            <div class="row featurette">
                                <div class="col-md-7 order-md-2">
                                    <h2 align='left' class="featurette-heading"><?php echo $row['labName']; ?>
                                        <p align='left' class="lead">Lab for : <?php echo $deptname; ?></p>
                                        <p align='left' class="lead">Description : <?php echo $row['labDesc'];
                                         ?></p>
                                        <?php if (isset($_SESSION['role'])) if ($_SESSION['role'] == 'admin') {
                                            echo '<p align="left"><a class="btn btn-secondary" href="/bootproject/labDetails.php?labId=' . $row['labId'] . '">Change Data»</a></p>';
                                        } ?>

                                </div>
                                <div class="col-md-5">
                                    <?php
                                    echo '<img class="Effect" style="width:75%; border-radius: 25px;" width="225" height="225" src="resources/' . $row['labImage'] . '" >';
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="container marketing my-3">
                        <div class="row featurette">
                            <div class=" col-md-7">
                                <h2 align='left' class="featurette-heading"><?php echo $row['labName']; ?>
                                    <p align='left' class="lead">Lab for : <?php echo $deptname; ?></p>
                                    <p align='left' class="lead">Description : <?php echo $row['labDesc']; ?></p>
                                    <?php if (isset($_SESSION['role'])) if ($_SESSION['role'] == 'admin') {
                                        echo '<p align="left"><a class="btn btn-secondary" href="/bootproject/labDetails.php?labId=' . $row['labId'] . '">Change Data»</a></p>';
                                    } ?>
                            </div>
                            <div class="col-md-5">
                                <?php
                                echo '<img class="Effect" style="width:75%; border-radius: 25px;" width="225" height="225" src="resources/' . $row['labImage'] . '" >';
                                ?>˝

                            </div>
                        </div>
                    </div>
            <?php  }
                $i++;
            } ?>
        </div>
    </div>

    <hr class="my-4">
    <a class="btn btn-outline-warning btn-lg mx-3" href="index.php" role="button">Go to Home Page</a>
    <hr class="my-4">
</div>

<?php
include 'components/_footer.php';
?>
