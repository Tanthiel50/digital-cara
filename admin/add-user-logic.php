<?php
    
    require 'config/database.php';

    //signup form data if submit button clicked
    if(isset($_POST['submit'])){
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
        $avatar = $_FILES['avatar'];
        
        //validate input values
        if(!$firstname){
            $_SESSION['add-user'] = 'Veuillez entrer un prénom';
        }elseif (!$lastname){
            $_SESSION['add-user'] = 'Veuillez entrer un nom';
        }elseif (!$username){
            $_SESSION['add-user'] = 'Veuillez entrer un pseudo';
        }elseif (!$email){
            $_SESSION['add-user'] = 'Veuillez entrer un email valide';
        }elseif (strlen($createpassword) < 8 || strlen ($confirmpassword) < 8){
            $_SESSION['add-user'] = 'Le password doit avoir 8 caractères ou plus';
        }elseif (!$avatar['name']){
            $_SESSION['add-user'] = 'Ajoutez un avatar';
        }else{
            // check if password matches
            if($createpassword !== $confirmpassword){
                $_SESSION['add-user'] = 'Les passwords ne correspondent pas';
            }else{
                //hash password
                $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

                //check if username or email already exist in DB
                $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
                $user_check_result = mysqli_query($connection, $user_check_query);
                if(mysqli_num_rows($user_check_result) >0){
                    $_SESSION['add-user'] = "Le pseudo ou l'email existent déjà";
                }else{
                    //Avatar
                    //rename avatar
                    $time = time(); //make each image a unique name
                    $avatar_name = $time . $avatar['name'];
                    $avatar_tmp_name = $avatar['tmp_name'];
                    $avatar_destination_path = '../images/avatar/' . $avatar_name;
                    
                    //make sure file is image
                    $allowed_files = ['png','jpg','jpeg'];
                    $extention = explode('.', $avatar_name);
                    $extention = end($extention);
                    if(in_array($extention, $allowed_files)){
                        //make sure image is not too big(1mb)
                        if($avatar['size'] < 1000000 ){
                            //upload
                            move_uploaded_file($avatar_tmp_name, $avatar_destination_path);

                        } else{
                            $_SESSION['add-user'] = 'Le fichier est trop gros ';
                        }
                    } else {
                        $_SESSION['add-user'] = 'Le fichier doit etre jpeg, jpg ou png';
                    }
                }
            }
        }

        // redirect back to signup if problem
        if(isset($_SESSION['add-user'])){
            //pass form data back to signup page
            $_SESSION['add-user-data'] = $_POST;
            header('location: ' . ROOT_URL . 'admin/add-user.php');
            die();
        }else{
            //insert new user to DB
            $insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=$is_admin";
            $insert_user_result = mysqli_query($connection, $insert_user_query);

            if (!mysqli_errno($connection)) {
                //redirect to login page with success
                $_SESSION['add-user-success'] = "Nouvel utilisateur $firstname $lastname ajouté.";
                header('location: ' . ROOT_URL . 'admin/manage-users.php');
                die();
            }
        }
        
    }else{
        //if button wasn't clicked then redirect
        header('location:' . ROOT_URL . 'admin/add-user.php');
        die();
    }