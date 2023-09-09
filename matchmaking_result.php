<?php include "db.php" ?>
<html>
<head>
    <title>Matchmaking Result</title>
</head>
<body>

<h1>Matchmaking Result</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $traineeTags = $_POST["trainee_tags"];

    // Query for trainers with matching tags
    $trainerQuery = "SELECT * FROM trainer WHERE FIND_IN_SET('$traineeTags', tags) > 0";
    $trainerResult = mysqli_query($connection, $trainerQuery);

    if (mysqli_num_rows($trainerResult) > 0) {
        echo "<h2>Matching Trainers:</h2>";
        while ($trainerRow = mysqli_fetch_assoc($trainerResult)) {
            echo "Trainer: " . $trainerRow['trainer_fname'] . " " . $trainerRow['trainer_lname'] . "<br>";
			echo "<form action='sendRequest.php' method='post'>";
            echo "<input type='hidden' name='trainer_id' value='" . $trainerRow['trainer_id'] . "'>";
            echo "<button type='submit'>Send Request</button>";
            echo "</form>";
        }
    } else {
        echo "<p>No matching trainers found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>

<p><a href="matchmaking.php">Back to Matchmaking</a></p>

</body>
</html>
