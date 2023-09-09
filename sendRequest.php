<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the trainer ID is provided in the request
    if (isset($_POST["trainer_id"])) {
        $trainerId = $_POST["trainer_id"];
        
        // Retrieve the trainee ID from the database (assuming you have a trainee's table)
        $traineeIdQuery = "SELECT trainee_id FROM trainee LIMIT 1"; // Modify this query as needed
        $traineeIdResult = mysqli_query($connection, $traineeIdQuery);

        if ($traineeIdResult && mysqli_num_rows($traineeIdResult) > 0) {
            $traineeRow = mysqli_fetch_assoc($traineeIdResult);
            $traineeId = $traineeRow["trainee_id"];

            // Now, you can insert the request into your database (adjust the query and database table names accordingly)
            // For example, you might have a table named "requests" with columns like "trainee_id", "trainer_id", "request_date", etc.
            // Ensure that you have a proper database connection established.

            // Example query to insert a request
            $requestDate = date("Y-m-d H:i:s"); // Get the current date and time
            $insertQuery = "INSERT INTO requests (trainee_id, trainer_id, request_date) VALUES ('$traineeId', '$trainerId', '$requestDate')";
            
            // Execute the query
            if (mysqli_query($connection, $insertQuery)) {
                echo "Request sent successfully.";
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "Trainee ID not found in the database.";
        }
    } else {
        echo "Trainer ID not provided.";
    }
} else {
    echo "Invalid request.";
}
?>
