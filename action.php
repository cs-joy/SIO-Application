<?php

require_once('./db-config.php');

if(isset($_POST)) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $uname = $_POST['username'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $phone = $_POST['phonenumber'];
    $email_address = $_POST['email'];
    $pass = $_POST['password'];

    $query = "INSERT INTO sio_users (firstname, lastname, username, department, position, phone, email, password) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement_insert = $db_connection->prepare($query);
    
    $execution = $statement_insert->execute([$fname, $lname, $uname, $department, $position, $phone, $email_address, $pass]);

    if($execution){
        echo "Successfully Data Saved In Your Database";
    } else {
        echo "There were errors while being saving your data";
    }
} else {
    echo "No Data!";
}

?>