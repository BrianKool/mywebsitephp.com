<?php


  function delete_file($productNo){

    include 'credential.php';
    $servername = "localhost";
    $username = $GLOBALS["username"];
    $password = $GLOBALS["password"];
    $databsae = "brian";

    //create connection 
    $conn = new mysqli($servername, $username, $password, $databsae);

    //check connection
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "Connected Successfully" . "<br>";

    //check the item information from sql database
    $sql = "SELECT Pimage FROM product WHERE id LIKE '$productNo';"; 

    $result = $conn->query($sql);
    $obj = $result->fetch_object();
    $Pimage = $obj -> Pimage;

      
    $target_file = dirname(__DIR__) . $Pimage;


    //Check if file exists
    if (file_exists($target_file)) {
      unlink($target_file);
      echo "The file has been deleted from local drive!!";

      $sql = "DELETE FROM `product` WHERE id = $productNo;";
      echo "delete _upload.php: " . $sql . "<br>";

      //query the data
      if ($conn->query($sql) === TRUE) {
        echo "item " . $productNo . "successfully delete from mysql database<br>";
      }else{
        echo "Error: " . $conn->error;
      }

    }else{
      echo "The file you are trying to delete is not here!!";
    }

    $conn->close();
  }

?>