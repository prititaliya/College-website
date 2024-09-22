<?php
session_start();
include 'components/_header.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .a:hover{ color: #06e;}
        .a{color: #00e; }
        .a:visited { color: #551a8b; }
       div { border-color: black; }
       td{
        border: 1px dotted;
       }
       th,tr,td{
           padding: 5px;
           border: 2px solid;
       }
       .table{
        border-width: 1px;
        border-spacing: 2px;
        border-style: outset;
        border-color: gray;
        border-collapse: separate;
        background-color: white;
       }
    </style>

    <title>Hello, world!</title>
</head>

<body>
    <div class="card-body my-3 mx-5 mb-3" style="border: 1px solid black;background-color:rgba(0,0,0,.03);  border-radius: 25px;">
        <h3>STUDENT START UP & INNOVATION INFORMATION</h3>
        <hr class="my-4">
        <h5>About SSIP Policy</h5>
        
        <p style="font-size: 16px;">
          
        Government of Gujarat has developed a policy for providing assistance to Startups/ Innovation. Under this scheme, any individual/ group of individuals having innovative idea/ Concept will be eligible and/ or Universities/ education institutions, Incubation Centre/ PSUs/ R&D Institutions/ Private and other establishments will be eligible as an institution to support and mentor to innovators as approved by Committee. Startups in an economy's technology sectors is an important indicator of technological performance for several reasons.<br>

        <!-- <hr class="my-4"> -->
        <ul> <li>
        <b>Institute SSIP Report:</b> <a href="http://www.ssgc.cteguj.in/uploads/7680/ssip_institute_report_Sep2021.pdf">Click Here</a><br> </li>
        <li>
        <b>Final projects at Institute :</b> <a href="http://www.ssgc.cteguj.in/uploads/7680/SSIP.pdf">Click Here</a><br> </li> </ul>
        For more detail of various events please visit : <a href="http://ssipgujarat.in/">SSIP Gujarat</a><br>
        </p>

    </div>

    <?php include "components/_footer.php"; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>