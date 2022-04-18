<?php

try {
   
    $conn = new PDO("sqlite:".__DIR__."/myBills.sqlite");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch (Exception $e){

    echo "Unable to connect";
    echo $e->getMessage();
    exit;
}


?>
