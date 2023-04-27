<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    //get form data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$title){
        $_SESSION['add-category'] = "Entrer un titre";
    } elseif (!$description){
        $_SESSION['add-category'] = "Entrer une description";
    }

    //redirect back to category form with form data if invalid
    if(isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        //insert category to DB
        $query = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($connection, $query);
        if(mysqli_errno($connection)) {
            $_SESSION['add-category'] = "La catégorie n'a pas pu être ajouté";
            header ('location: ' . ROOT_URL . 'admin/add-category.php');
            die();
        } else {
            $_SESSION['add-category-success'] = "La catégorie $title a été ajoutée avec succès";
            header ('location: ' . ROOT_URL . 'admin/manage-categories.php');
            die();
        }
    }
}