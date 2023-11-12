<?php 
    session_destroy();
    header("Location: ./index.html", true, 301);
?>