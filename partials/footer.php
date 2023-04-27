<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-muted bg-night-blue w-100">

<!-- Section: Links  -->
    <section class="p-3">
        <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4 text-white">
                Permalinks
            </h6>
            <p>
                <a href="<?= ROOT_URL ?>index.php" class="text-reset text-decoration-none">Home</a>
            </p>
            <p>
                <a href="<?= ROOT_URL ?>services.php" class="text-reset text-decoration-none">Services</a>
            </p>
            <p>
                <a href="<?= ROOT_URL ?>contact.php" class="text-reset text-decoration-none">Contact</a>
            </p>
            <p>
                <a href="<?= ROOT_URL ?>blog.php" class="text-reset text-decoration-none">Blog</a>
            </p>
            <?php if(isset($_SESSION['user-id'])) : ?>
                <p>
                    <a href="<?= ROOT_URL ?>dashboard.php" class="text-reset text-decoration-none">Dashboard</a>
                </p>
                <p>
                    <a href="<?= ROOT_URL ?>logout.php" class="text-reset text-decoration-none">Logout</a>
                </p>
            <?php else : ?>
                <p>
                    <a href="<?= ROOT_URL ?>signin.php" class="text-reset text-decoration-none">Signin</a>
                </p>
            <?php endif ?>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4 text-white">
                Blog
            </h6>
            <p>
                <a href="#!" class="text-reset text-decoration-none">Pricing</a>
            </p>
            <p>
                <a href="#!" class="text-reset text-decoration-none">Settings</a>
            </p>
            <p>
                <a href="#!" class="text-reset text-decoration-none">Orders</a>
            </p>
            <p>
                <a href="#!" class="text-reset text-decoration-none">Help</a>
            </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4 text-white">Socials</h6>
            <p>
                <a href="https://github.com/Tanthiel50" target="_blank" class="text-reset"><i class="uil uil-github"></i></a>
            </p>
            <p>
                <a href="https://www.linkedin.com/in/c%C3%A9cile-blin-8ab25a72/" target="_blank" class="text-reset"><i class="uil uil-linkedin"></i></a>
            </p>
            <p>
                <a href="discordapp.com/users/268824133557551104" target="_blank" class="text-reset"><i class="uil uil-discord"></i></a>
            </p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
        </div>
    </section>
<!-- Section: Links  -->

<!-- Copyright -->
    <div class="text-center p-4">
    © <?php echo date("Y"); ?> Copyright: Cara
    </div>
<!-- Copyright -->
</footer>
<!-- Footer -->




<script src="/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>

