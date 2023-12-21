<?php
session_start();
class Database 
{   
    
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'assessment_pdo';
    public $conn;
    
    public function __construct()
    {
        $this->conn = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        }else{
            return $this->conn;
        }      
        
    }
    
    public function InsertData($post) 
    {
        $fname = $this->conn->real_escape_string($_POST['fname']);
        $lname = $this->conn->real_escape_string($_POST['lname']);
        $age = $this->conn->real_escape_string($_POST['age']);
        $email = $this->conn->real_escape_string($_POST['email']);
        $location = $this->conn->real_escape_string($_POST['location']);
        $query="INSERT INTO pdo_tbl(fname,lname, age,email ,location) VALUES('$fname','$lname','$age','$email','$location')";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index.php");
            $_SESSION['success_message'] = "New Record Added successfully";
            exit();
        }else{
            header("Location:index.php");
            $_SESSION['err_message'] = "Registration failed try again!";
            exit();
        }
    }
    public function displayData()
    {
        $query = "SELECT * FROM pdo_tbl ORDER BY fname DESC";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
            }else{
            echo "No found records";
        }
    }
    public function getRecordByID($id) {
        $query = "SELECT * FROM pdo_tbl WHERE id = '$id'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }  else{
            echo "Record not found";
        }
    }
    public function updateRecordByID($postData) {
        $fname = $this->conn->real_escape_string($_POST['fname']);
        $lname = $this->conn->real_escape_string($_POST['lname']);
        $age = $this->conn->real_escape_string($_POST['age']);
        $email = $this->conn->real_escape_string($_POST['email']);
        $location = $this->conn->real_escape_string($_POST['location']);
        $id = $this->conn->real_escape_string($_POST['id']);
        if(!empty($id) && !empty($postData)) {
            $query = "UPDATE pdo_tbl SET fname='$fname', lname='$lname', age='$age', email='$email', location='$location' WHERE id='$id'";
            $sql = $this->conn->query($query);
            if ($sql==true) {
                header("Location: index.php?id=update");
                $_SESSION['success_message'] = "Record Updated";
                exit();
            }else{
                $_SESSION['err_message'] = "Update information failed!";
                exit();
            }
        }
    }
    

    public function deleteRecordByID($id)
    {
        $query = "DELETE FROM pdo_tbl WHERE id = '$id'";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location:index.php");
            $_SESSION['err_message'] = "Delete Record successfully";
            exit();
        }else{
            echo "Record does not  delete try again";
            }
        }


}
?>
