<?php
session_start();

require_once('./db-config.php');

if(isset($_POST)){
    $email = $_POST['user'];
    $password = $_POST['password'];

    $query = "SELECT * FROM sio_users WHERE email= ? AND password= ? LIMIT 1";
    $stmtselect = $db_connection->prepare($query);
    $execution = $stmtselect->execute([$email, $password]);

    if($execution) {
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($stmtselect->rowCount() > 0){
            $_SESSION['user-sign_in'] = $user;
            echo "1";
        } else {
            echo "No users found in the database";
        }
    }
} else {
    echo "Error";
}

?>