<?php


  function update_file($productNo, $name, $description){

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

    
    //update the product information
    if($name != "" && $description != ""){
        $sql = "UPDATE `product` SET `Pdescription`= '$description',`Pname`= '$name' WHere id = $productNo;";
    }elseif ($name == "" && $description != ""){
        $sql = "UPDATE `product` SET `Pdescription`= '$description' WHere id = $productNo;";
    }elseif ($name != "" && $description == ""){
        $sql = "UPDATE `product` SET `Pname`= '$name' WHere id = $productNo;";
    }

    echo "update _upload.php: " . $sql . "<br>";

    //query the data
    if ($conn->query($sql) === TRUE) {
    echo "item " . $productNo . "successfully update the information to mysql database<br>";
    }else{
    echo "Error: " . $conn->error;
    }

    $conn->close();

    }
?>