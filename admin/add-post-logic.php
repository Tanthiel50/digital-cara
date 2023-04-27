<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    //validate form data
    if(!$title){
        $_SESSION['add-post'] = "Entrez un titre";
    } elseif (!$category_id) {
        $_SESSION['add-post'] = "Selectionner une categorie";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Ajoutez du texte";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "Ajoutez une image";
    } else {
        //Work on thumbnail
        //rename the image
        $time = time(); //make each image name unique
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/thumbnails/' . $thumbnail_name;

        //make sure file is an image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if(in_array($extension, $allowed_files)) {
            //make sure image is not big 2mb
            if($thumbnail['size'] < 2000000) {
                //upload the file
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            }else {
                $_SESSION['add-post'] = "Votre image est trop lourde (requis: 2mb ou moins)";
            }
        }else {
            $_SESSION['add-post'] = "Votre image doit etre un png, jpg ou jpeg";
        }
    }
    // redirect back with form data to add post page if there is any problem
    if(isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] =$_POST;
        header('location: ' .ROOT_URL. 'admin/add-posts.php');
        die();
    } else {
        //insert post into DB
        $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id) VALUES ('$title', '$body', '$thumbnail_name', $category_id, $author_id)";
        $result = mysqli_query($connection, $query);

        if(!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = "Nouveau post ajouté avec succès";
            header('location: ' .ROOT_URL. 'admin/manage-posts.php');
            die();
        }
    }
}

header('location: ' .ROOT_URL. 'admin/add-posts.php');
die();