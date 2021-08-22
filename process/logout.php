<?php

    SESSION_START();
    $_SESSION['user'] = '';
    $_SESSION['passWD'] = '';
    $_SESSION['profile'] = '';
    $_SESSION['role'] = '';

    // echo $_SESSION['user'] . "sdlklk";
    header("Location: ../index.php");