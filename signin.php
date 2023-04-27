<?php

include 'partials/header.php';

//Get back data if error
$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;
//delete signup data session
unset($_SESSION['signin-data']);


?>

    <div class="container pt-5 pb-5">
        <h3 class="text-white text-center pt-5">VOUS CONNECTER</h3> 
        <div class="row ">
            <?php if(isset($_SESSION['signup-success'])) : ?> 
                    <div class="success-message">
                        <?= $_SESSION['signup-success'];
                        unset($_SESSION['signup-sucess']); ?>
                    </div>
            <?php elseif (isset($_SESSION['signin'])) : ?>
            <div class="error-message">
                        <?= $_SESSION['signin'];
                        unset($_SESSION['signin']); ?>
                    </div>
            <?php endif ?>
            <div class="col-lg-12 mx-auto ">
                <div class="card mt-2 mx-auto p-4 bg-orange">
                    <div class="card-body bg-orange">
                        <div class = "container">
                            <form id="contact-form" role="form" action="<?= ROOT_URL ?>signin-logic.php" method="POST">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">Pseudo ou Email</label>
                                                <input type="text" name="username_email" value="<?= $username_email ?>" class="form-control" placeholder="Pseudo ou Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pb-4">
                                            <div class="form-group">
                                                <label for="form_password">Password</label>
                                                <input type="password" name="password" value="<?= $password ?>" class="form-control" placeholder="Votre password" >
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-sm-dark">Submit</button>
                                    <p class="pt-3">Vous n'êtes pas enregistré ? Veuillez vous <a href="signup.php" class="text-white">enregistrer</a> </p>
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