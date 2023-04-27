<?php

include 'partials/header.php';

?>

    <!-- HERO -->
    <section class="text-white row pt-5 align-items-center justify-content-center hero-project">
        <h1 class="col-lg-3 col-7">PICK YOUR <span class="text-orange">CHAMP</span> </h1>
        <div class="col-lg-8 col-4 d-flex align-items-end justify-content-end row">
            <img src="./images/cyberpunk2.jpg" class="col img-fluid pe-2 col-6" alt="...">
            <img src="./images/japanese1.jpg" class="col img-fluid pe-2 project-img2 col-4" alt="...">
            <img src="./images/knight4.jpg" class="col img-fluid project-img3 col-2" alt="...">
        </div>
    </section>

    <!-- MODALE -->
    <section>
        <div class="container">
            <div class="d-flex align-items-end justify-content-center pb-5">
                <h2 class="border-bottom border-orange border-1 pb-2 fw-bold text-white text-center">LES CHAMPIONS DISPONIBLES</h2>
            </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="card bg-orange"> 
                    <img src="./images/knight4.jpg" class="card-img-top"/>
                    <div class="card-body text-center">
                        <h5>Gardienne <span class="text-white">Cara</span> du SEO</h5>
                    </div>
                    <div class="card-footer p-3 text-center">
                        <button type="button" class="btn btn-outline-secondary w-75 shadow bg-dark-gray text-white" data-bs-toggle="modal" data-bs-target="#cara">Gameplay</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="cara" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
        
                        <!-- Header -->
                        <div class="modal-header">
                            <h5 class="modal-title text-center">
                                Gardienne <span>Cara</span> du SEO
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
        
                    <!-- Body -->
                        <div class="modal-body w-100">
                            <img src="./images/knight4.jpg" class="w-100"/>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, repudiandae? Atque est veniam sint hic expedita tempore alias nemo reiciendis sapiente laudantium voluptates voluptate quidem, ut, eaque officiis consequatur nulla assumenda praesentium similique nisi cumque ratione tempora nobis. Totam aperiam hic, quis, perspiciatis a repudiandae eligendi consectetur quo, architecto dolor quisquam in ex ullam tempore praesentium id pariatur voluptas impedit obcaecati. Error, in est non iure expedita qui magni quam, laborum asperiores voluptas sunt, veniam omnis deserunt numquam aut possimus alias nam maiores? Inventore eum voluptatibus tenetur, accusamus iure, quod qui autem reprehenderit quasi unde in, placeat quis beatae quaerat!</p>
                        </div>
        
                    <!-- Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary w-75 shadow bg-dark-gray text-white" data-bs-toggle="tooltip" data-bs-placement="bottom">I pick this character</button>
                        </div>
        
                    </div>
                </div>
            </div>
        
            <div class="col-lg-4 col-md-6">
                <div class="card bg-orange"> <!-- Mettez chaque item dans une carte bootstrap -->
                    <img src="./images/japanese1.jpg" class="card-img-top" />
                    <div class="card-body text-center">
                        <h5>Bushi <span class="text-white">Morgause</span> du marketing</h5>
                    </div>
                        <div class="card-footer p-3 text-center">
                            <button type="button" class="btn btn-outline-secondary w-75 shadow bg-dark-gray text-white" data-bs-toggle="modal" data-bs-target="#achatCoupe">Gameplay</button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="achatCoupe" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
        
                            <!-- Header -->
                            <div class="modal-header">
                                <h5 class="modal-title">Bushi <span class="text-white">Morgause</span> du marketing</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
        
                            <!-- Body -->
                            <div class="modal-body w-100">
                                <img src="./images/japanese1.jpg" class="w-100"/>
                            </div>
        
                            <!-- Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cet article n'est plus disponible">Ajouter au panier</button>
                            </div>
        
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-6">
                    <div class="card bg-orange"> <!-- Mettez chaque item dans une carte bootstrap -->
                        <img src="./images/cyberpunk2.jpg" class="card-img-top" />
                        <div class="card-body text-center">
                            <h5>Cyber <span class="text-white">Tanthiel</span> Full Stack JS</h5>
                        </div>
                        <div class="card-footer p-3 text-center">
                            <button type="button" class="btn btn-outline-secondary w-75 shadow bg-dark-gray text-white" data-bs-toggle="modal" data-bs-target="#achatBaguette">Gameplay</button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="achatBaguette" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
        
                            <!-- Header -->
                            <div class="modal-header">
                                <h5 class="modal-title">Cyber <span class="text-white">Tanthiel</span> Full Stack JS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
        
                            <!-- Body -->
                            <div class="modal-body w-100">
                                <img src="./images/cyberpunk2.jpg" class="w-100"/>
                            </div>
        
                            <!-- Footer -->
                            <div class="modal-footer"></div>
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cet article n'est plus disponible">Ajouter au panier</button>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SUCCESS -->
    <section class="text-white d-flex-column align-items-end justify-content-center p-5">
    <div class="d-flex align-items-end justify-content-center">
        <h2 class="border-bottom border-orange border-1 pb-2 fw-bold"> LES SUCCES </h2>
    </div>
    <div class="row">
        <a href="" class="p-5 col-md-6 text-decoration-none text-reset article">
            <div>
                <div class="hero-general d-flex align-items-end justify-content-end blog-img1">
                    <h4 class="border border-orange border-1 p-2">SEO</h4>
                </div>
                <div class="shadow-lg p-3 mb-5 rounded">
                    <p>Date de l'article</p>
                    <h3>Titre de l'article</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptates maiores odit dolorum? Laborum, quae alias veniam corporis praesentium id.</p>
                </div>
            </div>
        </a>
        
        <div class="p-5 col-md-6">
            <div class="hero-general d-flex align-items-end justify-content-end blog-img1">
                <h4 class="border border-orange border-1 p-2">SEO</h4>
            </div>
            <div class="shadow-lg p-3 mb-5 rounded">
                <p>Date de l'article</p>
                <h3>Titre de l'article</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptates maiores odit dolorum? Laborum, quae alias veniam corporis praesentium id.</p>
            </div>
        </div>
        <div class="p-5 col-md-6">
            <div class="hero-general d-flex align-items-end justify-content-end blog-img1">
                <h4 class="border border-orange border-1 p-2">SEO</h4>
            </div>
            <div class="shadow-lg p-3 mb-5 rounded">
                <p>Date de l'article</p>
                <h3>Titre de l'article</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptates maiores odit dolorum? Laborum, quae alias veniam corporis praesentium id.</p>
            </div>
        </div>
    </div>
    
    
</section>
    
<?php

include 'partials/footer.php';

?>