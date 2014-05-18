<!Doctype html>
<head>
<title>Status Posting</title>
<link href="style.css" rel="stylesheet">
</head>
<!--This is the header -->
<?php include "header.php" ?>
<body>
<div id="main">
<h1>Status Posting Forum</h1>

<?php
// Variable that contains the users status code input
$statusCode =$_POST["statusCode"];
// Variable that contains the users status input
$status =$_POST["status"];
// Variable that contains the users date input
$date =$_POST["date"];

// Assigns the users share selection a variable if a share option has been selected,
// otherwise the variable is assigned null.
if(!empty($_POST["share"]))
{
$share =$_POST["share"];
}
else{
$share = NULL;
}
// Assigns the users permissions to a variable if the user has selected any permissions. 
if(!empty($_POST["permission"]))
{
$permission =$_POST["permission"];
}

// Variable that contains the number of characters in the status code.
$stringLength = strlen($statusCode);
// Variable that contains the day of the post
$day = substr($date, 0,-8);
// Variable that contains the month of the post
$month = substr($date, 3,-5);
// Variable that contains the year of the post
$year = substr($date, 6);

 // Function that returns true if the users post date is a correct date,
// and false not.
 function checkTheDate($d,$m,$y){
 if (checkdate($m, $d, $y) == 1){
 return TRUE;
}}

// Function that returns true if the users status code contains only five characters,
// and false not.
function checkStatusIsFiveCharacters($strLength){
if (strlen($strLength) == 5){
return TRUE;
} }


// Function that returns true if the users status code starts with a capital s,
// and false not.
function checkStatusCodeStartsWithS($stri){
if ($stri[0] == "S"){
return TRUE;
}}

// Function that returns true if the users status code contains only numbers after the capital s,
// and false not.
function checkStatusCodeIsOnlyNumbersAfterS($stri){
if(preg_match("/^[0-9]+$/",substr($stri, 1))){
   return TRUE;
}} 

// Function that returns true if the users status contains the right characters, 
// and false if it contains a character that is not allowed.
function checkStatusCodeContainsCorrectChars($stri){
if(preg_match('/^[!?\.\,a-z0-9 ]+$/i', $stri)){
 return TRUE;
}}

// Function that returns true if the users status is not null, and false if it is null.
function checkStatusisNotNull($stri){
if(!$stri == ''){
 return TRUE;}}

$permissionList = "";
// Conditional statement that if permissions have been selected
// will join all permissions selected by a user and add them to a variable.
if(!empty($permission)) 
  {
    $N = count($permission);
    for($i=0; $i < $N; $i++)
    {     
	  $permissionList = $permissionList." ".$permission[$i].", ";
    }
  }
// Gets the setup info
 require_once ("settings.php");
// The database table is allocated a variable
 $sql_tble = "statusList";
// The sql statement that connects to the database
$link =@mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db) or die( " Unable to connect to server ");  

 // Selects the database
mysql_select_db($sql_tble);
// The sql statement that will create the required table if it doesn't already exist.
 $sql = "CREATE TABLE IF NOT EXISTS statusList
 (
 Status_Code VARCHAR(5) NOT NULL, 
 PRIMARY KEY(Status_Code),
 Status VARCHAR(40) NOT NULL,
 Share VARCHAR(7),
 Date DATE NOT NULL,
 Permission_Type VARCHAR(42)
 )";
 
 // Implements the create table sql statement from above. Return an error if it doesn't work.
 if (!@mysqli_query($link, $sql))
{
 echo "Error in CREATE TABLE.";
}
 
 echo "<p></p>";
 
 // The sql statement that will search for rows within the table that have a status code the same
 // as the one provided by the user.
 $searchCode = "SELECT Status_Code FROM ".$sql_tble." WHERE Status_Code='".$statusCode."'";
 // Implements the search sql statement (above)
 $queryinSearch =@mysqli_query($link, $searchCode);
 // returns the number of rows returned by search (above)
 $countofRows =@mysqli_num_rows($queryinSearch);
 
 // A function that will return false if the given status code already exists in the table, and true if not.
 function checkIfStatusCodeIsAvailable($RowsReturned){
 if ($RowsReturned > 0)
 {
 return FALSE;
 }
 else{
 return TRUE;}
 }

// The sql statement that will insert the status information into the table 
 $tableQuery = "insert into $sql_tble"
						."(Status_Code, Status, Share, Date, Permission_Type)"
					." values "
						."('$statusCode','$status', '$share', '$year-$month-$day','$permissionList')";

// A conditional statement to check that all the requirements of a status post is meet.
// If all requirements are meet then a success message is provided to the user, informing
// them their status has been saved.
// If a requirement is not meet, then an error statement is given to the user and 
// below that a list of all corresponding errors are shown.
if(
(checkStatusIsFiveCharacters($statusCode) == TRUE) &&
(checkStatusCodeStartsWithS($statusCode) == TRUE) &&
(checkStatusCodeIsOnlyNumbersAfterS($statusCode) == TRUE) &&
(checkStatusCodeContainsCorrectChars($status) == TRUE) &&
(checkTheDate($day,$month,$year) == TRUE) &&
(checkIfStatusCodeIsAvailable($countofRows) == TRUE))
{
 // display a success message
echo "<p>Your status has been saved</p>";
$theTableResult = mysqli_query($link, $tableQuery);
if(!$theTableResult) {
		} else {
			// display a success message
			echo "<p>Happy Posting</p>";}
}
else{
// display an error message when a status requirement is not met 
echo "<p>ERROR cannot save your status:</p>";}
 
 // Conditional statement, that if the status code is not five characters long 
 // will inform the user that they need to have a status code that is five characters long 
if(checkStatusIsFiveCharacters($statusCode) == FALSE){
echo "<p>Your status code MUST be five chararters in length.</p>";}

 // Conditional statement, that if the status code does not start with a capital S
 // will inform the user that they need to have a status code that starts with a capital s. 
if(checkStatusCodeStartsWithS($statusCode) == FALSE){
echo "<p>You MUST start your String code with S (Capital S).</p>";}

 // Conditional statement, that if the status code does not have only numbers after the capital s
 // will inform the user that they need to have a status code that
 // only has numbers after the capital s
if(checkStatusCodeIsOnlyNumbersAfterS($statusCode) == FALSE){
echo "<p>Status code MUST only have numbers after S.</p>";}

 // Conditional statement, that if the status contains disallowed characters 
 // will inform the user that they need to have a status that contains  
 // only alpanumeric characters, spaces, full-stops, commas, exlimation points and question marks
if(checkStatusCodeContainsCorrectChars($status) == FALSE){
echo "<p>String contains the wrong characters. You can only use alpanumeric characters, spaces, full-stops, commas, exlimation points and question marks.</p>";}
 
 // Conditional statement, that if the date is incorrect, will inform the user that
 // they must use a correct date
if(checkTheDate($day,$month,$year) == FALSE){
echo "<p>You MUST enter a correct date</p>";}

 // Conditional statement, that if the status is null will inform the user that 
 // they must use input a status
if(checkStatusisNotNull($status) == FALSE){
echo "<p>You MUST enter a status</p>";}

 // Conditional statement, that if the status code has already been used will inform 
 // the user that they must use another status code that has not been used before.
if(checkIfStatusCodeIsAvailable($countofRows) == FALSE){
echo "<p>This status code has already been used, please try again with a different status code that has not been used before.</p>";}
 
 // close the database connection
 mysqli_close($link);
 // Link to a new post status form
 echo "<p><a href='poststatusform.php'>Create another status</a></p>";

// This is the footer
include "footer.php"
?>

</div>
 </body>
 </html>