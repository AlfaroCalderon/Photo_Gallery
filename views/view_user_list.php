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
        <article class="row d-flex justify-content-center">
            <span style="color: white;" class="text-center mt-4">
                <h1><b>User List</b></h1>
            </span>
            <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <table class="table">
                    <thead class="table-dark text-center">
                        <th>N°</th>
                        <th>User name</th>
                        <th>User rol</th>
                        <th>Number of Photos</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $results = $statement->fetchAll();
                            $counter = 0;
                            foreach ($results as $data) {
                                $counter++;
                                $name = $data['name'];
                                $rol = $data['role'];
                                $photos = $data['photos'];
                                $id = $data['id'];
                            ?>
                        <tr class="text-center">
                            <td><?php echo $counter ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $rol; ?></td>
                            <td><?php echo $photos; ?></td>
                            <td class="d-flex justify-content-center"><a href="http://localhost/curso_php/practicas/galeria/user_list.php?action=2&id=<?php echo $id; ?>" class="btn btn-warning py-2 d-flex align-items-center justify-content-center" style="width: 75%;">Edit<i class="fa fa-pencil-square" style="font-size:30px; margin-left:10px;"></i></a></td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tr>
                    </tbody>
                </table>
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
</body>

</html>