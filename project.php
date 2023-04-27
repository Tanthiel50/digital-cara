<?php   
    require 'config/database.php';

    //fetch current user
    if(isset($_SESSION['user-id'])){
        $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT avatar FROM users WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $avatar = mysqli_fetch_assoc($result);
    }

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
                    <a class="nav-link" href="<?= ROOT_URL ?>project.php">Past seasons</a>
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
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                        </div>
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT_URL ?>admin/index.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= ROOT_URL ?>logout.php">Log out</a>
                            </li>
                        </ul>
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
    
    <!-- HERO -->
    <section class="text-white row pt-5 align-items-center justify-content-center hero-project">
        <h1 class="col-lg-3 col-7">PAST <span class="text-orange">SEASON</span> </h1>
        <div class="col-lg-8 col-4 d-flex align-items-end justify-content-end row">
            <img src="./images/project-main.png" class="col img-fluid pe-2 col-6" alt="...">
            <img src="./images/project-2.png" class="col img-fluid pe-2 project-img2 col-4" alt="...">
            <img src="./images/project-3.png" class="col img-fluid project-img3 col-2" alt="...">
        </div>
    </section>


<!-- PROJECTS -->

<section class="text-white d-flex-column align-items-end justify-content-center p-5">
    <div class="d-flex align-items-end justify-content-center">
        <h2 class="border-bottom border-orange border-1 pb-2 fw-bold"> LES DERNIERS MATCHS </h2>
    </div>
    <div class="row">
        <a href="" class="p-5 col-md-6 text-decoration-none text-reset article">
            <div>
                <div class="hero-general d-flex align-items-end justify-content-end blog-img1">
                    <h4 class="border border-orange border-1 p-2">SEO</h4>
                </div>
                <div class="shadow-lg p-3 mb-5 rounded">
                    <p>Date de l'article</p>
                    <h3>Titre de l'article</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptates maiores odit dolorum? Laborum, quae alias veniam corporis praesentium id.</p>
                </div>
            </div>
        </a>
        
        <div class="p-5 col-md-6">
            <div class="hero-general d-flex align-items-end justify-content-end blog-img1">
                <h4 class="border border-orange border-1 p-2">SEO</h4>
            </div>
            <div class="shadow-lg p-3 mb-5 rounded">
                <p>Date de l'article</p>
                <h3>Titre de l'article</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptates maiores odit dolorum? Laborum, quae alias veniam corporis praesentium id.</p>
            </div>
        </div>
        <div class="p-5 col-md-6">
            <div class="hero-general d-flex align-items-end justify-content-end blog-img1">
                <h4 class="border border-orange border-1 p-2">SEO</h4>
            </div>
            <div class="shadow-lg p-3 mb-5 rounded">
                <p>Date de l'article</p>
                <h3>Titre de l'article</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptates maiores odit dolorum? Laborum, quae alias veniam corporis praesentium id.</p>
            </div>
        </div>
    </div>
    
    
</section>

<!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-muted bg-night-blue w-100">

<!-- Section: Links  -->
    <section class="p-3">
        <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4 text-white">
                Permalinks
            </h6>
            <p>
                <a href="<?= ROOT_URL ?>index.php" class="text-reset text-decoration-none">Home</a>
            </p>
            <p>
                <a href="<?= ROOT_URL ?>about.php" class="text-reset text-decoration-none">About</a>
            </p>
            <p>
                <a href="<?= ROOT_URL ?>services.php" class="text-reset text-decoration-none">Services</a>
            </p>
            <p>
                <a href="<?= ROOT_URL ?>contact.php" class="text-reset text-decoration-none">Contact</a>
            </p>
            <?php if(isset($_SESSION['user-id'])) : ?>
                <p>
                    <a href="<?= ROOT_URL ?>dashboard.php" class="text-reset text-decoration-none">Dashboard</a>
                </p>
                <p>
                    <a href="<?= ROOT_URL ?>logout.php" class="text-reset text-decoration-none">Logout</a>
                </p>
            <?php else : ?>
                <p>
                    <a href="<?= ROOT_URL ?>signin.php" class="text-reset text-decoration-none">Signin</a>
                </p>
            <?php endif ?>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4 text-white">
                Blog
            </h6>
            <p>
                <a href="#!" class="text-reset text-decoration-none">Pricing</a>
            </p>
            <p>
                <a href="#!" class="text-reset text-decoration-none">Settings</a>
            </p>
            <p>
                <a href="#!" class="text-reset text-decoration-none">Orders</a>
            </p>
            <p>
                <a href="#!" class="text-reset text-decoration-none">Help</a>
            </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4 text-white">Socials</h6>
            <p>
                <a href="https://github.com/Tanthiel50" target="_blank" class="text-reset"><i class="uil uil-github"></i></a>
            </p>
            <p>
                <a href="https://www.linkedin.com/in/c%C3%A9cile-blin-8ab25a72/" target="_blank" class="text-reset"><i class="uil uil-linkedin"></i></a>
            </p>
            <p>
                <a href="discordapp.com/users/268824133557551104" target="_blank" class="text-reset"><i class="uil uil-discord"></i></a>
            </p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
        </div>
    </section>
<!-- Section: Links  -->

<!-- Copyright -->
    <div class="text-center p-4">
    © <?php echo date("Y"); ?> Copyright: Cara
    </div>
<!-- Copyright -->
</footer>
<!-- Footer -->




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

