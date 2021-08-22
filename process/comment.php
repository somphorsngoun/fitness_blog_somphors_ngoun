<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        newComment($_POST, $_GET['id']);
    }
?>