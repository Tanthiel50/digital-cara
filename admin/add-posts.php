<?php

include 'partials/header.php';

//Fetch categories from DB
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

//get back form data if invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

//delete form data session
unset($_SESSION['add-post-data']);

?>

<section class="text-white pt-5 w-75 h-75 dashboard">
        <div class="list-group list-group-horizontal flex justify-content-center pb-5">
                <a class="list-group-item blog-filter" href="index.php"><i class="uil uil-user-circle icon"></i><h6 class="dashboard-title">Mon profil</h6></a>
                <!-- <a class="list-group-item blog-filter" href="comments.php"><i class="uil uil-comment icon"></i><h6 class="dashboard-title">Mes commentaires</h6></a> -->
                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <a class="list-group-item blog-filter" href="add-posts.php"><i class="uil uil-comment-add icon"></i><h6 class="dashboard-title">Ajouter un post</h6></a>
                <a class="list-group-item blog-filter" href="manage-posts.php"><i class="uil uil-comment-alt-message icon"></i><h6 class="dashboard-title">Gérer articles</h6></a>
                <a class="list-group-item blog-filter" href="add-user.php"><i class="uil uil-user-plus icon"></i><h6 class="dashboard-title">Ajouter un utilisateur</h6></a>
                <a class="list-group-item blog-filter" href="manage-users.php"><i class="uil uil-user-exclamation icon"></i><h6 class="dashboard-title">Gérer utilisateurs</h6></a>
                <a class="list-group-item blog-filter" href="add-category.php"><i class="uil uil-right-indent-alt icon"></i><h6 class="dashboard-title">Ajouter catégorie</h6></a>
                <a class="list-group-item blog-filter" href="manage-categories.php"><i class="uil uil-subject icon"></i><h6 class="dashboard-title">Gérer catégories</h6></a>
                <?php endif ?>
        </div>
        <div class="col-lg-8 col-sm-10 text-center d-flex flex-column m-auto">
            <h3>Ajouter un post</h3>
            <form action="<?= ROOT_URL ?>admin/add-post-logic.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <?php if(isset($_SESSION['add-post'])) : ?>
                        <div class="error-message">
                            <p>
                                <?= $_SESSION['add-post'];
                                unset($_SESSION['add-post']);
                                ?>
                            </p>
                        </div>
                    <?php endif ?>
                    <input type="text" class="form-control w-100" name="title" placeholder="Titre" value="<?= $title ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Catégorie</label>
                    <select name="category" class="form-control">
                        <?php while($category = mysqli_fetch_assoc($categories)): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title']?></option>
                        <?php endwhile ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Texte</label>
                    <textarea class="form-control h-25" rows="5" placeholder="Article de blog" name="body" value=><?= $body ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="thumbnail" class="form-control-file">
                </div>
                <button name="submit" class="btn-sm text-decoration-none text-white">Publier l'article de blog</button>
            </form>
        </div> 
    </section>
<?php

include '../partials/footer.php';

?>