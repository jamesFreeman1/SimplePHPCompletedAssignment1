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
 <!--Information is sent to post status process page-->
<form action = "poststatusprocess.php" method = "post">
<p>Status Code (required):
 <!--Status Code textbox that initially contains a capital S-->
<input type="text" maxlength="5" name="statusCode" value="S" /></p><br>
<p>Status (required):</p>
 <!--Enlarged textbox for users to input status posts-->
<textarea name="status" cols="50" rows="6"></textarea>

<p>Share:
 <!--Three radio buttons that are linked, only one may be selected-->
<input type="radio" name="share" value="public"/>Public
<input type="radio" name="share" value="friends"/>Friends
<input type="radio" name="share" value="onlyMe"/>OnlyMe</p>


<p>Date:
 <!--Creates a variable that contains the servers current set date-->
<?php
$today = date("d/m/Y");?> 
 <!--Date textbox that initially contains the servers current date-->
<input type="text" name="date" maxlength="10" value="<?php echo $today;?>">
</p>
<p>Permission Type:
 <!--Three checkboxes that can be selected-->
<input type="checkbox" name="permission[]" value="Allow Like"/>Allow Like
<input type="checkbox" name="permission[]" value="Allow Comments"/>Allow Comments
<input type="checkbox" name="permission[]" value="Allow share"/>Allow share</p>

 <!--Submit button-->
<input type = "submit" value = "Post"/>
 <!--Reset button-->
<input type = "reset" value = "Reset"/>
</form>

<!--This is the footer -->
<?php include "footer.php" ?>
</div>
 </body>
 </html>