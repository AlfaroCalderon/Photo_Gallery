<?php
session_start();

if(!empty($_SESSION['username'])){
    require './functions.php';
    $connection = connection('gallery', 'root', '');
    
    $statement = $connection->prepare("SELECT COUNT(*) AS 'number_of_rows' FROM photo");
    $statement->execute();
    
    $number_of_rows = $statement->fetch();
    
    $page = (isset($_GET['page']))? $_GET['page']: 1;
    $number_of_records = 8;
    $start_row = ($page == 1)? 0: ($page*$number_of_records) - $number_of_records;
    $number_of_pages = ceil($number_of_rows['number_of_rows'] / $number_of_records);
    
    //echo '<h1 style="color: white;">Inicio: '.$start_row.' Cantidad: '.$number_of_records.' Pagina actual: '.$page.'</h1>';
    
    $limit = $start_row . ", " . $number_of_records;
    
    $statement = $connection->prepare("SELECT photo_id AS 'id', photo_title AS 'title', photo_file AS 'file', photo_description AS 'description' FROM photo LIMIT $limit");
    
    $statement->execute();
    
    require_once './views/view_gallery.php';
}else{
    header('Location: login.php');
}
?>