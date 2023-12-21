<?php
// session_start();
    include_once("classes/database.php");
    $db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD</title>
</head>
<body>
<div class="container">
    <div class="container-fluid">
<?php
            if(isset($_SESSION['err_message'])) {
?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['err_message']; ?>
                </div>
<?php
            }
            unset($_SESSION['err_message']);
?>
<?php
            if(isset($_SESSION['success_message'])) {
?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success_message']; ?>
                </div>
<?php
            }
            unset($_SESSION['success_message']);
?>
        <h1>Client Information</h1>
        <p><a href="Add.php"><button type="button" class="btn btn-primary" value="Primary"><span class="glyphicon glyphicon-plus"></span></button></a></p>
        <table id="customers">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Location</th>
                <th>Created At</th>
                <th colspan="2">Action</th>
            </tr>
<?php 
          $userData = $db->displayData(); 
          if(empty($userData)) {
?>
                <tr>
                    <td>No Record Available</td>
                </tr>
<?php
          }else {
          foreach ($userData as $Data) {
?>
                <tr>    
                    <td><?= $Data['id'];?></td>
                    <td><?= $Data['fname'];?></td>
                    <td><?= $Data['lname'];?></td>
                    <td><?= $Data['age'];?></td>
                    <td><?= $Data['email'];?></td>
                    <td><?= $Data['location'];?></td>
                    <td><?= $Data['created_at'];?></td>
                    <td><a href="Edit.php?editId=<?= $Data['id']; ?>" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-edit"></span></a></td>
                    <td><a href="Delete.php?id=<?= $Data['id']; ?>" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
<?php 
                } }
?>
        </table>
    </div>
</div>

    
</body>
</html>

