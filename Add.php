<?php

    include("classes/Database.php");

    $addDetails = new Database();

    if(isset($_POST['submit'])) {
        $addDetails->InsertData($_POST);
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
            <h1>Add New information to the list</h1>
            <p><a href="Index.php" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-edit">BACK</span></a></p>
            <form class="form-example" action="Add.php" method="post">
            
            <!-- Input fields -->
                <div class="form-group">
                    <label for="name">First Name:</label>
                    <input type="text" class="form-control username" id="name" name="fname"required/>
                </div>
                <div class="form-group">
                    <label for="name">Last Name:</label>
                    <input type="text" class="form-control username" id="name" name="lname" required/>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" class="form-control username" id="age" name="age" required/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control username" id="email" name="email" required/>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control username" id="location" name="location" required/>
                </div>
                <button type="submit" class="btn btn-primary btn-customized mt-4" name="submit" value="submit">
                    ADD
                </button>   
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>

    
</body>
</html>

