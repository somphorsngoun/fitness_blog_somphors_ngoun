<?php
    include_once('../database/database.php');
    $error = "";
    if (isset($_FILES["file"])){
            $fileName = $_FILES["file"]["name"];
            $fileSize = $_FILES["file"]["type"];
            $fileType = $_FILES["file"]["size"];
            $tmp_name = $_FILES["file"]["tmp_name"];
            
            $dir = "../images/";
            move_uploaded_file($tmp_name, $dir.$fileName);
            $password_permission = '/^[a-zA-Z0-9\w !@#$%^&*()]{6,100}+$/';
            if((empty(trim($_POST["username"])) && empty(trim($_POST['password']))) || empty(trim($_POST["username"])) || empty(trim($_POST['password']))){
                $error = "Please complete all fill";
            }elseif (preg_match($password_permission, $_POST['password'])){
                $true = checkName($_POST['username']);
                if ($true === "true"){
                    registerUser($_POST, $fileName);
                }else{
                    $error = "Sorry...Username already taken";
                }
            }else{
                $error = "Your password should have lowercase and uppercase charater, number and symbol";
            }
            
        
    }
?>