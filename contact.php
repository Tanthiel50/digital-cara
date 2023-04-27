<?php

include 'partials/header.php';

?>

    <!-- HERO -->
    <section class="text-white row pt-5 align-items-center justify-content-center hero-project">
        <h1 class="col-lg-3 col-7">CONTACT <span class="text-orange">PAGE</span> </h1>
        <div class="col-lg-8 col-4 d-flex align-items-end justify-content-end row">
            <img src="./images/contact-big.png" class="col img-fluid pe-2 col-6" alt="...">
            <img src="./images/contact-big.png" class="col img-fluid pe-2 project-img2 col-4" alt="...">
            <img src="./images/contact-big.png" class="col img-fluid project-img3 col-2" alt="...">
        </div>
    </section>

    <div class="container">]  
        <div class="row ">
            <div class="col-lg-12 mx-auto ">
                <div class="card mt-2 mx-auto p-4 bg-orange">
                    <div class="card-body bg-orange">
                        <div class = "container">
                            <form id="contact-form" role="form">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">Prénom</label>
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Votre prénom" required="required" data-error="Firstname is required.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_lastname">Nom</label>
                                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Votre nom" required="required" data-error="Lastname is required.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_email">Email</label>
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Votre email" required="required" data-error="Valid email is required.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_need">Spécifiez votre demande</label>
                                                <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                                    <option value="" selected disabled>--Votre demande concerne--</option>
                                                    <option >Une question</option>
                                                    <option >Recrutement</option>
                                                    <option >Une estimation</option>
                                                    <option >Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">Message</label>
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Ecrivez votre message ici." rows="4" required="required" data-error="Please, leave us a message."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pt-3">
                                            <input type="submit" class="btn btn-sm-dark btn-send pt-2 btn-block" value="Envoyer le message" >
                                        </div>
                                    </div>
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