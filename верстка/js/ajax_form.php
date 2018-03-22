<?php

if (isset($_POST["name"]) && isset($_POST["phonenumber"]) ) { 


    $result = array(
    	'name' => $_POST["name"],
    	'phonenumber' => $_POST["phonenumber"]
    ); 

    echo json_encode($result); 
}

?>