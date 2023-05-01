<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //validate form data
    if(!$title){
        $_SESSION['add-comment'] = "Entrez un titre";
    } elseif (!$body) {
        $_SESSION['add-comment'] = "Ajoutez du texte";
    }
    // redirect back with form data to add post page if there is any problem
    if(isset($_SESSION['add-comment'])) {
        $_SESSION['add-comment-data'] =$_POST;
        header('location: ' .ROOT_URL. 'post.php?=' . $post_id);
        die();
    } else {
        //insert comments into DB
        $query = "INSERT INTO comments (title, body, user_id, posts_id) VALUES ('$title', '$body', '$user_id', '$post_id')";
        $result = mysqli_query($connection, $query);

        if(!mysqli_errno($connection)) {
            $_SESSION['add-post_success'] = "Nouveau post ajouté avec succès";

            header('location: ' .ROOT_URL. 'post.php?=' . $post_id);
            die();
        }
    }
}

header('location: ' .ROOT_URL. 'post.php?=' . $post_id);
die();