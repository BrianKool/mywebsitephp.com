<?php 


    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $itemID = end($link_array);

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

    $sql = "SELECT * FROM `product` WHERE id = $itemID;";
    $result = $conn->query($sql);

    if($result = $conn->query($sql)){
        while($obj = $result->fetch_object()){
            $Pname = $obj->Pname;
            $Pimage = $obj->Pimage;
            $Pdescription = $obj->Pdescription;
            echo "<p>$Pname</p>
                    <img src='../$Pimage' alt='error' width='150' height='120'>
                    <h4>$Pdescription</h4>";

        }
    }   

    $conn->close();


?>