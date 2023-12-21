<?php

    include("classes/Database.php");

    $DeleteDetails = new Database();

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $editId = $_GET['id'];
        $userData = $DeleteDetails->deleteRecordByID($editId);
    }
?>
