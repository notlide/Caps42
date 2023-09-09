<?php include "db.php" ?>
<html>
<head>
    <title>Matchmaking</title>
</head>
<body>

<h1>Matchmaking</h1>


<?php
/* $query = "SELECT tags FROM trainee";
$showQuery = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($showQuery)){
	$traineeTags1 = $row['tags'];
	
} */
$traineeTags = "boxing";
?>

<h2>Your Tags: <?php echo $traineeTags; ?></h2>

<!-- Add a form to initiate matchmaking -->
<form action="matchmaking_result.php" method="post">
    <input type="hidden" name="trainee_tags" value="<?php echo $traineeTags; ?>">
    <button type="submit">Find Trainer</button>
</form>
<p><a href="traineeMatch.php">Back to Trainee Dashboard</a></p>
</body>
</html>
