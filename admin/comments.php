<?php

include 'partials/header.php';

//fetch current user's comment from DB
$current_user_id = $_SESSION['user-id'];
$query = "SELECT comments.id, comments.posts_id, comments.category_id, comments.title, comments.text FROM comments JOIN users ON comments.user_id = users.id WHERE comments.user_id=$current_user_id ORDER BY comments.id DESC";
$comments = mysqli_query($connection, $query);
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
            <h3 class="text-white">Mes commentaires</h3>
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Mon commentaire</th>
                    <th scope="col" class="table-title">Article</th>
                    <th scope="col" class="table-title">Date</th>
                    <th scope="col">Editer</th>
                    <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi ullam soluta alias. Delectus alias, voluptatibus perferendis asperiores exercitationem, itaque quo consequatur officia, quae numquam quam voluptatum ab ad obcaecati velit minus accusamus. Voluptates vero ad saepe reiciendis ullam, non temporibus modi officia dolorem earum odit, quia ut dolores dicta officiis.</th>
                        <td class="table-title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quidem in expedita similique voluptatum fuga blanditiis, explicabo consequuntur provident repellendus?</td>
                        <td class="table-title">14/12/2023</td>
                        <td><a href="" class="btn-sm text-decoration-none text-white">Editer</a></td>
                        <td><a href="" class="btn-sm text-decoration-none text-white">Supprimer</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi ullam soluta alias. Delectus alias, voluptatibus perferendis asperiores exercitationem, itaque quo consequatur officia, quae numquam quam voluptatum ab ad obcaecati velit minus accusamus. Voluptates vero ad saepe reiciendis ullam, non temporibus modi officia dolorem earum odit, quia ut dolores dicta officiis.</th>
                        <td class="table-title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quidem in expedita similique voluptatum fuga blanditiis, explicabo consequuntur provident repellendus?</td>
                        <td class="table-title">14/12/2023</td>
                        <td><a href="" class="btn-sm text-decoration-none text-white">Editer</a></td>
                        <td><a href="" class="btn-sm text-decoration-none text-white">Supprimer</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi ullam soluta alias. Delectus alias, voluptatibus perferendis asperiores exercitationem, itaque quo consequatur officia, quae numquam quam voluptatum ab ad obcaecati velit minus accusamus. Voluptates vero ad saepe reiciendis ullam, non temporibus modi officia dolorem earum odit, quia ut dolores dicta officiis.</th>
                        <td class="table-title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quidem in expedita similique voluptatum fuga blanditiis, explicabo consequuntur provident repellendus?</td>
                        <td class="table-title">14/12/2023</td>
                        <td><a href="" class="btn-sm text-decoration-none text-white">Editer</a></td>
                        <td><a href="" class="btn-sm text-decoration-none text-white">Supprimer</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi ullam soluta alias. Delectus alias, voluptatibus perferendis asperiores exercitationem, itaque quo consequatur officia, quae numquam quam voluptatum ab ad obcaecati velit minus accusamus. Voluptates vero ad saepe reiciendis ullam, non temporibus modi officia dolorem earum odit, quia ut dolores dicta officiis.</th>
                        <td class="table-title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus quidem in expedita similique voluptatum fuga blanditiis, explicabo consequuntur provident repellendus?</td>
                        <td class="table-title">14/12/2023</td>
                        <td><a href="" class="btn-sm text-decoration-none text-white">Editer</a></td>
                        <td><a href="" class="btn-sm text-decoration-none text-white">Supprimer</a></td>
                    </tr>
                </tbody>
            </table>
    </div>

    
    
    <?php

include '../partials/footer.php';

?>