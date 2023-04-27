<?php
require 'config/database.php';

if(isset($_GET['id'])) {
    //fetch user from DB
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    //make sure on ly one user

    if(mysqli_num_rows($result) == 1){
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/avatar/'.$avatar_name;
        //delete image
        if($avatar_path){
            unlink($avatar_path);
        }
    }

    //FOR LATER
    //fetch thumbnail and delete



    //delete user from DB
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connection, $delete_user_query);
    if(mysqli_errno($connection)){
        $_SESSION['delete-user'] = "Impossible de supprimer '{$user['firstname']} '{$user['lastname']}'";
    } else {
        $_SESSION['delete-user-success'] = "{$user['firstname']} {$user['lastname']} supprimé avec succès";
    }
}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();