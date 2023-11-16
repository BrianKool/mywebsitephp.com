<?php 

    session_start();

    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $itemID = end($link_array);

    $_SESSION['itemID'] = $itemID;

    $userid = $_SESSION['userid'];

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

    //get the likeornot state from mysql 
    $sqllike = "SELECT userid FROM `product_like` WHERE productid = $itemID;";
    $resultlike = $conn->query($sqllike);
    //if no data matched then response to frontend an unlike image
    if ($resultlike->num_rows == 0){
        echo "<br>userid: ". $userid . " has not liked productid: " . $itemID . "   yet.<br>";
        echo "<button id='likeButton' name='notLiked'>not</button>";
    }else{
        echo "<br>userid: ". $userid . " has liked productid: " . $itemID . ".<br>";
        echo "<button id='likeButton' name='liked'>like</button>";
    }

    echo "<div id='demo'>demo</div>";


    $sql = "SELECT * FROM `product` WHERE id = $itemID;";
    $result = $conn->query($sql);

    if($result = $conn->query($sql)){
        while($obj = $result->fetch_object()){
            $Pname = $obj->Pname;
            $Pimage = $obj->Pimage;
            $Pdescription = $obj->Pdescription;
            echo "<p>$Pname</p>
                    <img src='$Pimage' alt='error' width='150' height='120'>
                    <h4>$Pdescription</h4>";

        }
    }   

    $conn->close();


?>