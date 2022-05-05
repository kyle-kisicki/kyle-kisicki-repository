<!doctype html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Airstrike Tracker</title>
</head>
<?php require_once('navbar.php'); ?>
<body>
		<div class="container-fluid">
	<h1 class="display-6">Casualties To Date</h1>
<p class="lead">Here, we present the total sum of casualties available from the civil war in Yemen due to aerial strikes. Due to our incomplete dataset, these numbers may not include all victims. </p>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</div>

</body>


<?php

$hn = 'localhost';
$db = 'kkisicki_638';
$un = 'kkisicki_mysql';
$pw = 'QvUqSOaDHepA';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

// Select most recent incident
$query = "SELECT SUM(total_num_victims) as total_victims, SUM(injuries_total) as injuries_total, SUM(fatalities_total) as fatalities_total, victimtype_name FROM type_to_victim NATURAL JOIN victim_type GROUP BY victimtype_id";

// Get result
$result = $conn->query($query);
if (!$result) die ("Invalid query");

$rows = $result->num_rows;

echo "<div class='container-fluid'>";

// Show an error if no rows return (for some reason)
// Otherwise display casualty info
if ($rows == 0) {
	echo "Error - no rows found";
} else {
	echo "<table class='table'> <tr> <th>Victim Classification</th> <th>Victims</th> <th>Injuries</th> <th>Fatalities</th> </tr> ";
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo '<td>' .$row["victimtype_name"].'</td>' ;
		echo '<td>' .$row["total_victims"].'</td>' ;
		echo '<td>' .$row["injuries_total"].'</td>' ;
		echo '<td>' .$row["fatalities_total"].'</td>' ;
		echo "</tr>";
	}
	echo "</table>";
}
echo "</div>";


?>

</html>