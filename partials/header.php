<?php   
    require 'config/database.php';

    // //fetch current user
    // if(isset($_SESSION['user-id'])){
    //     $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    //     $query = "SELECT avatar FROM users WHERE id=$id";
    //     $result = mysqli_query($connection, $query);
    //     $avatar = mysqli_fetch_assoc($result);
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive multipage blog website</title>   
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>

    <!-- NAV -->
    <nav class="navbar fixed-top navbar-dark navbar-expand-md border-bottom border-orange border-1" id="navbar">
        <div class="container">
            <!-- Responsive -->
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- NAV -->
            <div id="navbarText" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= ROOT_URL ?>index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT_URL ?>services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT_URL ?>contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ROOT_URL ?>blog.php">Blog</a>
                </li>
                <?php if(isset($_SESSION['user-id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT_URL ?>admin/index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT_URL ?>logout.php">Log out</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT_URL ?>signin.php">Signin</a>
                    </li>
                <?php endif ?>
            </ul>
                </div>
        </div>
    </nav>