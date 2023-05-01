<?php

include 'partials/header.php';

//fetch posts from DB
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 3";
$posts = mysqli_query($connection, $query);

//fetch categories from DB
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);



//fetch post from DB if id is set
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $post = mysqli_fetch_assoc($result);
}else{
    header('location: ' .ROOT_URL. 'blog.php');
    die();
}

// Récupération de l'id de l'article en cours
$id_article = $_GET['id'];

//fetch comments from DB
$comments_query = "SELECT * FROM comments WHERE posts_id = $id_article";
$comments = mysqli_query($connection, $comments_query);
?>

    <!-- HERO -->
    <section class="text-white row pt-5 hero-project justify-content-between align-content-between h-75">
        <div class="col-lg-4 col-5 d-flex flex-column justify-content-center align-items-center">
            <h1 class="text-center text-orange ps-5 pb-3"><?= $post['title'] ?></h1>
            <?php
            //Fetch category from categories table using category_id of post
            $category_id = $post['category_id'];
            $category_query = "SELECT * FROM categories WHERE id=$category_id";
            $category_result = mysqli_query($connection, $category_query);
            $category = mysqli_fetch_assoc($category_result);

            ?>
            <a class="category-button fs-6 text-uppercase text-decoration-none ms-5" href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>"><?= $category['title'] ?></a>
            <p class="ms-5 pt-3">
                <?= date("M d, Y", strtotime($post['date_time'])) ?>
            </p> 
        </div>
        <img class="col-lg-7 col-5 d-flex align-items-center justify-content-center row img-blog-post cover" src="./images/thumbnails/<?= $post['thumbnail'] ?>">
    </section>

    <!-- ARTICLE -->
    <section class="text-white pb-4 w-100 d-flex flex-column justify-content-center align-items-center">
        <p class="w-75"><?= $post['body'] ?></p>
    </section>
    
    <!-- COMMENTS -->
    <section class="w-75 d-flex flex-column justify-content-center m-auto pb-5 pt-5">
        <h3 class="text-orange">Vos commentaires</h3>

        <?php while ($comment = mysqli_fetch_assoc($comments)) : ?>
        <div class="bg-white p-5 mb-5">
            <h4 class="text-orange"><?= $comment['title'] ?></h4>
            <p><?= $comment['body'] ?></p>
            <div>
                <p> <?= $comment['created_at'] ?></p>
            </div>
        </div>
        <?php endwhile ?>
    </section>

    <?php if(isset($_SESSION['user-id'])) : ?>
        <section class="w-75 d-flex flex-column justify-content-center m-auto">
            <h3 class="text-white">Votre avis sur cette <span class="text-orange">MAJ</span> </h3>
            <form action="<?= ROOT_URL ?>add-comment-logic.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="post_id" value="<?php echo $id ?>">
                <div class="mb-3">
                    <label class="form-label text-white">Titre</label>
                    <input type="text" class="form-control w-100" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label text-white">Texte</label>
                    <textarea class="form-control h-25" rows="5" placeholder="Article de blog" name="body"></textarea>
                </div>
                <button name="submit" class="btn-sm text-decoration-none text-white">Publier votre avis</button>
            </form>
        </section>
        <?php else : ?>
        <section class="w-75 d-flex flex-column justify-content-center m-auto">
            <h3 class="text-white">Votre avis sur cette <span class="text-orange">MAJ</span> </h3>
            <p class="text-white"> Se <a href="./signin.php" class="text-orange">connecter</a>  pour laisser un avis</p>
        </section>
    <?php endif ?>
    

    <!-- LES DERNIERES MAJ -->
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
            <div class="pt-3"><?= substr($post['body'], 0, 150) ?><span class="text-orange"><a class="blog-link" href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"> Lire plus</a> </span></div>
        </div>
        <?php endwhile ?>
    </div>
    
    
</section>

<?php

include 'partials/footer.php';

?>
