<?php

include 'partials/header.php';

// //fetch categories
// $category_id = $featured['category_id'];
// $category_query = "SELECT * FROM categories WHERE id=$category_id";
// $category_result = mysqli_query($connection, $category_query);
// $category = mysqli_fetch_assoc($category_result);

// //fetch author
// $author_id = $featured['author_id'];
// $author_query = "SELECT * FROM users WHERE id=$author_id";
// $author_result = mysqli_query($connection, $author_query);
// $author = mysqli_fetch_assoc($author_result);

// //fetch posts from DB
$query = "SELECT * FROM posts ORDER BY date_time DESC";
$posts = mysqli_query($connection, $query);

?>

    <!-- HERO -->
    <section class="text-white row pt-5 align-items-center justify-content-center hero-project pb-5">
        <h1 class="col-lg-3 col-6 ">LES DERNIERES <br><span class="text-orange">MAJ</span> </h1>
        <div class="col-lg-8 col-5 d-flex align-items-end justify-content-end row">
            <img src="./images/blog.jpg" class="col img-fluid pe-2 col-6" alt="...">
            <img src="./images/blog1.jpg" class="col img-fluid pe-2 project-img2 col-4" alt="...">
            <img src="./images/blog.jpg" class="col img-fluid project-img3 col-2" alt="...">
        </div>
    </section>

    <!-- LES DERNIERES MAJ -->
<section class="text-white d-flex-column align-items-end justify-content-center p-5">
    <div class="list-group list-group-horizontal flex justify-content-center">
        <?php
        $all_categories_query = "SELECT * FROM categories";
        $all_categories = mysqli_query($connection, $all_categories_query);
        ?>
        <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
        <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id']?>" class="list-group-item blog-filter"><?= $category['title'] ?></a>
        <?php endwhile ?>
    </div>
</section>
<section class="text-white d-flex-column align-items-end justify-content-center p-5">
    <div class="d-flex align-items-end justify-content-center">
        <h2 class="border-bottom border-orange border-1 display-4 pb-2 fw-bold"> LES DERNIERES MAJ </h2>
    </div>
    
    <div class="row w-100">
    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
        <div class=" col-md-4 d-flex flex-column align-items-center justify-content-center pb-4 pt-4">
            <?php
            //Fetch category from categories table using category_id of post
            $category_id = $post['category_id'];
            $category_query = "SELECT * FROM categories WHERE id=$category_id";
            $category_result = mysqli_query($connection, $category_query);
            $category = mysqli_fetch_assoc($category_result);

            ?>
            <img class="img-blog cover pt-3 pb-3" src="./images/thumbnails/<?= $post ['thumbnail'] ?>" alt="">
            <a class="category-button fs-6 text-uppercase text-decoration-none" href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>"><?= $category['title'] ?></a>
            <a class="pt-3 fw-bolder text-uppercase blog-link" href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>" ><?= $post ['title'] ?></a>
            <div class="pt-3"><?= substr($post['body'], 0, 150) ?><span ><a class="blog-link" href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"> Lire plus</a> </span></div>
        </div>
        <?php endwhile ?>
    </div>
    
    
</section>

    <?php

include 'partials/footer.php';

?>