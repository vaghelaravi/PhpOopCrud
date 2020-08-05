<?php
function __autoload($class)
{
  require_once "$class.php";
}

if (isset($_GET['del'])) 
{
  $id = $_GET['del'];

  $operation = new operation();
  $operation->delete($id);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Student_Record</title>
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
  <h2><center><b><u>Student Info!</u></b></center></h2>
         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Enrollment</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $operation = new operation();

        $rows = $operation->select();
        foreach ($rows as $row )
         {
      ?>
      <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><a class="btn btn-primary" href="update.php?id=<?php echo $row['enroll_no']?>">Edit</a></td>
        <td><a class="btn btn-danger" href="index.php?del=<?php echo $row['enroll_no']?>">Delete</a></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
  <a href="insert_data.php"><input type="submit" value="Insert Data" class="btn btn-primary"></a>

</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>