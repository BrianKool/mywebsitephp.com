<?php 

    //check the http request method
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        //can also use $_POST for html form post method
        $email = $_REQUEST["email"];
        $ps = $_REQUEST["ps"];

            // Validate e-mail
        if (!filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL) === false) {
            echo("$email is a valid email address");
        } else {
            echo "<script>setTimeout(\"location.href = './index.html';\",1500);</script>";
            die ("The email or password is wrong!");
        }

    }

    
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
    echo "Connected Successfully and the login result is below" . "<br>";


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
                $_SESSION['user'] = $obj->firstname;
                $_SESSION['userid'] = $obj->userid;
                header('Location: product.html');
            }else{
                echo "The email or password is wrong!";
                echo "<script>setTimeout(\"location.href = './index.html';\",1500);</script>";
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