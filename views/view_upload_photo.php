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
    <title>Upload of images</title>
</head>
<script>
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

<body style="background-color: #023245;">

    <section class="container-fluid">
        <article class="row d-flex justify-content-center">
            <div class="col-12 p-3 d-flex align-items-center" style="background-color:#333;">
                <img class="mx-2" src="./html/images/camera_logo.png" alt="camera logo" width="50px">
                <h3 class="text-white">Photo Gallery</h3>
                <a class="btn btn-lg btn-danger ms-auto" onclick="logout();">
                    Logout
                </a>
            </div>
        </article>
        <article class="row d-flex justify-content-center mt-5">
            <h1 class="text-center text-white">Upload Photo</h1>
        </article>
        <article class="row d-flex justify-content-center mt-1">
            <div class="col-12 col-md-9 col-lg-6 col-xl-4">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
            </div>
        </article>
        <article class="row d-flex justify-content-center mt-3">
            <div class="col-12 col-md-9 col-lg-6 col-xl-4">
                <form id="frmimages" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div>
                        <label class="form-label text-white" for="image">Select your photo</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label text-white" for="title">Photo title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo (!empty($_POST['title'])) ? $_POST['title'] : ''; ?>">
                    </div>
                    <div class="mt-3">
                        <label class="form-label text-white" for="description">Description:</label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Insert an image description"><?php echo (!empty($_POST['description'])) ? $_POST['description'] : ''; ?></textarea>
                        <input type="text" name="user" id="user" value="<?php echo $_SESSION['user_id']; ?>" hidden>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success rounded-pill mt-3">Upload photo</button>
                    </div>
                </form>
            </div>
        </article>
        <article class="row d-flex justify-content-center mt-1">
            <div class="col-12 col-md-9 col-lg-6 col-xl-4">
                <a href="index.php" class="btn btn-outline-light rounded-pill mt-4 mb-4">
                    <i class="fa-solid fa-arrow-left"></i><span class="ms-2">Regresar</span>
                </a>
            </div>
        </article>
    </section>

    <footer class="footer">
        <p class="text-center text-white">Web page created by Rodrigo Alfaro</p>
    </footer>
    <script src="https://kit.fontawesome.com/04fc1ee7e9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>