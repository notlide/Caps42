<?php
include "db.php";

    if(isset($_POST['sendRequest'])){
        $t_id = $_POST['trainee_id'];
        $trainer_id = $_POST['trainer_id'];

        $requestDate = date("Y-m-d H:i:s"); 
            
        $insertQuery = "INSERT INTO requests (trainee_id, trainer_id, request_date) VALUES ('$t_id', '$trainer_id', '$requestDate')";
        if (mysqli_query($connection, $insertQuery)) {
            echo "Request sent successfully.";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }else {
        echo "Somethings wrong";
    }
    


?>
