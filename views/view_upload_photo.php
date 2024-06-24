<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Upload of images</title>
</head>

<body style="background-color: #023245;">

    <section class="container-fluid">
        <article class="row mt-5">
            <h1 style="color: white;" class="text-center">Upload Photo</h1>
        </article>
        <article class="row d-flex justify-content-center mt-1">
            <div class="col-sm-12 col-md-9 col-lg-6 col-xl-4 ">
                <?php if(!empty($error)):?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>
            </div>
        </article>
        <article class="row d-flex justify-content-center mt-3">
            <div class="col-sm-12 col-md-9 col-lg-6 col-xl-4 ">
                <form id="frmimages" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data"><!-- with enctype="multipart/form-data" allows us to be able to process documents with this form-->
                    <div>
                        <label class="form-label" for="image" style="color: white;">Select your photo</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="title" style="color: white;">Photo title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo (!empty($_POST['title'])) ? $_POST['title'] : ''; ?>">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="description" style="color: white;">Descripction:</label>
                        <textarea class="form-control" name="description" id="description" rows="5" class="form-control" placeholder="Insert an image description"><?php echo (!empty($_POST['description'])) ? $_POST['description'] : ''; ?></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success rounded-pill mt-3">Upload photo</button>
                    </div>
                </form>
            </div>
        </article>

    </section>

    <footer>
        <footer class="mt-5">
            <p class="text-center" style="color: white;">Web page created by Rodrigo Alfaro</p>
        </footer>
    </footer>
    <script src="https://kit.fontawesome.com/04fc1ee7e9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>