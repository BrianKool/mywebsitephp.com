<?php 
    include "php/delete_upload.php";

    if (isset($_POST['action']) and $_POST['action'] == "delete"){
        $productNo = $_POST['productNo'];
        delete_file($productNo);
      }

?>