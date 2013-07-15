<?php


$file = 'snakes.txt';
// Open the file to get existing content


//linebreak for excel
$newline = "\r\n";

//date
date_default_timezone_set('America/New_York');

//delimiter to import into excel spreadsheets
$del = ";";



//the IF statements determine if the field is empty (no data entered),
// and sets them to 0 or N/A respectively

if(empty($_POST['brown'])){
	
	$_POST['brown'] = '0';
	$_POST['blength1'] = 'N/A';

}


if(empty($_POST['garter'])){
	
	$_POST['garter'] = '0';
	$_POST['glength1'] = 'N/A';

}


if(empty($_POST['milk'])){
	
	$_POST['milk'] = '0';
	$_POST['mlength1'] = 'N/A';

}


if(empty($_POST['other'])){
	
	$_POST['other'] = '0';
	$_POST['olength1'] = 'N/A';

}
if(empty($_POST['notes'])){
	
	$_POST['notes'] = 'No notes entered.';
	
}

if(empty($_POST['bn'])){
	
	$_POST['bn'] = '?';
	
}

$fp = fopen($file, "a") or die("Couldn't open $file for writing!");
$current = "";


$current .= $newline;
$current .= "Board " . $_POST['bn'] . $newline;
$current .= date('l jS \of F Y') . $newline;
$current .= "Species" . $del . "Number of Each" . $del . "Length (in.)" . $newline;
$current .= "Brown Snakes" . $del . $_POST['brown'] . $del . $_POST['blength1'] . $newline;
$current .= "Garter Snakes" . $del . $_POST['garter'] . $del . $_POST['glength1'] . $newline;
$current .= "Milk Snakes" . $del . $_POST['milk'] . $del . $_POST['mlength1'] . $newline;
$current .= "Other" . $del . $_POST['other'] . $del . $_POST['olength1'] . $newline;
$current .= "Notes: " . $_POST['notes'] . $newline;

fwrite($fp, $current) or die("Couldn't write values to file!"); 

fclose($fp); 

?>