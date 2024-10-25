<?php 

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require './functions.php';
    $connection = connection('gallery', 'root', '');

    if($connection == false){
        die();
    }

    if(!empty($_POST['username'])){

        $statement = $connection->prepare("SELECT * FROM users WHERE user_name = :username");
        $statement->execute([
            ':username' => $_POST['username']
        ]);

        if($statement->rowCount() < 1){
        $username = $_POST['username'];
        $username = trim($username);
        $username = stripslashes($username);
        $username = htmlspecialchars($username);
        }else{
            $error .= 'User name is already taken please choose anorther one <br>';
        }
    }else{
        $error .= 'Please enter your username <br>';
    }

    if(!empty($_POST['password'])){
        $password = $_POST['password'];
    }else{
        $error .= 'Please enter the passwords<br>';
    }

    if(!empty($_POST['password2'])){
        $password2 = $_POST['password2'];
    }else{
        $error .= 'Please enter the passwords<br>';
    }

    if($_POST['password'] != $_POST['password2']){
        $error .= 'Passwords do not match<br>';
    }

    if(empty($error)){
        $password = hash('sha512', $password);
        $statement = $connection->prepare("INSERT INTO users (user_name, user_password, role) VALUES (:username, :password, :role)");
        $statement->execute([
            ':username' => $username,
            ':password' => $password,
            ':role' => '2'  
        ]);
        header('Location: index.php');
    }


}

require_once './views/view_signup.php';