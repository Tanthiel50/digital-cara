<?php

include 'partials/header.php';


// fetch posts if id is set
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);
}else {
    header('location: ' .ROOT_URL. 'blog.php');
    die();
}

?>

    <!-- HERO -->
    <section class="text-white row pt-5 align-items-center justify-content-center hero-project pb-5">
        <h1 class="col-lg-3 col-6">LES DERNIERES MAJ <br><span class="text-orange text-uppercase">
            <?php
            //Fetch category from categories table using category_id of post
            $category_id = $id;
            $category_query = "SELECT * FROM categories WHERE id=$id";
            $category_result = mysqli_query($connection, $category_query);
            $category = mysqli_fetch_assoc($category_result);
            echo $category['title'];
            ?>
        </h1>
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
        <h2 class="border-bottom border-orange border-1 display-4 pb-2 fw-bold text-uppercase">
        <?php
            //Fetch category from categories table using category_id of post
            $category_id = $id;
            $category_query = "SELECT * FROM categories WHERE id=$id";
            $category_result = mysqli_query($connection, $category_query);
            $category = mysqli_fetch_assoc($category_result);
            echo $category['title'];
            ?>
        </h2>
    </div>
    
    <?php if (mysqli_num_rows($posts) > 0) : ?>
    <div class="row w-100">
    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
        <div class=" col-md-4 d-flex flex-column align-items-center justify-content-center pb-4 pt-4">
            <img class="img-blog cover pt-3 pb-3" src="./images/thumbnails/<?= $post ['thumbnail'] ?>" alt="">
            <a class="category-button fs-6 text-uppercase text-decoration-none" href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>"><?= $category['title'] ?></a>
            <a class="pt-3 fw-bolder text-uppercase blog-link" href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>" ><?= $post ['title'] ?></a>
            <div class="pt-3"><?= substr($post['body'], 0, 150) ?><span ><a class="blog-link" href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"> Lire plus</a> </span></div>
        </div>
        <?php endwhile ?>
    </div>
</section>
<?php else : ?>
<div class="text-white d-flex-column align-items-end justify-content-center p-5">
    <p class="text-center display-6">Pas de MAJ annoncée dans cette catégorie</p>
</div>
<?php endif ?>

<?php

include 'partials/footer.php';

?>