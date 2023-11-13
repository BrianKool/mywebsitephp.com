<?php 

    session_start();
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

    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);

    $user = $_SESSION["user"];
    


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $state = $_POST['state'];


        if ($state){
            $itemID = end($link_array);
        }else {
            $itemID = 40;
        }
    
        $sql = "UPDATE 'myuser' SET 'like_product_id' = $itemID WHERE firstname = $user;";
            $result = $conn->query($sql);


        if ($conn->query($sql) === TRUE) {
            echo "success!";
            // echo "<script>setTimeout(\"location.href = './product.html';\",1500);</script>";
        }else{
            echo "Error: " . $conn->error;
        }
        

    }


    $conn->close();


?>