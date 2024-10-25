<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: /curso_php/practicas/galeria/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<script defer>
    let logout = () => {
        window.location.href = 'http://localhost/curso_php/practicas/galeria/logout.php';
    };
</script>
<style>
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="./html/images/camera_logo.png" type="image/x-icon"> 
    <title>Photo</title>
</head>

<body style="background-color:#023245;">
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
        <article class="row d-flex justify-content-center">
            <h1 class="text-center mt-3 mb-3" style="color: white;"><?php echo $photo['title']; ?></h1>
            <div class="col-sm-11 col-md-11 col-lg-4 col-xl-4 p-1" >
                <img src="./html/images/<?php echo $photo['file']; ?>" alt="" width="100%" title="img1" class="rounded">
            </div>
        </article>
        <article class="row d-flex justify-content-center">
            <div class="col-sm-11 col-md-11 col-lg-4 col-xl-4 p-1">
                <p class="mt-3" style="color: white;">
                    <?php echo $photo['description']; ?>
                </p>
                <a href="index.php" class="btn btn-outline-light rounded-pill mt-2 mb-4">
                    <i class="fa-solid fa-arrow-left"></i><span style="margin-left:10px;">Regresar</span>
                </a>
            </div>
        </article>
    </section>
    <footer class="footer">
        <p class="text-center" style="color: white;">Web page created by Rodrigo Alfaro</p>
    </footer>
    <script src="https://kit.fontawesome.com/04fc1ee7e9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>