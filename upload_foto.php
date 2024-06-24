<?php
//So we can use the connection we need to call the file called functions.php where the connection is processed 
require './functions.php';

//Inside this function we make the conection to the db so we can build our queries below besides this function is gonna return the connection or false 
$connection = connection('gallery', 'root', '');

//Here we evaluate if the function returns false or return a connection 
if (!$connection) {
    die(); // We could show an alert with the error of connection to the database 
}

$error = "";

// We validate if the request method has post set.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // We use a new variable called $_FILES where all the file information we sent through the form is saved
    if (empty($_FILES['image']['name'])) {
        $error .= "-There is no image selected <br>";
    }

    if (empty($_POST['title'])) {
        $error .= "-The title is empty <br>";
    }

    if (empty($_POST['description'])) {
        $error .= "-The image description is empty";
    }


    if (empty($error)) {

        //print_r($_FILES); // Inside this variable we have a associative array with all the data of the image we sent
        $check = getimagesize($_FILES['image']['tmp_name']); // Here we can know if the document sent through the form is an image because if it is any other document we will get false at the moment to obtain the image size.

        if ($check !== false) {
            // Now we will create the path where the image will be saved moreover this path will be saved inside the database.  
            $destination_directory = 'html/images/';
            $image_ubication = $destination_directory . $_FILES['image']['name']; // Now we make the url where the image will be saved 

            //echo ('<h1 style="color: white;">' . $image_ubication . '</h1>');

            //Here we move the uploaded file to its new ubication 
            move_uploaded_file($_FILES['image']['tmp_name'], $image_ubication);

            //Right now we are gonna prepare our query to be sent 
            $statement = $connection->prepare("INSERT INTO photo (photo_title, photo_file, photo_description) VALUES (:title, :photo_file, :description)");
            $statement->execute([
                ":title" => $_POST['title'],
                ":photo_file" => $_FILES['image']['name'],
                ":description" => $_POST['description']
            ]);

            //Lastly, we redirect back to the index
            header('Location: index.php');
        } else {
            echo '<script>alert("!The document that has been inserted is not an image¡");</script>';
        }
    }
}

require './views/view_upload_photo.php';
