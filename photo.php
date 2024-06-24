<?php 
require './functions.php';

$connection = connection('gallery', 'root', '');
$statement = $connection->prepare("SELECT photo_id AS 'id', photo_title AS 'title', photo_file AS 'file', photo_description AS 'description' FROM photo WHERE photo_id = :id");
$statement->execute([
    ":id" => intval($_GET['id'])
]);

$photo = $statement->fetch();

require_once './views/view_photo.php';

?>