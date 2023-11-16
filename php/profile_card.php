<?php 
    $user = $_SESSION['user'];
    $userid = $_SESSION['userid'];
    $user_photo = $_SESSION['pp'];

    echo "
        <p>Welcome back $user</p>
        <img src='$user_photo' alt='Where are you beauty' width='100' height='100'>
    ";



?>