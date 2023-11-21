<?php 
  include "php/delete_upload.php";
  include "php/update_upload.php";


  if (isset($_POST['action']) && isset($_POST['productNo'])){ 

    $productNo = $_POST['productNo'];

    if ($_POST['action'] == "delete"){

      delete_file($productNo);
      echo "the action delete has been done";

    }elseif ($_POST['action'] == "update"){

      $name = $_POST['name'];
      $description = $_POST['description'];

      update_file($productNo, $name, $description);
      echo "the action update has been done";


    }
  }else{
    echo "Error action please try again later!!";
  }
?>