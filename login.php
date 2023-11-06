<?php 
    $servername = "localhost";
    $username = "brian";
    $password = "4587476";
    $databsae = "brian";

    //create connection 
    $conn = new mysqli($servername, $username, $password, $databsae);

    //check connection
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    echo "Connected Successfully and the login result is below" . "<br>";

    $email = $_GET["email"];
    $ps = $_GET["ps"];

    $sql = "SELECT * FROM myuser WHERE email = '$email'";
    $result = $conn->query($sql);


    //-------------------------------------//
    //use var_dump to dump the object//
    // var_dump($result);
    // echo "<br>";

    ///object method to fetch object///
    //----- this method return object 


    if($result = $conn->query($sql)){
        while($obj = $result->fetch_object()){
            $sqlps = $obj->password;
            if ($sqlps == $ps){
                session_start();
                $_SESSION['message'] = $obj->firstname;
                header('Location: product.html');
            }else{
                echo "Please Log In First";
                echo "<script>setTimeout(\"location.href = './signup.html';\",1500);</script>";
            }
        }
    }
        

    ///row method to fetch object///
    //----- this method return array 

    // if ($result->num_rows > 0){
    //     while($row = $result->fetch_assoc()){
    //             echo "rowpassword: " .  $row["password"];
    //         }
    // }
        
    
    $conn->close();




?>