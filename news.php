<?php 
if($_SERVER['REQUEST_METHOD']=='POST' and $_POST['newsDescription'] ){
  include 'components/_db_connect.php';
  $newstitle=$_POST['newsTitle'];
  $newsDescription=$_POST['newsDescription'];
  $newsDate=$_POST['newsDate'];
  $sql="INSERT INTO `news` (`news_title`, `news_description`, `date`) VALUES ('$newstitle', '$newsDescription', '$newsDate')";
  // echo $sql;
  $result=mysqli_query($conn,$sql);
  if($result){
    header("Location:index.php");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Hello, world!</title>
</head>

<body>
<div class="container">
<?php 
      include 'components/_db_connect.php';
      $newsQuery="SELECT * FROM `news` ORDER BY `date` DESC ";
      $newsResult=mysqli_query($conn,$newsQuery);
      // $newRow=mysqli_fetch_assoc($newsResult);
      // print_r($newRow);
      ?>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody style="justify-content: center;" >
        <?php 
        while($newRow=mysqli_fetch_assoc($newsResult)){
          echo '<tr>
          <th scope="row">'.$newRow['news_title'].'</th>
          <td>'.$newRow['news_title'].'</td>
          <td>'.$newRow['date'].'</td>
          <td> <a href="newsedit.php?newsid='.$newRow['id'].'"> <button type="button" class="btn btn-outline-success">Edit</button> </a></td>
          <td> <a href="newsedit.php?deleteid='.$newRow['id'].'"> <button type="button" class="btn btn-outline-success">Delete</button></a></td>
      </tr>';
        }
        ?>
            
        </tbody>
    </table>
    <hr class="my-4">
    </div>
  <form action="news.php" method="POST">
    <div class="container">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" class="form-control" name="newsTitle" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Description</label>
      <input type="text" class="form-control" name="newsDescription" id="exampleInputPassword1" required>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Date</label>
      <input type="date" class="form-control" name="newsDate" id="exampleInputPassword1" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
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