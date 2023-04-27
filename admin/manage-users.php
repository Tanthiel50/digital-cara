<?php

include 'partials/header.php';

//fetch users from DB but not current user
$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
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
    <div class="text-center d-flex flex-column w-75 dashboard">
            <h3 class="text-white">Gérer les utilisateurs</h3>
            <?php if(mysqli_num_rows($users) > 0) : ?>
            <?php if(isset($_SESSION['add-user-success'])) : //if add user is successful ?> 
                <div class="success-message">
                    <p>
                        <?= $_SESSION['add-user-success'];
                        unset($_SESSION['add-user-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-user-success'])) : //if edit user is successful ?> 
                <div class="success-message">
                    <p>
                        <?= $_SESSION['edit-user-success'];
                        unset($_SESSION['edit-user-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-user'])) : //if edit user is not successful ?> 
                <div class="error-message">
                    <p>
                        <?= $_SESSION['edit-user'];
                        unset($_SESSION['edit-user']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['delete-user'])) : //if delete user is not successful ?> 
                <div class="error-message">
                    <p>
                        <?= $_SESSION['delete-user'];
                        unset($_SESSION['delete-user']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['delete-user-success'])) : //if delete user is successful ?> 
                <div class="success-message">
                    <p>
                        <?= $_SESSION['delete-user-success'];
                        unset($_SESSION['delete-user-success']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Nom/Prénom</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col" >Admin</th>
                    <th scope="col">Editer</th>
                    <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = mysqli_fetch_assoc($users)) :  ?>
                    <tr>
                        <td scope="row"><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                        <td><?= "{$user['username']}" ?></td>
                        <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn-sm text-decoration-none text-white">Editer</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="btn-sm text-decoration-none text-white">Supprimer</a></td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="error-message"><?= "Pas d'utilisateurs trouvés" ?></div>
            <?php endif ?>
    </div>

    
    
    <?php

include '../partials/footer.php';

?>