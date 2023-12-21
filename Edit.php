<?php

    include("classes/Database.php");

    $addDetails = new Database();

      // Edit customer record
    if(isset($_GET['editId']) && !empty($_GET['editId'])) {
        $editId = $_GET['editId'];
        $userData = $addDetails->getRecordByID($editId);
    }

    if(isset($_POST['update'])) {
        $addDetails->updateRecordByID($_POST);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD</title>
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
            <!-- Form -->
            <h1>Update New information to the list</h1>
            <p><a href="Index.php" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-edit">BACK</span></a></p>
            <form class="form-example" action="Edit.php" method="post">
            
            <!-- Input fields -->
                <div class="form-group">
                    <input type="hidden" class="form-control id"  name="id" value="<?= $userData['id']; ?>"/>
                </div>
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control fname" id="fname" name="fname" value="<?= $userData['fname'] ?>" required/>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control lname" id="lname" name="lname" value="<?= $userData['lname'] ?>" required/>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" class="form-control age" id="age" name="age"  value="<?= $userData['age'] ?>" required/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control email" id="email" name="email"  value="<?= $userData['email'] ?>" required/>
                </div>
                <div class="form-group">
                    <label for="email">Location:</label>
                    <input type="text" class="form-control location mb-2" id="location" name="location"  value="<?= $userData['location'] ?>" required/>
                </div>
                    <input type="submit" name="update" class="btn btn-primary" style="float:left;" value="Update">     
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>

    
</body>
</html>

