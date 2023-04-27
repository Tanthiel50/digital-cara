<?php

    include 'partials/header.php';
    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);
    }else{
        header('location: ' . ROOT_URL . 'admin/manage-users.php');
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
                            <form id="contact-form" role="form" action="<?= ROOT_URL ?>admin/edit-user-logic.php" method="POST" enctype="multipart/form-data">
                                <div class="controls">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <input type="text" name="firstname" class="form-control" placeholder="Votre prénom" value="<?= $user['firstname'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="lastname" class="form-control" placeholder="Votre nom" value="<?= $user['lastname'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pseudo</label>
                                                <input type="text" name="username" class="form-control" placeholder="Votre pseudo" value="<?= $user['username'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-4">
                                            <div class="form-group col-md-4">
                                                <label>Role</label>
                                                <select name="userrole" class="form-control">
                                                    <option selected value="0">Utilisateur</option>
                                                    <option value="1">Administrateur</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-sm">Submit</button>
                                </div>
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