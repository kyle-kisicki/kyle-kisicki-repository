<!doctype html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Airstrike Tracker</title>
</head>
<?php require_once('navbar.php'); ?>
<body>
		<div class="container-fluid">

	<h1 class="display-6">Full Report</h1>
<p class="lead"> This page displays a tracker of each airstrike incident reported by the <a href="yemendataproject.org">Yemen Data Project.</a> </p>

<p>The Yemen Data Project is an independent data collection project aimed at collecting and disseminating data on the conduct of the war in Yemen, with the purpose of increasing transparency and promoting accountability of the actors involved. In the absence of official military records from any of the parties to the conflict, the Yemen Data Project was founded in 2016 with the overall goal of contributing independent and neutral data to increase transparency over the conduct of the war and to inform humanitarian response, human rights advocacy, media coverage, and policy discussion. Our mission is to collect and disseminate data with transparency and without advocacy for, or alignment to, any political cause, party or policy.</p>


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

// QUERY select the the following information using joinz
$query = "SELECT incident_date, district_name, governate_name, targetcategory_name, targetsubcategory_name FROM incident NATURAL JOIN district NATURAL JOIN governate NATURAL JOIN target_category NATURAL JOIN target_subcategory";


// Get result
$result = $conn->query($query);
if (!$result) die ("Invalid query");

$rows = $result->num_rows;

echo "<div class='container-fluid'>";

// Show an error if no rows return (for some reason)

if ($rows == 0) {
	echo "Error - no rows found";
} else {
	echo "<table class='table'> <tr> <th>Date</th> <th>District</th> <th>Governate</th> <th>Category</th> <th>Subcategory</th> </tr> ";
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" .$row["incident_date"]. "</td>";
		echo "<td>" .$row["district_name"]. "</td>";
		echo "<td>" .$row["governate_name"]. "</td>";
		echo "<td>" .$row["targetcategory_name"]. "</td>";
		echo "<td>" .$row["targetsubcategory_name"]. "</td>";
		echo "</tr>";
	}
	echo "</table>";
}

echo "</div>";


?>

</html>