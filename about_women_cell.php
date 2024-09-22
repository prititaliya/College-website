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
        <h3>Women Cell</h3>
        <hr class="my-4">
        <p style="font-size: 16px;">
        Women development cell of Dr .S and S.S. Ghandhy College of Engineering and Technology aims to instil positive self-esteem and confidence in females of the institute. It provides a platform where young women are groomed to face challenges of life with head held high. The women development cell conducts programs that foster the above aim.
        As per office order :SSGP/HC/Committee/E-3/1078 dated 25/06/2021 Members of WDC are as under:
        </p>

        <table class="table">
            <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Committee Designation</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Shri N.A Sangani</td>
                <td>Principal</td>
                <td>Chairman</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Smt. B.H. Goyal</td>
                <td>HOD Metallurgy  Engg.</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Smt. S.S. Maitra</td>
                <td>Lecture Automobile Engg.</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Ku. M.I Oza</td>
                <td>Lecture Automobile Engg.</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Smt. A.D Panchal</td>
                <td>Sr. Clerk</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Smt. B.C.Shah</td>
                <td>Lecture Mechanical Engg.</td>
                <td>Member Secretary</td>
            </tr>
        </table>

        <h4 style="text-align: left;" class="my-2">Training and Placement Team</h4>
        <p style="font-size: 16px;">
        It aims to prevent sexual harassment at workplace and to promote general well being of female students, teaching and non-teaching women staff on the campus 
        - As per Section 4 All India Council for Technical Education (Gender Sensitization, Prevention and Prohibition of Sexual Harassment of Women Employees and Students and Redressal of Grievances in Technical Institutions) Regulations, 2016 vide No. F. AICTE/ WH/ 2016/ 01 dated10th June, 2016 the following Internal Complaint committee has been constituted: 
        Reference: order No. SSGP/HC/1698 dated 12/07/2019
    </p>
       <table class="table">
            <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Committee Designation</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Smt. B.H Goyal</td>
                <td>HOD Metallurgy  Engg.</td>
                <td>Presiding Officer</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Smt. K.B Mehta</td>
                <td>HOD Electrical  Engg.</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Kum A. R Rana</td>
                <td>Lecturer Mechanical Engg.</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Ms. A.H Rajawda</td>
                <td>Lecturer Mathematics</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Kum. S.D Tiwari</td>
                <td>Lecturer Mechanical Engg.</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Smt. B. S Bhartia</td>
                <td>Sr Clerk</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Smt. Shrungi Desai</td>
                <td>Advocatae</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Student Representative</td>
                <td>Fenny Africawala</td>
                <td>Member</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Girls Hostel Representativ</td>
                <td>-</td>
                <td></td>
            </tr>
           </table>

           <hr class="my-4">

           Important Link:<a  class="a" href="https://www.ugc.ac.in/pdfnews/7203627_UGC_regulations-harassment.pdf">
           https://www.ugc.ac.in/pdfnews/7203627_UGC_regulations-harassment.pdf</a> <br>

           <h6 style="text-align:left; font-size:18px" class="my-2">
           <ul>
           <li>
           <a href="http://www.ssgc.cteguj.in/uploads/7680/WDC_program.pdf" class="a">Workplace Wellness Program</a> <br> </li>
           <li><a href="http://www.ssgc.cteguj.in/uploads/7680/WDC_Activity.pdf" class="a">Women Cell Activities</a> <br></li>
           </ul>
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