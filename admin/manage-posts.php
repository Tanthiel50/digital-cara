<?php

include 'partials/header.php';
//fetch post from DB
$query = "SELECT * FROM posts ORDER BY id";
$posts = mysqli_query($connection, $query);

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
            <h3 class="text-white">Gérer les articles</h3>
            <?php if(isset($_SESSION['add-post-success'])) : ?>
                <div class="success-message">
                    <p>
                        <?= $_SESSION['add-post-success'];
                        unset($_SESSION['add-post-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-post-success'])) : //if edit post is successful ?> 
                <div class="success-message">
                    <p>
                        <?= $_SESSION['edit-post-success'];
                        unset($_SESSION['edit-post-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-post'])) : //if edit post is successful ?> 
                <div class="error-message">
                    <p>
                        <?= $_SESSION['edit-post'];
                        unset($_SESSION['edit-post']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['delete-post-success'])) : //if edit post is successful ?> 
                <div class="success-message">
                    <p>
                        <?= $_SESSION['delete-post-success'];
                        unset($_SESSION['delete-post-success']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <?php if(mysqli_num_rows($posts) > 0) : ?>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Article</th>
                    <th scope="col" class="table-title">Catégorie</th>
                    <th scope="col" class="table-title">Date</th>
                    <th scope="col">Editer</th>
                    <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                        <!-- get category title of each post from categories table -->
                    <?php 
                    $category_id = $post['category_id'];
                    $category_query = "SELECT title FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <tr>
                        <td><?= $post['title'] ?></th>
                        <td class="table-title"><?= $category['title'] ?></td>
                        <td class="table-title"><?= $post['date_time'] ?></td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id']?>" class="btn-sm text-decoration-none text-white">Editer</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id']?>" class="btn-sm text-decoration-none text-white">Supprimer</a></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
            <?php else : ?>
                <div class="alert_message  error"><?= "Pas de post" ?></div>
            <?php endif ?>
    </div>

    
    
    <?php

include '../partials/footer.php';

?>