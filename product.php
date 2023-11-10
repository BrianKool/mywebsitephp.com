<?php 
    include 'find.php';
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

    ///object method to fetch object///
    //----- this method return object 
        
    $find_value = FALSE;

    if (!empty ($_SESSION['product'])){
        $Pname = $_SESSION['product'];
        unset($_SESSION['product']);
        $find_value = TRUE;
    }

    if ($find_value){
       $sql = "SELECT * FROM product WHERE Pname LIKE '%$Pname%';"; 
    }else{
        $sql = "SELECT * FROM product;";
    }
    
    $result = $conn->query($sql);

    if($result = $conn->query($sql)){
        while($obj = $result->fetch_object()){
            $Pname = $obj->Pname;
            $Pimage = $obj->Pimage;
            $Pdescription = $obj->Pdescription;
            echo "<li>
                    <p>$Pname</p>
                    <img src=$Pimage alt='error' width='150' height='120'>
                    <h4>$Pdescription</h4>
                </li>";

        }
    }   

    $conn->close();




?>