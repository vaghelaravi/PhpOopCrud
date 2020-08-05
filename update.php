<?php
//jetli class file bni hse e autmatic include thai jase autoload function ma
function __autoload($class)
{
  require_once "$class.php";
}

if(isset($_GET['id']))
{

  $uid=$_GET['id'];

  $operation = new operation();
  $res = $operation->selectOne($uid);
  
}

if(isset($_POST['submit'])){

  $enroll_no=$_POST['enroll_no'];
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  
  $data=[
    'enroll_no'=>$enroll_no,
    'name'=>$name,
    'mobile'=>$mobile
  ];

  $id=$_POST['id'];
  $op = new operation();

  $op->update($data,$id);
}
  

?>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>GANG_14</title>
    <style type="text/css">
          body {
      background: #dd5e89;
      background: -webkit-linear-gradient(to left, #dd5e89, #f7bb97);
      background: linear-gradient(to left, #dd5e89, #f7bb97);
      min-height: 100vh;
      }
    </style>
  </head>
  <body>
    <div class="container">
  <h2>Gang-14</h2>
  <form action="" method="post">
  <div class="form-group">
    <h3><center><u>Update Data</u></center></h3>
    <label for="exampleInputEmail1">Enrollment</label>
    <input type="hidden" name="id" value="<?php echo $res['enroll_no'];?>">
    <input type="text" class="form-control" name="enroll_no"aria-describedby="emailHelp" value="<?php echo $res['enroll_no'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $res['name'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mobile</label>
    <input type="text" class="form-control" name="mobile" value="<?php echo $res['mobile'];?>">
  </div>
 
  <input type="submit" name="submit" class="btn btn-primary">
</form>
  </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>