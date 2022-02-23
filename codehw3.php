<!DOCTYPE html>.
<html>
<head>
<title>Code HW 3</title>
	<style>
		tr {
 			 font-family: "Monaco", Times, serif;
		}	
		img {
  			width: 100px;
		}

		table, th, td {
  			border: 14px solid;
		}	
	</style>

</head>

<body>
	<h1> Part 1 </h1>
<?php
	$book = array(
		array("PHP and MySQL Web Development", "Welling", "Luke", "144", "Paperback", 31.63 ),
		array("Web Design with HTML, CSS, JavaScript and jQuery", "Duckett", "Jon", "135", "Paperback", 41.23 ),
		array("PHP Cookbook: Solutions & Examples for PHP Programmers", "Sklar", "David", "14", "Paperback", 40.88 ),
		array("JavaScript and JQuery: Interactive Front-End Web Development", "Duckett", "Jon",  "251", "Paperback", 22.09 ),
		array("Modern PHP: New Features and Good Practices", "Lockhart", "Josh",  "7", "Paperback", 28.49 ),
		array("Programming PHP", "Tatroe", "Kevin",  "26", "Paperback", 28.96 ),
	);
?>

<table>
  <tr>
    <th>Title</th>
    <th>Last name</th>
    <th>First name</th>
    <th>Pages</th>
    <th>Type</th>
    <th>Cost</th>
  </tr>
<?php
for ($x = 0; $x <= 5; $x++) { 
  echo "<tr>";
  	for ($y = 0; $y <= 5; $y++) { 
  		echo "<td>" . $book[$x][$y] . "</td>";
  	}
  echo "</tr>";
}
?>
</table>

<?php 
echo "Your total price is: $";
echo $book[0][5]+$book[1][5]+$book[2][5]+$book[3][5]+$book[4][5]+$book[5][5];
?>

<h1> Part 2 </h1>

<?php

function newcointoss($count) {

$heads_image = "<img src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8TCuW7PYOxp8WBbbwyz9kgJGtN0Kmma4DFQ&usqp=CAU'>";
$tails_image = "<img src = 'https://media.istockphoto.com/photos/reverse-of-the-george-washington-1998-silver-quarter-dollar-picture-id174877534'>";

//
// set my heads counter to 0
$heads_so_far = 0;
// flip coin once & record value as "past_flip"
$past_flip = mt_rand(0,1);
if ($past_flip == "0"){
		// print heads 
		echo $heads_image ;
		// increment heads counter
		$heads_so_far++;
	} else {
		// print tails
		echo $tails_image ;
	}	
$continue = true;
$flips = 1;

while ($continue)
{
// flip coin once
	 $flips++; 
	 $current_flip = mt_rand(0,1);
	 if ($current_flip == "0"){
		// print heads, increment heads counter
		$heads_so_far++;
		echo $heads_image ;
	} else {
		// print tails
		$heads_so_far = 0;
		echo $tails_image ;
	}	
// compare value to past_flip
	if ($past_flip == 0 and $current_flip == 0) {
		if ($heads_so_far == $count) {
			// exit loop
			$continue = false;
		} 
	} else { 
		// else, set past_flip to our current value 
		$past_flip = $current_flip;
		// set heads_so_far to 0 to reset
	}
}
echo "<br> To get $count heads in a row, it took $flips flips. ";
}

newcointoss(5);

?>
</body>
</html>