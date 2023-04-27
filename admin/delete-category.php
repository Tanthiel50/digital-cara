<?php
require 'config/database.php';

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


    //FOR LATER
    //update category id 


    //delete category
    $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);
    $_SESSION['delete-category-success'] = "Catégorie supprimée avec succès";
}
header('location: ' . ROOT_URL . 'admin/manage-categories.php');
die();