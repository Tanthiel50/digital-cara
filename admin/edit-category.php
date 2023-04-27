<?php

    include 'partials/header.php';

    if(isset($_GET['id'])) {
        $id = filter_var(($_GET['id']), FILTER_SANITIZE_NUMBER_INT);

        //fetch categories from DB
        $query = "SELECT * FROM categories WHERE id=$id";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1) {
            $category = mysqli_fetch_assoc($result);
        }
        
    }else {
        header('location: ' . ROOT_URL . 'admin/manage-categories');
        die();
    }

?>

<section class="text-white pt-5 w-75 h-75 dashboard">
        <div class="list-group list-group-horizontal flex justify-content-center pb-5">
                <a class="list-group-item blog-filter" href="index.php"><i class="uil uil-user-circle icon"></i><h6 class="dashboard-title">Mon profil</h6></a>
                <a class="list-group-item blog-filter" href="comments.php"><i class="uil uil-comment icon"></i><h6 class="dashboard-title">Mes commentaires</h6></a>
                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <a class="list-group-item blog-filter" href="add-posts.php"><i class="uil uil-comment-add icon"></i><h6 class="dashboard-title">Ajouter un post</h6></a>
                <a class="list-group-item blog-filter" href="manage-posts.php"><i class="uil uil-comment-alt-message icon"></i><h6 class="dashboard-title">Gérer articles</h6></a>
                <a class="list-group-item blog-filter" href="add-user.php"><i class="uil uil-user-plus icon"></i><h6 class="dashboard-title">Ajouter un utilisateur</h6></a>
                <a class="list-group-item blog-filter" href="manage-users.php"><i class="uil uil-user-exclamation icon"></i><h6 class="dashboard-title">Gérer utilisateurs</h6></a>
                <a class="list-group-item blog-filter" href="add-category.php"><i class="uil uil-right-indent-alt icon"></i><h6 class="dashboard-title">Ajouter catégorie</h6></a>
                <a class="list-group-item blog-filter" href="manage-categories.php"><i class="uil uil-subject icon"></i><h6 class="dashboard-title">Gérer catégories</h6></a>
                <?php endif ?>
            </div>
        <div class="container">
        <div class="row ">
            <!-- <?php if(isset($_SESSION['add-user'])) : ?>
                <div class="error-message">
                    <p>
                        <?= $_SESSION['add-user'];
                        unset($_SESSION['add-user']);
                        ?>
                    </p>
                </div>
                

            <?php endif ?> -->
            <div class="col-lg-12 mx-auto ">
                <div class="card mt-2 mx-auto bg-dark-gray">
                    <div class="card-body bg-dark-gray">
                        <div class = "container">
                            <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Titre</label>
                                    <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                    <input type="text" value="<?= $category['title'] ?>" class="form-control w-100" name="title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3"><?= $category['description'] ?></textarea>
                                </div>
                                <button name="submit" class="btn-sm text-decoration-none text-white">Ajouter la catégorie</button>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- /.8 -->
            </div>
        <!-- /.row-->
        </div>
    </div>
</section>

<?php

include '../partials/footer.php';

?>