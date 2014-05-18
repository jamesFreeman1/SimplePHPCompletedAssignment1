<!Doctype html>
<head>
<title>Status Search</title>
<link href="style.css" rel="stylesheet">
</head>
<body>
<!--This is the header -->
<?php include "header.php" ?>


<div id="main">
<h1>Status Posting System Search </h1>
<!--This is the search line, with text box and submit button.-->
<form action = "searchstatusprocess.php" method = "Get">
<p>Status Code (required):
<input type="text" name="searchStatus"/>
<input type = "submit" value = "Search"/>

<!--This is the footer-->
<?php include "footer.php" ?>
</div>
 </body>
 </html>