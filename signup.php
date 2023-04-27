<?php
include 'partials/header.php';

//Get back data if error
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
//delete signup data session
unset($_SESSION['signup-data']);

?>

    <div class="container pt-5 pb-5">
        <h3 class="text-white text-center pt-5">VOUS ENREGISTRER</h3> 
        <div class="row ">
            <?php if(isset($_SESSION['signup'])) : ?> 
                    <div class="error-message">
                        <?= $_SESSION['signup'];
                        unset($_SESSION['signup']); ?>
                    </div>

            <?php endif ?>

            <div class="col-lg-12 mx-auto ">
                <div class="card mt-2 mx-auto p-4 bg-orange">
                    <div class="card-body bg-orange">
                        <div class = "container">
                            <form id="contact-form" role="form" action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <input type="text" name="firstname" class="form-control" value="<?= $firstname ?>" placeholder="Votre prénom" data-error="Firstname is required.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="lastname" value="<?= $lastname ?>" class="form-control" placeholder="Votre nom" data-error="Lastname is required.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pseudo</label>
                                                <input type="text" name="username" value="<?= $username ?>" class="form-control" placeholder="Votre pseudo" data-error="Valid pseudo is required.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" value="<?= $email ?>" class="form-control" placeholder="Votre email" data-error="Valid email is required.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="createpassword" class="form-control" placeholder="Votre password" data-error="Valid password is required.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Répétez votre password</label>
                                                <input type="password" name="confirmpassword" class="form-control" placeholder="Répétez votre password" data-error="Valid password is required.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-3 pb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Votre avatar</label>
                                                <input type="file" name="avatar" class="form-control-file" data-error="Valid avatar is required.">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm-dark" name="submit">S'enregistrer</button>
                                    <p class="pt-3">Vous êtes déjà enregistré ? Veuillez vous <a href="signin.php" class="text-white">connecter</a> </p>
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

    <?php

include 'partials/footer.php';

?>