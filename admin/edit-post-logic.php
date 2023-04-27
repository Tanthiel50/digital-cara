<?php
require 'config/database.php';

//make sure edit post button was clicked
if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    //check and validate input values
    if (!$title) {
        $_SESSION['edit-post'] = "Impossible de modifier le post.";
    } elseif (!$category_id) {
        $_SESSION['edit-post'] = "Impossible de modifier le post.";
    } elseif (!$body) {
        $_SESSION['edit-post'] = "Impossible de modifier le post.";
    } else {
        //delete existing thumbnail if new thumbnail is available
        if ($thumbnail['name']) {
            $previous_thumbnail_path = '../images/thumbnail/' .$previous_thumbnail_name;
            if ($previous_thumbnail_path) {
                unlink($previous_thumbnail_path);
            }

            //Work on new thumbnail
            //rename image
            $time = time(); //make each image name upload unique using current timestamp
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
                    $_SESSION['edit-post'] = "Votre image est trop lourde (requis: 2mb ou moins)";
                }
                }else {
                    $_SESSION['edit-post'] = "Votre image doit etre un png, jpg ou jpeg";
                }
            }
        }
    if ($_SESSION['edit-post']) {
        //redirect to manage form page if form was invalid
        header('location: ' .ROOT_URL. 'admin/manage-posts.php');
        die();
    } else {
        //set thumbnail name if a new one was uploaded, else keep old thumbnail name
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        $query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert', category_id='$category_id' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
    }

    if(!mysqli_errno($connection)) {
        $_SESSION['edit-post-success'] = 'Post mis à jour avec succès';
    }
}

header('location:' .ROOT_URL. 'admin/manage-posts.php');
die();