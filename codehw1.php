<!DOCTYPE html>
<html>
	<H1>
	Challenge 1: Correct Change
	</h1>
<body>
  
<?php

function money($cents)
{
echo "You are due back $cents cents in total." ;
echo "<br>";


$dollars = 0; 
while ($cents > 100)
	{
		$cents = $cents - 100;
		$dollars += 1; 
	}
$quarters = 0;
while ($cents > 25)
	{
		$cents = $cents - 25;
		$quarters += 1; 
}
$dimes = 0;
while ($cents > 10)
	{
		$cents = $cents - 10;
		$dimes += 1; 
	}
$nickels = 0;
while ($cents > 5) 
	{
		$cents = $cents - 5;
		$nickels += 1;
	}


echo "You are due "."$dollars dollar(s), "."$quarters quarter(s), "."$nickels nickel(s), "."and $cents cent(s)";
	// code...
}

money(356);
?>

	<h1> 
		Challenge 2: 99 Bottles of Beer 
	</h1>
<?php

function song($bottles)
{
if ($bottles > 1) {	
while ($bottles > 2) {
	$bottlesminusone = $bottles-1;
echo "$bottles bottles of beer on the wall, $bottles bottles of beer! Take one down and pass it around, $bottlesminusone bottles of beer on the wall... <br>";
$bottles = $bottles-1;
}

echo "2 bottles of beer on the wall, 2 bottles of beer! Take one down and pass it around, now there's just 1 lil bottle of beer on the wall... <br>";
}
echo "1 lil bottle of beer on the wall, 1 lil bottle of beer! Take it down and pass it around, now we're done with my homework hooray... burp. <br>";

}

song(99);
?>
</body>
</html>