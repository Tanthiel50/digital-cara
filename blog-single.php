<?php

include 'partials/header.php';

//fetch posts from DB
// $query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 3";
// $posts = mysqli_query($connection, $query);

//fetch post from DB if id is set
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
}else{
    header('location' .ROOT_URL. 'blog.php');
    die();
}
?>

    <!-- HERO -->
    <section class="text-white row pt-5 align-items-center justify-content-center hero-project p-5">
        <div class="col-lg-6 col-6 d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-center text-orange">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, voluptate.</h1>
            <h3 class="border border-orange border-1 p-2">SEO</h3>
            <p>Date de l'article</p>
        </div>
        <div class="col-lg-6 col-6 d-flex align-items-end justify-content-end row hero-blog"></div>
    </section>

    <!-- ARTICLE -->
    <section class="text-white text-center p-5">
        <h2 class="text-orange pb-5"><?= $post['title'] ?></h2>
        <p></p>
    </section>
    
    <!-- COMMENTS -->
    <section class="w-75 d-flex justify-content-center m-auto pb-5">
        <div class="bg-white p-5">
            <h4 class="text-orange">TITRE DU COMMENTAIRE</h4>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni totam rem porro, iure quam perferendis veniam nam libero mollitia? Fuga vero voluptas atque expedita commodi veritatis labore cum hic cupiditate pariatur quo animi, eum eius, saepe deserunt quidem sunt, excepturi non? Dolorum, tempore nisi dolore ad mollitia sequi blanditiis ea repellat animi. Eveniet delectus sequi, maiores voluptatum natus voluptatibus adipisci aliquam incidunt vero ab optio quos vel. Dolor totam deleniti nesciunt corporis nobis enim alias harum? Libero ipsam error, alias modi eveniet quisquam repudiandae in tenetur cum expedita qui! Ullam repellat nisi alias a aliquam esse totam dolore eos quis.</p>
            <div>
                <p>PSEUDO / Date du commentaire</p>
            </div>
        </div>
    </section>

    <?php if(isset($_SESSION['user-id'])) : ?>
        <section class="w-75 d-flex flex-column justify-content-center m-auto">
            <h3 class="text-white">Votre avis sur cette <span class="text-orange">MAJ</span> </h3>
            <form action="<?= ROOT_URL ?>add-comment-logic.php" method="POST" enctype="multipart/form-data">
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
    <!-- <section class="text-white d-flex-column align-items-end justify-content-center p-5">
    <div class="d-flex align-items-end justify-content-center">
        <h2 class="border-bottom border-orange border-1 display-4 fw-bold"> LES DERNIERES MAJ </h2>
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
            <div class="pt-3 fw-bolder text-uppercase" ><?= $post ['title'] ?></div>
            <div class="pt-3"><?= substr($post['body'], 0, 150) ?><span class="text-orange"><a> Lire plus</a> </span></div>
        </div>
        <?php endwhile ?>
    </div>
    
    
</section> -->

<?php

include 'partials/footer.php';

?>
