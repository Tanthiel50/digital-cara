<?php

include 'partials/header.php';


//fetch posts from DB
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 3";
$posts = mysqli_query($connection, $query);

?>


<section class="bg-dark-gray mt-5 position-relative">
    <div class=" position-relative">
        <img src="images/background.png" alt="" id="image-hero">
    </div>
    <div class="text-white position-absolute" id="text-hero">
        <h1 class="lg-display-1 hero-phrase">
            Marketing <br> Communication <br> Full stack JS <span class="d-block fw-light mt-5 text-orange fw-bold">Pick your Player</span>
        </h1>
        <button type="button" class="btn btn-outline-orange mt-4 text-white fw-bold btn-lg ">
                <h2 class="hero-btn"> En savoir plus</h2>
        </button>
    </div>
</section>

<!-- CHOOSE YOUR ROLE -->

<section class="bg-dark-gray text-white row pt-5">
    <img src="images/IMG-20230110-WA0002.jpg" class="role-img col-lg-6 order-1" alt="">
    <div class="col d-flex flex-column align-items-center justify-content-center m-5 col order-2">
        <h2 class="border-bottom border-orange border-1 display-4 pb-2 fw-bold"> CHOOSE YOUR ROLE !</h2>
        <div class="pt-5 pb-5">
            Passionnée par le marketing et la communication, je m’y suis orientée très rapidement 
            et avec beaucoup de succès. Autodidacte, j’ai d’abord appris par la pratique, puis j’ai 
            décidé de valider mes compétences avec un displome. Mais ce n’était pas suffisant, 
            j’avais besoin d’étoffer mes capacités afin de pouvoir répondre à plus de demandes et
            de besoins que je pouvais rencontrer dans ma vie professionnelle. J’ai donc décidé 
            de me lancer dans le développement, que je cotoyais déjà depuis plusieurs années.        
        </div>
        <button type="button" class="btn btn-outline-orange mt-4 text-white fw-bold btn-lg">
                <h3> En savoir plus</h3>
        </button>
    </div>
</section>


<!-- PICK YOUR PLAYER -->
<section class="text-white d-flex justify-content-center p-5 align-items-center">
    
    <div>
        <div>
            <h2 class="border-bottom border-orange border-1 display-4 pb-2 fw-bold"> PICK YOUR PLAYER </h2>
        </div>
        <button type="button" class="btn btn-outline-orange mt-4 text-white fw-bold btn-lg">
            <h3> En savoir plus</h3>
        </button>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col hero1 hero-general d-flex align-items-end justify-content-center fw-bold">
                SEO <span class="text-orange">"TANTHIEL"</span>EXPERT
            </div>
            <div class="col hero2 hero-general d-flex align-items-end justify-content-center fw-bold">
                SEO <span class="text-orange">"TANTHIEL"</span>EXPERT
            </div>
        </div>
        <div class="row ">
            <div class="col hero3 hero-general d-flex align-items-end justify-content-center fw-bold">
                SEO <span class="text-orange">"TANTHIEL"</span>EXPERT
            </div>
            <div class="col bg-orange hero-general d-flex align-items-center justify-content-center fw-bold">
                Voir plus
            </div>
        </div>
    </div>
    
</section>


<!-- NEWSLETTER -->

<section class="bg-orange d-flex flex-row justify-content-evenly align-items-center">
    <div>
        <img src="images/newsletter.png" alt="" class="newsletter-img pt-3 pb-3" >
    </div>
    <div>
        <h3 class="display-3 fw-bold">
            Etre informé des dernieres <br> <span class="text-white border-bottom border-dark-gray border-3">MAJ</span>
        </h3>
        <button type="button" class="btn btn-outline-dark-gray text-white btn-lg mt-4">
            Je souhaite connaitre les prochaines MAJ 
        </button>
    </div>
</section>



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



