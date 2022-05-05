<!doctype html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Airstrike Tracker</title>
</head>
<?php require_once('navbar.php'); ?>
<body>
	<div class="container-fluid">
	<h1 class="display-3">Airstrike Tracker</h1>
<p class="lead">Welcome to the Airstrike Tracker. This project pulls publically-available information regarding dronestrikes in the ongoing conflict in Yemen. This dataset is maintained by the <a href="yemendataproject.org">Yemen Data Project.</a></p>

<p> The data on this site details all airstrikes conducted by the military coalition led by Saudi Arabia and the United Arab Emirates against the Houthis in Yemen. For more information on this conflict, please visit the links below.
</p>

<a href="https://worldwithoutgenocide.org/genocides-and-conflicts/conflict-in-yemen">World Without Genocide: Conflict in Yemen</a> <br>

<a href="https://www.bbc.com/news/world-middle-east-29319423">Yemen: Why is the war there getting more violent?
</a>
<br>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>


<?php

$hn = 'localhost';
$db = 'kkisicki_638';
$un = 'kkisicki_mysql';
$pw = 'QvUqSOaDHepA';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

// Select most recent incident
$query = "SELECT * FROM incident NATURAL JOIN district NATURAL JOIN governate NATURAL JOIN type_to_victim WHERE victimtype_id = 1 ORDER BY incident_date DESC LIMIT 1";

// Get result
$result = $conn->query($query);
if (!$result) die ("Invalid query");

$rows = $result->num_rows;

echo "<div class='container-fluid lead'>";

// Show an error if no rows return (for some reason)
// Otherwise display latest incident information
if ($rows == 0) {
	echo "Error - no rows found";
} else {
	// there should only be one row (limit 1)
	$row = $result->fetch_assoc();
	echo '<h1 class="display-6">Latest Strike</h1>';
	echo "<p> The most recent drone strike in Yemen occurred on: </p>";
	echo "<dl class='row'>";
	echo '<dt class="col-sm-3"> Date </dt> <dd class="col-sm-9">' .$row["incident_date"] .'</dd>';
	echo '<dt class="col-sm-3"> District </dt> <dd class="col-sm-9"> ' .$row["district_name"] .'</dd>';
	echo '<dt class="col-sm-3"> Governate </dt> <dd class="col-sm-9">' .$row["governate_name"] .'</dd>';
	echo '<dt class="col-sm-3"> Total Civilian Casualties </dt> <dd class="col-sm-9">' .$row["total_num_victims"].'</dd>';
	echo "</dl>";
}

echo "</div>";

?>
<p>The Yemen Data Project is an independent data collection project aimed at collecting and disseminating data on the conduct of the war in Yemen, with the purpose of increasing transparency and promoting accountability of the actors involved. In the absence of official military records from any of the parties to the conflict, the Yemen Data Project was founded in 2016 with the overall goal of contributing independent and neutral data to increase transparency over the conduct of the war and to inform humanitarian response, human rights advocacy, media coverage, and policy discussion. Their mission is to collect and disseminate data with transparency and without advocacy for, or alignment to, any political cause, party or policy.</p>

</html>
