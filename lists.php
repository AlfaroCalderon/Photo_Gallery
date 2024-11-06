<?php
session_start();
if (!empty($_SESSION['username'])) {
    class CustomList
    {
        public function getRol($id)
        {
            require_once './functions.php';
            $connection = connection('gallery', 'root', '');
            $statement = $connection->prepare("SELECT role_id AS 'id', role_name AS 'name' FROM roles");
            $statement->execute();
            $results = $statement->fetchAll();
            $list = '';
            foreach($results as $rol){
                if($rol['id'] == $id){
                    $list .= '<option value="'.$rol['id'].'" selected>'.$rol['name'].'</option>';
                }else{
                    $list .= '<option value="'.$rol['id'].'">'.$rol['name'].'</option>';
                }
            }
                echo $list;
        }
    }
} else {
    header('Location: login.php');
}
?>