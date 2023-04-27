<?php
require 'config/database.php';
if(isset($_POST['submit'])){
    //get updated form data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //check for valid input
    if(!$firstname || !$lastname){
        $_SESSION['edit-profil'] = "Changements invalides.";
    } else {
        //update user
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', username='$username' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)){
            $_SESSION['edit-profil'] = "Echec de mise à jour de votre profil";
    } else {
        $_SESSION['edit-profil-success'] = "Votre profil a été mis à jour avec succès";
    }
    }
}

header('location: ' . ROOT_URL . 'admin/index.php');
die();