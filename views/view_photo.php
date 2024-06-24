<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Photo</title>
</head>

<body style="background-color:#023245;">
    <section class="container-fluid">
        <article class="row d-flex justify-content-center">

            <div class="col-sm-11 col-md-11 col-lg-5 col-xl-5 p-2">
                <h1 class="text-center mt-5 mb-5" style="color: white;"><?php echo $photo['title'] ;?></h1>
                <img src="./html/images/<?php echo $photo['file'] ;?>" alt="" width="100%" title="img1" class="rounded">
                <p class="mt-5" style="color: white;">
                <?php echo $photo['description'] ;?>
                </p>
                <a href="index.php" class="btn btn-outline-light rounded-pill mt-2">
                    <i class="fa-solid fa-arrow-left"></i><span style="margin-left:10px;">Regresar</span>
                </a>
            </div>
        </article>
    </section>
    <script src="https://kit.fontawesome.com/04fc1ee7e9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>