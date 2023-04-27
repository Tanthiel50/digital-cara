<?php

require 'config/database.php';

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //validation
    if(!$title || !$description) {
        $_SESSION['edit-category'] = "Changement de catégorie invalide";

    }else {
        $query = "UPDATE categories SET title='$title', description='$description' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)) {
            $_SESSION['edit-category'] = "Impossible de mettre a jour la catégorie";

        } else {
            $_SESSION['edit-category-success'] = "La catégorie $title a été mise à jour avec succès";
        }
    }
}

header('location: ' . ROOT_URL . '/admin/manage-categories.php');
die();