<?php 

if(isset($_POST['submitnews'])){
    include 'components/_db_connect.php';
    $id=$_POST['newsId'];
    // echo $id;
    // print_r($_POST);
    $news_title=$_POST['newstitle'];
    echo $news_title;
    $news_description=$_POST['newsDescription'];
    $date=$_POST['date'];
    $sql="UPDATE `news` SET `id` = '$id', `news_title` = '$news_title', `news_description` = '$news_description', `date` = '$date' WHERE `news`.`id` = '$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo $sql;
        echo $result;
        echo mysqli_error($conn);
        header('Location:index.php?isdatachaged=data changed successfully');
    }else{
        echo $sql;
        var_dump($result);
        header('Location:index.php?showerror=data could not changed');
    }

}elseif(isset($_GET['deleteid'])){
    include 'components/_db_connect.php';
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `news` WHERE `news`.`id` = '$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo $result;
        echo mysqli_error($conn);
        header('Location:index.php?isdatachaged=data changed successfully');
    }else{
        echo $sql;
        var_dump($result);
        header('Location:index.php?showerror=data could not changed');
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
<?php 
      include 'components/_db_connect.php';
      $id=$_GET['newsid'];
      $newsQuery="SELECT * FROM `news` WHERE id=$id ";
      $newsResult=mysqli_query($conn,$newsQuery);
      $newsRow=mysqli_fetch_assoc($newsResult);
      ?>
    <div class="container">
    <form action="newsedit.php" method="POST">
    <div class="mb-3">
            <input type="hidden" name="newsId" value="<?php echo $newsRow['id']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">news title</label>
            <input required type="text" value="<?php echo $newsRow['news_title']; ?>" class="form-control" name="newstitle" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">news description</label>
            <input required type="text" value="<?php echo $newsRow['news_description']; ?>" name="newsDescription" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">date</label>
            <input required type="date" name="date" value="<?php echo $newsRow['date']; ?>" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="submitnews" class="btn btn-primary">Submit</button>
    </form>
    </div>

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