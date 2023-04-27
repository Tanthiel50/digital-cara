<?php

include 'partials/header.php';
//fetch users from DB but not current user
$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM users WHERE id=$current_admin_id";
$users = mysqli_query($connection, $query);

?>

    <section class="text-white pt-5 w-75 dashboard">
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
    </section>
    <section class="pb-5 dashboard">
        
        <div class="col-lg-8 col-sm-10 text-center d-flex flex-column m-auto text-white">
        <h3>Mon profil</h3>
        <?php if(isset($_SESSION['edit-profil-success'])) : //if edit profil is seccessful ?> 
                <div class="success-message">
                    <p>
                        <?= $_SESSION['edit-profil-success'];
                        unset($_SESSION['edit-profil-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-profil'])) : //if edit profil is not successful ?> 
                <div class="error-message">
                    <p>
                        <?= $_SESSION['edit-profil'];
                        unset($_SESSION['edit-profil']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            
            <?php while($user = mysqli_fetch_assoc($users)) :  ?>
            <div class="d-flex justify-content-lg-between flex-lg-row flex-sm-column">
                <div class="ps-lg-5">Prénom</div>
                <div><?= "{$user['firstname']}" ?></div>
            </div>
            <div class="d-flex justify-content-lg-between flex-lg-row flex-sm-column">
                <div class="ps-lg-5">Nom</div>
                <div><?= "{$user['lastname']}" ?></div>
            </div>
            <div class="d-flex justify-content-lg-between flex-lg-row flex-sm-column">
                <div class="ps-lg-5">Pseudo</div>
                <div><?= "{$user['username']}" ?></div>
            </div>
            <div class="d-flex justify-content-lg-between flex-lg-row flex-sm-column">
                <div class="ps-lg-5">Email</div>
                <div><?= "{$user['email']}" ?></div>
            </div>
        <div class="pt-4 "><a href="<?= ROOT_URL ?>admin/edit-profil.php?id=<?= $user['id'] ?>" class="btn-sm text-decoration-none text-white">Editer mon profil</a></div>
        <?php endwhile ?>
    </section>
        
    

    
    
    <?php

include '../partials/footer.php';

?>