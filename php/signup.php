<?php 

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

    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
    $email = $_GET["email"];
    $ps = $_GET["ps"];


    if (preg_match("/.+@.+\.com/", $email) && strlen($ps) > 5 && preg_match("/\d+/",$ps)){
      echo "your email is: " . $email . " and the password is: " . $ps . " .<br>";  
      $sql = "INSERT INTO myuser (firstname, lastname, email, password) VALUES ('$fname', '$lname', '$email', '$ps')";
    }else{
        echo "you need to have different email address or stronger password";
    }
    
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['message'] = $fname;
        echo "Thank you to join use, then now start to explore!";
        echo "<script>setTimeout(\"location.href = '/html/product.html';\",1500);</script>";
    }else{
        echo "Error: " . $conn->error;
    }

    $conn->close();

    // if ($sqlps != $ps){
    //     echo "please insert the right password!";
    // }else{
    //     echo "welcome back"
    // }
    
?> 