<?php 


    function show_product($sellerornot){

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

        $userid = $_SESSION['userid'];
        
        if ($sellerornot == 0){
            if ($find_value){
                $sql = "SELECT * FROM product WHERE Pname LIKE '%$Pname%';"; 
            }else{
                $sql = "SELECT * FROM product;";
            }
        }else{
            if ($find_value){
                $sql = "SELECT * FROM product WHERE Pname LIKE '%$Pname%';"; 
            }else{
                $sql = "SELECT * FROM `product` WHERE Sellerid = $userid;";
            }
        }
        
        $result = $conn->query($sql);

        if($result = $conn->query($sql)){
            while($obj = $result->fetch_object()){
                $Pname = $obj->Pname;
                $Pimage = $obj->Pimage;
                $Pdescription = $obj->Pdescription;
                $Pid = $obj->id;
                if ($sellerornot == 0){
                    echo "<li>
                            <a href=/html/item.html/$Pid>
                            <p>$Pname</p>
                            <img src='$Pimage' alt='error' width='150' height='120'>
                            <h4>$Pdescription</h4>
                            </a>
                        </li>";
                }elseif ($sellerornot == 1){
                    echo "<li>
                            <a href=/html/item_seller.html/$Pid>
                            <p>$Pname</p>
                            <img src='$Pimage' alt='error' width='150' height='120'>
                            <h4>$Pdescription</h4>
                            </a>
                        </li>";    

                }

            }
        }   

        $conn->close();

    }

?>