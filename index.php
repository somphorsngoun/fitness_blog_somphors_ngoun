<?php
    include_once('partial/header.php'); 
    include_once('partial/navbar.php'); 
    // include_once('css/style.css'); 

    if (isset($_GET['page'])){
        if ($_GET['page'] == 'training'){
            include_once('pages/training.php');
        }elseif ($_GET['page'] == 'create'){
            include_once('model/create.php');
        }elseif ($_GET['page'] == 'nurition'){
            include_once('pages/nurition.php');
        }elseif ($_GET['page'] == 'health'){
            include_once('pages/health.php');
        }elseif ($_GET['page'] == 'lifestyle'){
            include_once('pages/lifestyle.php');
        }elseif ($_GET['page'] == 'equipment'){
            include_once('pages/equipment.php');
        }elseif ($_GET['page'] == 'search'){
            include_once('process/search.php');
        }elseif ($_GET['page'] == 'home'){
            include_once('pages/home.php');
        }else{
            include_once('pages/404.php');
        }
    }else {
        // SESSION_START();
        // $_SESSION['user'] = '';
        // $_SESSION['passWD'] = '';
        // $_SESSION['profile'] = '';
        // $_SESSION['role'] = '';
        header("Location: index.php?page=home");
        // include_once('pages/home.php');
    }

    include_once('partial/footer_link.php');
    include_once('partial/footer.php');
