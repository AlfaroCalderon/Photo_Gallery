<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Gallery</title>
</head>

<style>
    img:hover {
        transform: scale(1.05);
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }
</style>

<body style="background-color: #023245;">
    <section class="container-fluid">

        <article class="row mt-5">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h1 class="text-center" style="color: white;">My incredible gallery with PHP and MYSQL</h1>
            </div>
        </article>
        <?php
        $array = $statement->fetchAll();

        for ($i = 0; $i < $number_of_records; $i++) {
            if ($i == 0 or $i == 4) {
                echo '<article class="row d-flex justify-content-center mt-5">';
            }
        ?>
            <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 m-2">
                <a href="http://localhost/curso_php/practicas/galeria/photo.php?id=<?php echo $array[$i]['id']; ?>">
                    <img src="./html/images/<?php echo $array[$i]['file']; ?>" alt="" width="100%" title="<?php echo $array[$i]['title']; ?>" class="rounded">
                </a>
            </div>
        <?php
            if ($i == 3 or $i == 7) {
                echo '</article>';
            }
        };
        ?>
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 text-center">
                <?php if ($page == 1) : ?>
                    <a href="http://localhost/curso_php/practicas/galeria?page=<?php echo $page - 1; ?>" class="float-start btn btn-primary rounded-pill disabled"><i class="fa-solid fa-arrow-left"></i><span style="margin-left:10px;">Previous page</span></a>
                <?php else: ?>
                    <a href="http://localhost/curso_php/practicas/galeria?page=<?php echo $page - 1; ?>" class="float-start btn btn-primary rounded-pill"><i class="fa-solid fa-arrow-left"></i><span style="margin-left:10px;">Previous page</span></a>
                <?php endif; ?>

                    <a href="http://localhost/curso_php/practicas/galeria/upload_foto.php" class="btn btn-success rounded-pill">Insert new photo</a>

                <?php if ($page == $number_of_pages) : ?>
                    <a href="http://localhost/curso_php/practicas/galeria?page=<?php echo $page + 1; ?>" class="float-end btn btn-primary rounded-pill disabled"><span style="margin-right: 10px;">Next page </span><i class="fa-solid fa-arrow-right"></i></a>
                <?php else: ?>
                    <a href="http://localhost/curso_php/practicas/galeria?page=<?php echo $page + 1; ?>" class="float-end btn btn-primary rounded-pill"><span style="margin-right: 10px;">Next page </span><i class="fa-solid fa-arrow-right"></i></a>
                <?php endif; ?>

              
            </div>
        </div>
    </section>
    <footer class="mt-5">
        <p class="text-center" style="color: white;">Web page created by Rodrigo Alfaro</p>
    </footer>
    <script src="https://kit.fontawesome.com/04fc1ee7e9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>