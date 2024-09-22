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
        <h3>PLACEMENT CELL INFORMATION</h3>
        <!-- <hr class="my-4"> -->
        <h6>
            From TPO's Desk: (Mr. H. V. Gohil)
        </h6>
        <hr class="my-4">

        <p style="font-size: 16px;">
        “With the sole vision to make SSGP unique center of excellence in technical education for sustainable growth of industry and society and nodal center for the placement activities in this part of the country the Training & Placement Cell works. We are equipped with the required infrastructure to conduct placement sessions, online & offline, video conferencing, etc. to organize campus placement activities. We provide all the possible support and guidance to the students for this purpose.”<br><br>

        “We invite esteemed organizations to visit our campus for the recruitment. Your visit shall provide a platform to utilize the technical knowledge and motivated young talent of our students establishing a synergetic interface. Besides we also invite the companies to take our students for training as a part of the course curriculum.”<br><br>

        “For any clarifications/discussions please do feel free to contact me at tpossg@gmail.com.”<br>
        </p>
        
        <p style="font-size: 16x;">
        Training & Placement Officer:                  

        <b>Harikrushna Gohil</b><br>                                   
        Mob: +91-98980 96410<br>                            
        <br><br>

        Assistant Training & Placement Officer: 
        <b>Mayur Koladiya</b><br>
        Mob: +91-99044 61376<br><br>

        URL: <a class="a" href="http://www.ssgc.cteguj.in/tpo/">http://www.ssgc.cteguj.in/tpo/</a><br>
        Email: tpossg@gmail.com<br> 

        <br>
        “Institute Training & Placement Policy: Click here”
        </p>

        <hr class="my-4">
        <h5 style="text-align:left" class="my-2">
        <ul style="list-style-type:disc; line-height:150%;" > <li>
        <a class="a" href="http://www.ssgc.cteguj.in/uploads/7680/TPOBranchSummary.pdf">Institute Placement Branch-wise</a> <br> </li>
        <li> <a class="a" href="http://www.ssgc.cteguj.in/uploads/7680/TPOMajorRecruiters.pdf">Institute Major Recruiters</a> <br> </li> </ul>
        </h5>
        <hr class="my-4">

        <h4 style="text-align: left;" class="my-2">Training and Placement Team</h4>
        <!-- <p style="font-size: 14px;"> -->

        <table class="table">
            <tr>
                <th>Serial No</th>
                <th>Name</th>
                <th>Role</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mr H.V. Gohil</td>
                <td>Head Tpo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mr M.H. Koladiya</td>
                <td>Assistant TPO</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Mr D.B. Partiwala</td>
                <td>Assistant TPO</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mr. J. B. Vasava</td>
                <td>Assistant TPO</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Ms. Komal Patel</td>
                <td>Soft Skill Development</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Mr. P. D. Panwala</td>
                <td>Assistant TPO - DTPT</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Mr. C. D. Nakrani</td>
                <td>Assistant TPO - DTMT</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Mr. S. K. Teraiya</td>
                <td>Assistant TPO- Mechanical</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Mr. S. N. Vasava</td>
                <td>Assistant TPO- Mechanical</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Mr. C. D. Chaudhari</td>
                <td>Assistant TPO- Electrical</td>
            </tr>
            <tr>
                <td>11</td>
                <td>Mr. G. D. Gabani</td>
                <td>Assistant TPO - Electrical</td>
            </tr>
            <tr>
                <td>12</td>
                <td>Ms. Upasna Patel</td>
                <td>Assistant TPO - Electrical</td>
            </tr>
            <tr>
                <td>13</td>
                <td>Mrs. Sonali Patel</td>
                <td>Assistant TPO -Civil</td>
            </tr>
            <tr>
                <td>14</td>
                <td>Ms. R. D. Goswami</td>
                <td>Assistant TPO -Civil</td>
            </tr>
            <tr>
                <td>15</td>
                <td>Ms. Kartila Uchadadiya</td>
                <td>Assistant TPO -Civil</td>
            </tr>
            <tr>
                <td>16</td>
                <td>Ms. Sonam Patel</td>
                <td>Assistant TPO- Metallurgy</td>
            </tr>
            <tr>
                <td>17</td>
                <td>Mr. T. K. Kyada</td>
                <td>Assistant TPO- Metallurgy</td>
            </tr>
            <tr>
                <td>18</td>
                <td>Mr. V. N. Makwana</td>
                <td>Assistant TPO- Power Electronics</td>
            </tr>
            <tr>
                <td>19</td>
                <td>Mr. D. N. Dhangar</td>
                <td>Assistant TPO- Information Tech</td>
            </tr>
            <tr>
                <td>20</td>
                <td>Mr. R. J. Ladumor</td>
                <td>Assistant TPO- AutoMobile</td>
            </tr>
            <tr>
                <td>21</td>
                <td>Ms. Shruti Chavda</td>
                <td>Clerical work – TPO</td>
            </tr>
        </table>


        <!-- </p> -->

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