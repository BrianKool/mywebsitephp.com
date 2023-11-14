<?php

//check the http request method
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //can also use $_POST for html form post method

    $Pname = $_REQUEST["Pname"];

    if ($Pname){
        session_start();
        $_SESSION['product'] = $Pname;
        header('Location: product.html');
    }else{
        echo "The item your are searching for is not here!";
        echo "<script>setTimeout(\"location.href = '/html/product.html';\",1500);</script>";
    }

}



?>