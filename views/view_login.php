<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="./html/images/camera_logo.png" type="image/x-icon"> 
    <title>Login</title>
</head>
<script defer>
    let counter = 0;

    let showPassword = (btnpass) => {

        if (counter % 2 == 0) {
            document.getElementById('password').type = 'text';
            btnpass.classList.remove('btnviewpassunactive');
            btnpass.classList.add('btnviewpassactive');
        } else {
            document.getElementById('password').type = 'password';
            btnpass.classList.remove('btnviewpassactive');
            btnpass.classList.add('btnviewpassunactive');
        }
        counter++;
    }
</script>

<style>
    .btnviewpassunactive{
        border-radius: 5px;
        padding: 5px 10px 5px 10px;
        border: #023245 solid 1px;
        background-color: white;
        color: white;
    }

    .btnviewpassactive{
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
<body style="background-color:#023245;">
    <section class="container-fluid">
        <article class="row d-flex justify-content-center">
            <h1 class="text-center mt-5 mb-5" style="color: white;">Login</h1>
            <?php if(!empty($error)):?>
            <div class="alert alert-danger col-sm-11 col-md-6 col-lg-3 col-xl-3 border rounded p-4" role="alert">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
        </article>
        <article class="row d-flex justify-content-center">
            <div class="col-sm-11 col-md-6 col-lg-3 col-xl-3 border rounded p-4" style="background-color: white;">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="text-center">
                        <img width="35%" src="./html/images/user.png" alt="">
                    </div>
                    <table width='100%'>
                        <tr>
                            <td colspan="2">
                                <div class="mb-2">
                                    <label for="username" class="form-label">User name:</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="user name" value="<?php echo (!empty($username))? $username: ''; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password" class="form-label">Password:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                </div>
                            </td>
                            <td>
                            <div class="mb-3" align="center">
                                    <a class="btnviewpassunactive px-3" onclick="showPassword(this);"><img src="./html/icons/eye-solid.svg" width="20px" alt=""></a>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary rounded-pill">Log in</button>
                    </div>
                </form>
            </div>
        </article>
        <article class="row mt-3 text-center">
                <p style="color: white;">To get your own personal gallery please <a href="./signup.php">Sign Up</a></p>
        </article>

    </section>
    <footer class="footer">
        <p class="text-center" style="color: white;">Web page created by Rodrigo Alfaro</p>
    </footer>
    <script src="https://kit.fontawesome.com/04fc1ee7e9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>