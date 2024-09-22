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
        <h3>GRIEVANCE CELL INFORMATION</h3>
        <!-- <hr class="my-4"> -->
        <hr class="my-4">
        <h5>PROCEDURE FOR REDRESSAL OF GRIEVANCES BY STUDENT GRIEVANCE REDRESSAL COMMITTEE</h5>
        <p>
            (as per UGC, New Delhi gazette Notification)
        </p>

        <p style="font-size: 16px;">
        <ul style="list-style-type:disc; line-height:170%;">
        <li>
        Each institution shall, within a period of three months from the date of issue of UGC notification, have an online portal where any aggrieved student may submit an application seeking redressal of grievance.
        </li>
        <li>
        On receipt of an online complaint, the institution shall refer the complaint to the appropriate Student Grievance Redressal Committee, along with its comments within 15 days of receipt of complaint on the online portal.
        </li>
        <li>
        The Student Grievance Redressal Committee, as the case may be, shall fix a date of hearing the complaint which shall be communicated to the institution and the aggrieved student.
        </li>
        <li>
        An aggrieved student may appear either in person or authorize a representative to present the case.
        </li>
        <li>
        Grievances not resolved by the University Student Grievance Redressal Committee shall be referred to the Ombud sperson, within the time period provided in regulations.
        </li>
        <li>
        Institutions shall extend co-operation to the Ombuds person or the Student Grievance Redressal Committee, as the case may be, in early redressal of grievance, and failure to do so may be reported by the Ombuds person to the Commission, which shall take action in accordance with the provisions of regulations.
        </li>
        <li>
        The ombuds persons shall, after giving reasonable opportunities of being heard to both parties, on the conclusion of proceedings, pass such order, with reason there for, as may be deemed fit to redress the grievance and provide such relief as may be appropriate to the aggrieved student.
        </li>
        <li>
        The institution, as well as the aggrieved student, shall be provided with copies of the order under the signature of the Ombudsperson, and the institution shall place it for general information on its website.
        </li>
        <li>
        The institution shall comply with the recommendations of the Ombuds person; and the Ombuds person shall report to the Commission any failure on the part of the institution to comply with the recommendations.
        </li>
        <li>
        The ombuds person may recommend appropriate action against the complainant, where a complaint is found to be false or frivolous.</li>
        
        </ul>
        </p>
    
        <h6>Website for more details UGC Grievance: <a class="a" href="https://www.ugc.ac.in/grievance">https://www.ugc.ac.in/grievance</a><br>
        For any grievance, write to us: <a class="a" href="mailto:gecsrt612@gmail.com">gecsrt612@gmail.com</a>
        </h6>
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