<?php

if (isset($_POST['productNo'])) {
  $productNo = $_POST['productNo'];


  // #### this is respond to the front end for telling what we have received !!! ##
  // echo  "the product number is: " . $data;

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

//check if the item is in the local area
$sql = "SELECT * FROM product WHERE id LIKE '$productNo';"; 

if($result = $conn->query($sql)){
  while($obj = $result->fetch_object()){
      $Pname = $obj->Pname;
      $Pimage = $obj->Pimage;
      $Pdescription = $obj->Pdescription;
      $Pid = $obj->id;
    }
  }
  
  $target_file = dirname(__DIR__) . $Pimage;

  //Check if file already exists
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
  }

}
?>