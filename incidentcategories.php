<!doctype html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 

<title>Airstrike Tracker</title>
</head>
<?php require_once('navbar.php'); ?>
<body>
		<div class="container-fluid">

	<h1 class="display-6">Incidents by Category</h1>
<p class="lead">Below we have broken down the total number of airstrikes by their target category (military, non-military, or unknown) as well as a more-specific subcategory. </p>

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

// QUERY select the number of incidents for each category
$query = "SELECT COUNT(*) as incident_count, targetsubcategory_name, targetcategory_name FROM incident NATURAL JOIN target_subcategory NATURAL JOIN target_category GROUP BY targetsubcategory_id";

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
	echo "<table class='table'> <tr> <th>Subcategory</th> <th>Category</th> <th>Incidents</th> </tr> ";
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo '<td>' .$row["targetsubcategory_name"].'</td>' ;
		echo '<td>' .$row["targetcategory_name"].'</td>' ;
		echo '<td>' .$row["incident_count"].'</td>' ;
		echo "</tr>";
	}
	echo "</table>";
}

echo "</div>";


?>

</html>
