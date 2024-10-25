<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: /curso_php/practicas/galeria/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="./html/images/camera_logo.png" type="image/x-icon"> 
    <title>User list</title>
</head>
<style>
    .btnviewpassunactive {
        border-radius: 5px;
        padding: 5px 10px 5px 10px;
        border: #023245 solid 1px;
        background-color: white;
        color: white;
    }

    .btnviewpassactive {
        border-radius: 5px;
        padding: 5px 10px 5px 10px;
        border: #023245 solid 1px;
        background-color: grey;
        color: white;
    }

    section {
        min-height: calc(100vh - 72px);
    }

    .footer {  
            background-color: #333;  
            color: white;  
            text-align: center;  
            padding: 1rem;  
            position: relative;  
        } 
</style>
<script defer>
    let logout = () => {
        window.location.href = 'http://localhost/curso_php/practicas/galeria/logout.php';
    };

    let formValidations = () => {

        let formData = {
            username: document.getElementById('username').value,
            role: document.getElementById('role').value,
            password: document.getElementById('password').value,
            password2: document.getElementById('password2').value
        };

        let passwordRegex = /^(?=(.*[A-Z]){1})(?=(.*[a-z]){1})(?=(.*[0-9]){1})(?=(.*[@#$%^!&+=.\-_*]){1})([a-zA-Z0-9@#$%^!&+=*.\-_]){8,}$/;

        if (formData.username == '') {
            document.getElementById('alert').style.display = 'block';
            document.getElementById('alert').innerText = 'Please enter your username';
            document.getElementById('username').focus();
            return false;
        } else {
            document.getElementById('alert').style.display = 'none';
        }

        if (formData.role == 0) {
            document.getElementById('alert').style.display = 'block';
            document.getElementById('alert').innerText = 'Please select a role';
            document.getElementById('role').focus();
            return false;
        } else {
            document.getElementById('alert').style.display = 'none';
        }

        if (passwordRegex.test(formData.password) == false) {
            document.getElementById('alert').style.display = 'block';
            document.getElementById('alert').innerText = 'Password must contain at least 8 characters, 1 uppercase, 1 lowercase, 1 number and 1 special character';
            document.getElementById('password').focus();
            return false;
        } else {
            document.getElementById('alert').style.display = 'none';
        }

        if (passwordRegex.test(formData.password2) == false) {
            document.getElementById('alert').style.display = 'block';
            document.getElementById('alert').innerText = 'Password must contain at least 8 characters, 1 uppercase, 1 lowercase, 1 number and 1 special character';
            document.getElementById('password2').focus();
            return false;
        } else {
            document.getElementById('alert').style.display = 'none';
        }

        if (formData.password != formData.password2) {
            document.getElementById('alert').style.display = 'block';
            document.getElementById('alert').innerText = 'Passwords do not match';
            document.getElementById('password').focus();
            return false;
        } else {
            document.getElementById('alert').style.display = 'none';
        }

    };

    let counter1 = 0;
    let showPassword1 = (btnpass) => {
        if (counter1 % 2 == 0) {
            document.getElementById('password').type = 'text';
            btnpass.classList.remove('btnviewpassunactive');
            btnpass.classList.add('btnviewpassactive');
        } else {
            document.getElementById('password').type = 'password';
            btnpass.classList.remove('btnviewpassactive');
            btnpass.classList.add('btnviewpassunactive');
        }
        counter1++;
    };

    let counter2 = 0;
    let showPassword2 = (btnpass) => {
        if (counter2 % 2 == 0) {
            document.getElementById('password2').type = 'text';
            btnpass.classList.remove('btnviewpassunactive');
            btnpass.classList.add('btnviewpassactive');
        } else {
            document.getElementById('password2').type = 'password';
            btnpass.classList.remove('btnviewpassactive');
            btnpass.classList.add('btnviewpassunactive');
        }
        counter2++;
    };
</script>

<body style="background-color: #023245;">
    <section class="container-fluid">
    <article class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-3 d-flex align-items-center" style="background-color:#333;">
                <img class="mx-2" src="./html/images/camera_logo.png" alt="camera logo" width="50px">
                <h3 class="" style="color: white;">Photo Gallery</h3>
                <a class="btn btn-lg btn-danger ms-auto" onclick="logout();">
                    Logout
                </a>
            </div>
        </article>
        <?php
        require './lists.php';
        $list = new CustomList();
        $results = $statement->fetch();
        ?>
        <article class="row d-flex justify-content-center mt-4">
            <span style="color: white;" class="text-center mt-4">
                <h1><b>User Edit</b></h1>
            </span>
            <div class="col-sm-12 col-md-10 col-lg-5 col-xl-4">
                <div class="alert alert-danger border rounded p-4" id="alert" role="alert" style="display: none; width:100%;"></div>
                <?php

                if (!empty($error)) {
                    echo '<div class="alert alert-danger border rounded p-4" role="alert" style="width:100%;">' . $error . '</div>';
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return formValidations();">
                    <div class="rounded p-3" style="background-color: whitesmoke;">
                        <table width='100%'>
                            <tr>
                                <td colspan="2">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">User name</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo (!empty($_POST['username'])) ? $_POST['username'] : $results['name']; ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">User Role</label>
                                        <select name="role" id="role" class="form-select">
                                            <option value="0">Select...</option>
                                            <?php $list->getRol($results['role']); ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="password" class="form-label">Password</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password" id="password" onblur="passwordValitadion(this);" placeholder="password" value="">
                                    </div>
                                </td>
                                <td>
                                    <div class="mb-3" align="center">
                                        <a class="btnviewpassunactive px-3" onclick="showPassword1(this);"><img src="./html/icons/eye-solid.svg" width="20px" alt=""></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="password2" class="form-label">Confirm Password:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password2" id="password2" onblur="passwordValitadion(this);" placeholder="password" value="">
                                    </div>
                                </td>
                                <td>
                                    <div class="mb-3" align="center">
                                        <a class="btnviewpassunactive px-3" onclick="showPassword2(this);"><img src="./html/icons/eye-solid.svg" width="20px" alt=""></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="text" name="id" id="id" value="<?php echo (!empty($_POST['id'])) ? $_POST['id'] : $_GET['id']; ?>" hidden>
                                    <input type="text" name="action" id="action" value="3" hidden>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4">Edit</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </article>
        <article class="row d-flex justify-content-center mt-1">
            <div class="col-sm-12 col-md-10 col-lg-5 col-xl-4">
                <a href="user_list.php" class="btn btn-outline-light rounded-pill mt-4 mb-4">
                    <i class="fa-solid fa-arrow-left"></i><span style="margin-left:10px;">Regresar</span>
                </a>
            </div>
        </article>
    </section>
    <footer class="footer">
        <p class="text-center" style="color: white;">Web page created by Rodrigo Alfaro</p>
    </footer>
    <script src="https://kit.fontawesome.com/04fc1ee7e9.js" crossorigin="anonymous"></script>
</body>

</html>