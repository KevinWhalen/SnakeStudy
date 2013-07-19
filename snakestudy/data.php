<?php
// This script creates a file, named below, with the data reported from users 
// of the snake study website in a format that can be imported to a database, 
// spreedsheet, or used by a javascript library like D3.
$file = 'snakes.csv';

// Delimiter .csv file
$del = ";";

// Windows End of Line charater (PHP.EOL)
//linebreak for excel
$newline = "\r\n";

//date
date_default_timezone_set('America/New_York');

// Handle empty fields in submission
// The IF statements determine if the field is empty (no data entered),
// and sets them to 0 or N/A respectively

// Switch to use variables instead of changing data in _POST.
// Sanatize input.
// Clean input for delimiter. replace
// Remove any white space. trim($str)
$boardNumber = '?'; // Is board number tied to a location?
$brown = 0;
$brown_lengths = 'N/A';
$garter = 0;
$garter_lengths = 'N/A';
$milk = 0;
$milk_lengths = 'N/A';
$other = 0;
$other_lengths = 'N/A';
$notes = 'No notes entered.';

// TODO:
// Also wrap both in encode, strip, or filter to clean the input 
// based on how the data is going to be used.
// http://coding.smashingmagazine.com/2011/01/11/keeping-web-users-safe-by-sanitizing-input-data/
// http://php.net/manual/en/filter.filters.sanitize.php
// http://stackoverflow.com/questions/129677/whats-the-best-method-for-sanitizing-user-input-with-php

// empty($var) === (!isset($var) || $var == false)
// But empty() can not be used with trim, it only acts on variables.
if(isset($_POST['bn']) && ltrim(rtrim($_POST['bn'])) == true){
	$boardNumber = ltrim(rtrim(str_replace(';', ':', $_POST['bn'])));
}
if(isset($_POST['brown']) && trim($_POST['brown']) == true){
	$brown = trim(trim($_POST['brown'], ';'));
	$brown_lengths = str_replace(';', ':', $_POST['blength1']);
}
if(isset($_POST['garter']) && trim($_POST['garter']) == true){
	$garter = trim(trim($_POST['garter'], ';'));
	$garter_lengths = str_replace(';', ':', $_POST['glength1']);
}
if(isset($_POST['milk']) && trim($_POST['milk']) == true){
	$milk = trim(trim($_POST['milk'], ';'));
	$milk_lengths = str_replace(';', ':', $_POST['mlength1']);
}
if(isset($_POST['other']) && trim($_POST['other']) == true){
	$other = trim(trim($_POST['other'], ';'));
	$other_lengths = str_replace(';', ':', $_POST['olength1']);
}
if(isset($_POST['notes']) && ltrim(rtrim($_POST['notes'])) == true){
	$notes = ltrim(rtrim(str_replace(';', ':', $_POST['notes'])));
}

if (!file_exists($file)){
	$fp = fopen($file, "w") or die("Could not create new file: $file");
	$attributes = "Board" . $del . "Species" . $del . "Eaches" . $del . "Lengths (inches)" . $del . "Date" . $newline;
	fwrite($fp, $attributes) or die("Couldn't write values to new file!"); 
	fclose($fp); 
}

$fp = fopen($file, "a") or die("Couldn't open $file for writing!");

$currentDate = date('Y-m-d H:i:s');

// Do you want all of the zero entries made or should they be dropped?
$entry = "";
/*if ($brown)*/ $entry .= $boardNumber . $del . "Brown" . $del . $brown . $del . $brown_lengths . $del . $currentDate . $newline;
/*if ($garter)*/ $entry .= $boardNumber . $del . "Garter" . $del . $garter . $del . $garter_lengths . $del . $currentDate . $newline;
/*if ($milk)*/ $entry .= $boardNumber . $del . "Milk" . $del . $milk . $del . $milk_lengths . $del . $currentDate . $newline;
/*if ($other)*/ $entry .= $boardNumber . $del . "Other" . $del . $other . $del . $other_lengths . $del . $currentDate . $newline;

fwrite($fp, $entry) or die("Couldn't write values to file!"); 

fclose($fp); 


// Below is the original "more" human readable formatting.

//$currentDate = date('l jS \of F Y');
/*
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
*/
?>

