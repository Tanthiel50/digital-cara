<?php

include 'partials/header.php';

//Get back data if error
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
//delete signup data session
unset($_SESSION['add-user-data']);

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

            <div class="col-lg-12 mx-auto ">
                <div class="card mt-2 mx-auto bg-dark-gray">
                    <div class="card-body bg-dark-gray">
                        <div class = "container">
                            <form class="d-flex flex-column m-auto text-center" id="contact-form" role="form" action="<?= ROOT_URL ?>admin/add-user-logic.php" method="POST" enctype="multipart/form-data">
                            <h3>Ajouter un utilisateur</h3>
                            <?php if(isset($_SESSION['add-user'])) : ?>
                                <div class="error-message">
                                    <p>
                                        <?= $_SESSION['add-user'];
                                        unset($_SESSION['add-user']);
                                        ?>
                                    </p>
                                </div>
                            <?php endif ?>
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <input type="text" name="firstname" class="form-control" placeholder="Votre prénom" value="<?= $firstname ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="lastname" class="form-control" placeholder="Votre nom" value="<?= $lastname ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pseudo</label>
                                                <input type="text" name="username" class="form-control" placeholder="Votre pseudo" value="<?= $username ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Votre email" value="<?= $email ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="createpassword" class="form-control" placeholder="Votre password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirmer le mot de passe</label>
                                                <input type="password" name="confirmpassword" class="form-control" placeholder="Votre password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pt-4 pb-5">
                                                <div class="form-group">
                                                    <label>Votre avatar</label>
                                                    <input type="file" name="avatar" class="form-control-file">
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group col-md-4">
                                                <label>Role</label>
                                                <select name="userrole" class="form-control">
                                                    <option selected value="0">Utilisateur</option>
                                                    <option value="1">Administrateur</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-sm" class="">Submit</button>
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