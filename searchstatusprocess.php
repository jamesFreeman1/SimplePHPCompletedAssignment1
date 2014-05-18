<!Doctype html>
<head>
<title>Status Information</title>
<link href="style.css" rel="stylesheet">
</head>
<!--This is the header -->
<?php include "header.php" ?>
<body>
<div id="main">
<h1>Status Information</h1>

<?php
// Gets the setup info
require_once ("settings.php");
// The searched string is allocated a variable
$searchStatus =$_GET["searchStatus"];

// The database table is allocated a variable
 $sql_tble = "statusList";

 // The sql statement that connects to the database
$link =@mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db) or die( " Unable to connect to server ");

// Selects the database
mysql_select_db($sql_tble);

// The sql statement that searches the table for rows that have the searched string within their status
$searchQuery = "SELECT * FROM `$sql_tble` WHERE Status LIKE '%$searchStatus%'"; 

// This carries out the search
$resultSearch =@mysqli_query($link, $searchQuery);

// This fetches the results of the search and allocates the columns of each row to the appropriate places
while($row =@mysqli_fetch_array($resultSearch)){
// The searched status:
echo "<p>Status: ".$row['Status']."<br/>";
// The searched status, status code:
echo "Status Code: ".$row['Status_Code']."</p>";
// The searched status share option:
echo "<p>Share: ".$row['Share']."<br/>";
// The searched status date posted:
echo "Date Posted: ".date("F d, Y",strtotime($row['Date']))."<br/>";
// The searched status selected permissions:
echo "Permission: ".$row['Permission_Type']."</p>";

echo "<br/>";
echo "<br/>";}

// close the database connection
mysqli_close($link);
?>
<!--This is a link to the page necessary to search for another status -->
<p><a href="searchstatusform.php">Search for another status</a></p>

<!--This is the footer -->
<?php include "footer.php" ?>

</div>
</body>
</html>