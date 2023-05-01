<?php

include 'partials/header.php';

//fetch categories from DB
$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $query);

?>

    <section class="text-white pt-5 w-75 dashboard">
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
    </section>
    <div class="text-center d-flex flex-column w-75 dashboard">
            <h3 class="text-white">Gérer les catégories</h3>
            <?php if(isset($_SESSION['add-category-success'])) : //show if add-category is success ?>
            <div class="success-message">
                <p>
                    <?= $_SESSION['add-category-success'];
                    unset($_SESSION['add-category-success']) ?>
                </p>
            </div>
            <?php elseif(isset($_SESSION['add-category'])) : //show if add-category is not success ?>
                <div class="error-message">
                    <p>
                        <?= $_SESSION['add-category'];
                        unset($_SESSION['add-category']) ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-category-success'])) : //show if edit-category is success ?>
                <div class="success-message">
                    <p>
                        <?= $_SESSION['edit-category-success'];
                        unset($_SESSION['edit-category-success']) ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-category'])) : //show if edit-category is not success ?>
                <div class="error-message">
                    <p>
                        <?= $_SESSION['edit-category'];
                        unset($_SESSION['edit-category']) ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['delete-category-success'])) : //show if delete-category is success ?>
                <div class="success-message">
                    <p>
                        <?= $_SESSION['delete-category-success'];
                        unset($_SESSION['delete-category-success']) ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['delete-category'])) : //show if delete-category is not success ?>
                <div class="error-message">
                    <p>
                        <?= $_SESSION['delete-category'];
                        unset($_SESSION['delete-category']) ?>
                    </p>
                </div>
            <?php endif ?>
            <?php if(mysqli_num_rows($categories) > 0) : ?>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Editer</th>
                    <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                    <tr>
                        <td><?= $category['title'] ?></th>
                        <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id'] ?>" class="btn-sm text-decoration-none text-white">Editer</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id'] ?>" class="btn-sm text-decoration-none text-white">Supprimer</a></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
            <?php else : ?>
                <div class="alert_message  error"><?= "Pas de catégories" ?></div>
            <?php endif ?>
    </div>

    
    
    <?php

include '../partials/footer.php';

?>