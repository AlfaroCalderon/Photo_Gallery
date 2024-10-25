<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require './functions.php';
    $connection = connection('gallery', 'root', '');

    if ($connection == false) {
        die();
    };

    if(!empty($_POST['username'])){
        $username = $_POST['username'];
        $username = trim($username);
        $username = stripslashes($username);
        $username = htmlspecialchars($username);
    }else{
        $error .= 'Please enter your username <br>';
    }

    if(!empty($_POST['password'])){
        $password = $_POST['password'];
    }else{
        $error .= 'Please enter your password <br>';
    }

    if(empty($error)){
       $password = hash('sha512', $password);
       $statement = $connection->prepare("SELECT * FROM users WHERE user_name = :username AND user_password = :password");
       $statement->execute([
         ':username' => $username,
         ':password' => $password
       ]);

       $results = $statement->fetch();
       $userrole = $results['role'];
       $userid = $results['user_id'];

       if($statement->rowCount() >= 1){
        $_SESSION['username'] = $username;
        $_SESSION['user_role'] = $userrole;
        $_SESSION['user_id'] = $userid;
        header('Location: index.php');
       }else{
        $error .= 'Username or password is incorrect';
       }
    }

}

require_once './views/view_login.php';
