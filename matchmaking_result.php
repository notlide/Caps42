<?php
include "db.php";
?>
<html>
<head>
    <title>Matchmaking Result</title>
</head>
<body>

<h1>Matchmaking Result</h1>

<?php
    if(isset($_GET['trainee_id'])){
        $t_id = $_GET['trainee_id'];  
    }
    $traineeTagsQuery = "SELECT tags FROM trainee WHERE trainee_id = $t_id";
    $traineeTagsResult = mysqli_query($connection, $traineeTagsQuery);

    if ($traineeTagsRow = mysqli_fetch_assoc($traineeTagsResult)) {
        $traineeTags = $traineeTagsRow['tags'];

        $trainerQuery = "SELECT * FROM trainer WHERE FIND_IN_SET('$traineeTags', tags) > 0";
        $trainerResult = mysqli_query($connection, $trainerQuery);

        if (mysqli_num_rows($trainerResult) > 0) {
            echo "<h2>Matching Trainers:</h2>";
            while ($trainerRow = mysqli_fetch_assoc($trainerResult)) {
                $trainer_id = $trainerRow['trainer_id'];
                echo "Trainer: " . $trainerRow['trainer_fname'] . " " . $trainerRow['trainer_lname'] . "<br>";
                echo "<form action='sendRequest.php' method='post'>";
                
                echo "<input type='hidden' name='trainee_id' value='".$t_id."'>";
                echo "<input type='hidden' name='trainer_id' value='" . $trainer_id. "'>";
                echo "<button type='submit' name='sendRequest' >Send Request</button>";
                echo "</form>";
            }
        } else {
            echo "<p>No matching trainers found.</p>";
        }
    } else {
        echo "<p>No tags found for the trainee.</p>";
    }

?>

<p><a href="matchmaking.php">Back to Matchmaking</a></p>

</body>
</html>
