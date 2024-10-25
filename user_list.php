<?php
session_start();
if (!empty($_SESSION['username']) && $_SESSION['user_role'] == 1) {

    require_once './functions.php';
    $connection = connection('gallery', 'root', '');
    $action = (!empty($_GET['action'])) ? $_GET['action'] : ((!empty($_POST['action'])) ? $_POST['action'] : 1);

    switch ($action) {
        case 1:
            $statement = $connection->prepare("SELECT 
                                        a.user_id as id,
                                        a.user_name as name, 
                                        b.role_name as role, 
                                        COUNT(c.user) as photos 
                                        FROM users a 
                                        LEFT JOIN roles b ON a.role = b.role_id
                                        LEFT JOIN photo c ON a.user_id = c.user
                                        GROUP BY a.user_id
                                        ORDER BY a.user_name DESC");
            $statement->execute();
            require './views/view_user_list.php';
            break;

        case 2:
            $id = $_GET['id'];
            $statement = $connection->prepare("SELECT 
                                        a.user_id as id,
                                        a.user_name as name, 
                                        a.role as role, 
                                        COUNT(c.user) as photos 
                                        FROM users a 
                                        LEFT JOIN roles b ON a.role = b.role_id
                                        LEFT JOIN photo c ON a.user_id = c.user
                                        WHERE a.user_id = :id
                                        GROUP BY a.user_id
                                        ORDER BY a.user_name DESC");
            $statement->execute([
                ":id" => $id
            ]);
            require './views/view_user_edit.php';
            break;

        case 3:
            $error = '';

            if (!empty($_POST['username'])) {

                $statement = $connection->prepare("SELECT * FROM users WHERE user_name = :username AND user_id != :id");
                $statement->execute([
                    ':username' => $_POST['username'],
                    ':id' => $_POST['id']
                ]);

                if ($statement->rowCount() < 1) {
                    $username = $_POST['username'];
                    $username = trim($username);
                    $username = stripslashes($username);
                    $username = htmlspecialchars($username);
                } else {
                    $error .= 'User name is already taken please choose anorther one <br>';
                }
            } else {
                $error .= 'Please enter your username <br>';
            }

            if ($_POST['role'] == 0) {
                $error .= 'Please select a role <br>';
            } else {
                $role = $_POST['role'];
            }

            if (!empty($_POST['password'])) {
                $password = $_POST['password'];
            } else {
                $error .= 'Please enter the passwords<br>';
            }

            if (!empty($_POST['password2'])) {
                $password2 = $_POST['password2'];
            } else {
                $error .= 'Please enter the passwords<br>';
            }

            if ($_POST['password'] != $_POST['password2']) {
                $error .= 'Passwords do not match<br>';
            }

            if (empty($error)) {
                $password = hash('sha512', $password);  

                $statement = $connection->prepare("UPDATE users SET user_name = :username, user_password = :password, role = :role WHERE user_id = :id");
                $statement->execute([
                    ':username' => $username,
                    ':password' => $password,
                    ':role' => $role,
                    ':id' => $_POST['id']
                ]);

                $statement = $connection->prepare("SELECT 
                                        a.user_id as id,
                                        a.user_name as name, 
                                        b.role_name as role, 
                                        COUNT(c.user) as photos 
                                        FROM users a 
                                        LEFT JOIN roles b ON a.role = b.role_id
                                        LEFT JOIN photo c ON a.user_id = c.user
                                        GROUP BY a.user_id
                                        ORDER BY a.user_name DESC");
                $statement->execute();
                require './views/view_user_list.php';
            } else {
                require './views/view_user_edit.php';
            }
            break;

        default:

            break;
    }
} else {
    Header('Location: /curso_php/practicas/galeria/index.php');
}
