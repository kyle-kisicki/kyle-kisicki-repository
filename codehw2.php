<html>
<head>

	<style>
		img {
  			width: 100px;
		}
	</style>
</head>

<body>
	<h1> Part 1 </h1>
<?php
function validate($isbn) {
echo "Checking ISBN: $isbn <br>" ;
	$sum = 0;
	$sum = $sum + (((int) substr($isbn, 0, 1)) * 10);
	$sum = $sum + (((int) substr($isbn, 1, 1)) * 9);
	$sum = $sum + (((int) substr($isbn, 2, 1)) * 8);
	$sum = $sum + (((int) substr($isbn, 3, 1)) * 7);
	$sum = $sum + (((int) substr($isbn, 4, 1)) * 6);
	$sum = $sum + (((int) substr($isbn, 5, 1)) * 5);
	$sum = $sum + (((int) substr($isbn, 6, 1)) * 4);
	$sum = $sum + (((int) substr($isbn, 7, 1)) * 3);
	$sum = $sum + (((int) substr($isbn, 8, 1)) * 2);

	if (substr($isbn, 9, 1) == "X") {
	  $sum = $sum + 10;
	} else {
		$sum = $sum + (((int) substr($isbn, 9, 1)));
	}

	if ($sum % 11 == 0) {
	  echo "This ISBN is valid";
	} else {
		echo "This ISBN is invalid";
	}
}
validate("0716703440");
?>

<h1> Part 2 # 1</h1>
<?php

function cointoss($num) {
	for ($x = 1; $x <= $num; $x++) {
  	if (mt_rand(0,1) == "0"){
		// print heads 
		echo "<img src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8TCuW7PYOxp8WBbbwyz9kgJGtN0Kmma4DFQ&usqp=CAU'>" ;
	} else {
		// print tails
		echo "<img src = 'https://media.istockphoto.com/photos/reverse-of-the-george-washington-1998-silver-quarter-dollar-picture-id174877534'>" ;
	}	
}
	
}

echo "<br> Flipping a coin 1 time <br>";
cointoss(1);
echo "<br> Flipping a coin 3 times <br>" ;
cointoss(3);
echo "<br> Flipping a coin 5 times <br>" ;	
cointoss(5);
echo "<br> Flipping a coin 7 times <br>";
cointoss(7);
echo "<br> Flipping a coin 9 times <br>" ;	
cointoss(9);
	
?>

<h1> Part 2 # 2</h1>

<?php

// flip coin once & record value as "past_flip"
$past_flip = mt_rand(0,1);
if ($past_flip == "0"){
		// print heads 
		echo "<img src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8TCuW7PYOxp8WBbbwyz9kgJGtN0Kmma4DFQ&usqp=CAU'>" ;
	} else {
		// print tails
		echo "<img src = 'https://media.istockphoto.com/photos/reverse-of-the-george-washington-1998-silver-quarter-dollar-picture-id174877534'>" ;
	}	
$continue = true;
$flips = 1;
while ($continue)
{
// flip coin once
	 $flips++; 
	 $current_flip = mt_rand(0,1);
	 if ($current_flip == "0"){
		// print heads 
		echo "<img src = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8TCuW7PYOxp8WBbbwyz9kgJGtN0Kmma4DFQ&usqp=CAU'>" ;
	} else {
		// print tails
		echo "<img src = 'https://media.istockphoto.com/photos/reverse-of-the-george-washington-1998-silver-quarter-dollar-picture-id174877534'>" ;
	}	
// compare value to past_flip
	if ($past_flip == 0 and $current_flip == 0) {
// if both are heads, continue = false
		$continue = false;
// else, set past_flip to our current value 
} else { 
	$past_flip = $current_flip;
}
}
echo "<br> It took $flips flips. ";

?>
</body>
</html>
