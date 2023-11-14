<?php

session_start();

$itemID = $_SESSION['itemID'];
$userID = $_SESSION['userid'];


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


if (isset($_POST['like'])) {
    $data = $_POST['like'];
    echo "post request like data is: " . $data . "<br>";

    if ($data == 1){

        $sql = "INSERT INTO `product_like`(`userid`, `productid`) VALUES ($userID,$itemID);";
        echo "handle_data.php: " . $sql . "<br>";
    
    }else{

        $sql = "DELETE FROM `product_like` WHERE userid = $userID AND productid = $itemID;";
        echo "handle _data.php: " . $sql . "<br>";
    }
}


//query the data
if ($conn->query($sql) === TRUE) {
    echo "query successfully upload to mysql database<br>";
}else{
    echo "Error: " . $conn->error;
}

$conn->close();


?>