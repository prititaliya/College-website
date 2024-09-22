<?php
// session_start();
if (session_status() == 1)
  session_start();
include "components/online_users.php";
$GLOBALS['a'] = 10;
include 'components/_db_connect.php';
if (isset($_POST['labInsertButton'])) {
  echo "this";
  $labId = $_POST['labid'];
  $labName = $_POST['labName'];
  $deptId = $_POST['deptId'];
  $labDesc = $_POST['labDesc'];
  $name = $_FILES['labImage']['name'];
  $tmp = $_FILES['labImage']['tmp_name'];
  echo $_POST['lanName'];
  // move_uploaded_file($tmp, "resorces/" . $name);
  $path = pathinfo($name);
  $target_dir = "resources/";
  $ext = $path['extension'];
  $path_filename_ext = $target_dir . $name;
  if (move_uploaded_file($tmp, $path_filename_ext)) {
    $sql = "INSERT INTO `deptLab` (`labId`, `deptId`, `labName`, `labImage`, `labDesc`) VALUES ($labId, $deptId, $labName, $name, $labDesc)";
    echo "come";
    mysqli_query($conn, $sql);
    mysqli_error($conn);
    header('Location:/bootproject/Labs.php');
  }
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

  <title>Home Page</title>
  <style>
    .cardBody {
      text-align: center;
    }

    .cardEffect {
      transition: all 0.2s ease;
      cursor: pointer;
    }

    .cardEffect:hover {
      box-shadow: 5px 6px 6px 2px #e9ecef;
      transform: scale(1.1)
    }

    .textanim {
      color: black;
      position: relative;
      animation: text 3s 1;
    }

    @keyframes text {
      0% {
        color: black;
        margin-bottom: -40px;
      }

      30% {
        letter-spacing: 25px;
        margin-bottom: -40px;
      }

      85% {
        margin-bottom: -40px;
      }
    }
  </style>
</head>

<body>
  <?php include "components/_header.php"; ?>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET['showerror'])) {
    $showerror = $_GET['showerror'];;
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>' . $showerror . '</strong> please try again
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  } else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['justsignup'])) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Now You Can Login </strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['isdatachaged'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>data changed successfully! </strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>

  <?php $_GET['dept'] = "index";
  include "components/_slider.php" ?>

  <!-- <div class="container my-2"> -->
  <!-- <div class="row text-center">
    <div class="col-md-4 cardEffect">
        
</div>

</div> -->
  <div class="row mt-2 p-2">
    <div class="col-md-9">
      <div class="flex card-body d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="border: 1px solid black;background-color:rgba(0,0,0,.03); border-radius: 25px; width:100% ">
        <h4 style="text-align: center;" class="my-2">About <br>Dr. S. & S. S. Ghandhy College Of Engineering & Technology,Surat</h4>
        <!-- <hr class="my-4"> -->
        <p>Dr. S & S. S. Ghandhy College of Engineering & Technology is situated at heart of SURAT, the second largest city of Gujarat State. This Institute is one of the oldest and largest Technical Institution of Gujarat. It was established in June 1955. The donor late Dr. SORABJI & SAROSH SORABJI GHANDHY, a local Medical Practitioner, was the Prime Driving Force behind the establishment of this Institute, who donated Rs. 0.52 million in the year of 1952. Actually, he had a dream of starting a Degree Engineering College, not just a Polytechnic and so, he named the college as Dr. S. & S. S. GHANDHY COLLEGE OF ENGINEERING & TECHNOLOGY. Later on, The Government of Bombay State acquired the land building and equipments at the cost of Rs. 0.605 Million. Currently, the institute is administered by Directorate of Technical Education (DTE), Govt of Gujarat. All the programmes of the institute are AICTE approved and the institute is affiliated to Gujarat Technological University (GTU), Chandkheda, Gujarat.
        </p>

        <hr class="my-4">

        <h4 style="text-align: center;" class="my-2">Vision</h4>
        <p style="font-size: 20px;">“To be a unique center of excellence in technical education & innovation for sustainable growth of industry and society.”</p>

        <hr class="my-4">

        <h4 style="text-align: center;" class="my-2">Mission</h4>
        <ol>
          <li>To impart globally viable technical core competencies and skills.</li>
          <li>To respond effectively to the ever changing needs of industry and community at large.</li>
          <li>To promote conducive campus environment and resources for qualitative education and innovation. </li>
          <li>To inculcate moral, ethical and professional values amongst all internal stakeholders.</li>
        </ol>

        <hr class="my-4">

        <h4 style="text-align: center;" class="my-2">Principal's Message:</h4>
        <p>
          In the new environment of liberalization, the field of technical education have been facing the challenges not only from inside but also from the outside world. It has changed the role of teachers, administrators, and planners involved in the field of technical education. The barrier between a classroom and an industry, anywhere in the world, is now very transparent with respect to technology. The large number of national & international technical institutes, who are wrestling to employee their students, are in search of innovative teaching methods. Our institute, which is the oldest in South Gujarat region, is committed to provide quality education, to produce young entrepreneurs, and to involve themselves for the benefits of all stakeholders.<br>
          <b>- Shri N.A.Sangani (I/C Principal)</b>
        </p>

        <hr class="my-4">

        <p>
          Accreditation Status of the Programs of the Institute.<br>
          For more details : <a href="http://www.ssgc.cteguj.in/uploads/7680/Accreditation_status_compressed.pdf" >Click here</a> <br>

          <hr class="my-4">

          <b>Extension of Approval Letter: <a href="http://www.ssgc.cteguj.in/uploads/7680/Accreditation_status_compressed.pdf">Click Here</a><br>
            AICTE Mandatory Disclosures (Annexure-10): Click Here<br>
            Affiliation status of the institute:</b> <a href="https://www.gtu.ac.in/Affilation.aspx">https://www.gtu.ac.in/Affilation.aspx</a> (Affiliated to Gujarat Technological University, Chandkheda, Gujarat - 382424)<br>
          NOTE: Select 2019 in year filter to see the current affiliation status of institute with university. (Institute Code:612)<br>

          <hr class="my-4">

          <b>Institute AUDIT Report: <a href="http://www.ssgc.cteguj.in/uploads/7680/SSGC_AUDIT.pdf">Click Here</a></b><br>
          <b>Institute Expenditure Report: <a href="http://www.ssgc.cteguj.in/uploads/7680/SSGP_Expenditure_2020-21.pdf">F.Y.2020-21</a></b><br>
          <b>Institute IQAC Order:<a href="http://www.ssgc.cteguj.in/uploads/7680/IQAC_Office_Order.pdf"> Click Here </a></b><br>
          <b>List of Faculty Members at the Institute: <a href="http://www.ssgc.cteguj.in/uploads/7680/List_Faculty2021.pdf"> Click Here </a></b><br>
          <b>SC/ST Cell: <a href="http://www.ssgc.cteguj.in/uploads/7680/SCSTWEBUpload.pdf"> Click Here </a></b><br>
          <b>Current Year Institute Academic Calendar: <a href="http://www.ssgc.cteguj.in/uploads/7680/SSGP_Academic_Calendar_Term_211.pdf"> Click Here </a></b><br>
        </p>
      </div>
    </div>

    <div class="col-md-3">
      <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="max-height: 1531px;
      overflow-y: auto; width: 100%; border: 1px solid black;background-color:rgba(0,0,0,.03); border-radius: 25px; width:100% ">
        <div style="text-align: center;" class="my-3">
          <span style="justify-content: center;" class="fs-5 fw-semibold"><b>News Letter</b></span>
        </div>
        <?php
        include 'components/_db_connect.php';
        $newsQuery = "SELECT * FROM `news` ORDER BY `date` DESC ";
        $newsResult = mysqli_query($conn, $newsQuery);
        // $newRow=mysqli_fetch_assoc($newsResult);
        // print_r($newRow);
        while ($newsRow = mysqli_fetch_assoc($newsResult)) {
          echo '<a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
          <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">' . $newsRow['news_title'] . '</strong>
            <small class="text-muted">' . $newsRow['date'] . '</small>
          </div>
          <div class="col-10 mb-1 small">' . $newsRow['news_description'] . '</div>
        </a>';
        }
        ?>

        <!-- <hr class="mx-2"> -->
      </div>
      <?php
      if(isset($_SESSION['role']))
      if ($_SESSION['role'] == 'admin') { ?>
        <p class="lead">
          <a class="btn btn-link" href="news.php" role="button"><button type="button" class="btn btn-outline-primary">Enter news</button>
          </a>
        </p>

      <?php
      }
      ?>
    </div>

  </div>
  </div>

  <!-- <div class="container">
        <hr class="my-4">
    </div> -->
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