<!doctype html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Airstrike Tracker</title>
</head>
<?php require_once('navbar.php'); ?>
<body>
		<div class="container-fluid">

	<h1 class="display-6">Incidents by Location</h1>
<p class="lead"> This page contains a list of the locations most heavily attacked by airstrikes. Each of the districts is displayed in descending order, from most airstrikes to least. For a list of districts by governate in Yemen, please visit <a href="https://en.wikipedia.org/wiki/List_of_districts_of_Yemen">this page.</a></p>


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

// QUERY select the number of incidents for each location in descending order
$query = "SELECT COUNT(*) as num_incidents, district_name FROM incident NATURAL JOIN district GROUP BY district_id ORDER BY num_incidents DESC";


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
	echo "<table class='table'> <tr> <th>District</th> <th>Incidents</th> </tr> ";
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo '<td>' .$row["district_name"].'</td>' ;
		echo '<td>' .$row["num_incidents"].'</td>' ;
		echo "</tr>";
	
	}
	echo "</table>";
}

echo "</div>";


?>

</html>