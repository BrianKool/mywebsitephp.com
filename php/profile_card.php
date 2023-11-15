<?php 
session_start();
    $user = $_SESSION['user'];
    $userid = $_SESSION['userid'];
    $user_photo = $_SESSION['pp'];

    echo "
        <p>$user</p>
        <img src='/$user_photo' alt='error' width='100' height='100'>
    ";



?>