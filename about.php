<!Doctype html>
<head>
<title>About</title>
<link href="style.css" rel="stylesheet">
</head>
<body>
<!--This is the header -->
<?php include "header.php" ?>

<div id="main">
<h1>About</h1>

<p><b>Special Features:</b></p>
<ul>
<li>Firstly to improve maintenance and reduce complexity I have created header and footer files. Each of these are imported into specific pages.</li>
<li>Secondly, I have created and used a CSS style sheet to better manage the appearance of the web application.</li>
<li>To improve the functionality and user interface, an attractive and easy to read header was added to each page. This enables users to navagate to major pages more easily.</li> 
<li>To assist users with their status code input two helpful functions have been added. One the required capital S is already inserted into the status code text box. Secondly, to ensure users dont exceed the required five characters when inserting their status code, the status code text box will only accept a maximum of five characters.
</li>
<li>To better assist users with the input of their status posts a larger textbox has been provided. 
</li>
</ul>

<p><b>The troublesome bits:</b></p>

<p>The most difficult part of this assignment for me personally, was validating all possible users input. I felt this would be the most import part of the assignment and/or any project of this nature since data is so important. It took me a long time to ensure every possible user input was accounted for and checked, to ensure the stability of the web application and integrity of the stored data. Problems such as:
</p>
<ul>
<li>How the "share" variable will be treated, if no radio button is selected.</li>
<li>How to ensure the user only uses the required characters when posting a status.</li>
<li>How to inform the user their status code is not unique.</li>
<li>How to check that the users given date is actually a correct date.</li>
</ul>
<p>Using the checkedboxes was difficult. The idea that they need to be treated similar to an array was initially difficult  for me to grasp.<br/>
Additionally, converting and tweaking everything to work with scms-lamp was very difficult and time consuming. I fount it particularly frustrating and difficult trying to solve problems using scms-lamp since it does not inform your where the errors occur.</p>


<p><b>What would you like to do better next time?</b></p>
<ul>
<li>Next time I hope to use scms-lamp more efficiently. Having used Xampp mostly, converting to scms-lamp was frustrating and difficult.</li>
<li>Implement some javascript correctly. That would improve the functionality and usability of the website. </li>
<li>Implement ways to ensure the security of the website and the information passed and stored.</li>
<li>Also next time I would like to possibly produce some interactive graphics within the website.</li>
</ul>
 

<p><b>My reference sources:</b></p>
<p>When working on this assignment I used the following resorces:</p>
<ul>
<li>Lecture Notes.</li>
<li>Various comments and posts on <a href="http://stackoverflow.com/">stackoverflow.com</a></li>
<li>Posts on <a href="http://www.w3schools.com">w3schools.com</a></li>
<li>Finally, the book by Luke Welling & Laura Thompson <a href="http://aut.lconz.ac.nz/vwebv/holdingsInfo?bibId=1272980">PHP and MySQL Web development</a> proved to be a great help.</li>
</ul>

<p><b>What I have Learnt:</b></p>
<p>Having known little html and next to no php I have since learnt a great deal. From this assignment I feel as though I have learnt the following:</p>
<ul>
<li>The use of basic sql queries in php.</li>
<li>The use of html forms and the passing and collection of information.</li>
<li>Create and use php variables, functions and css.</li>
<li>Apply mysql table data to a php page.</li>
</ul>

<!--This is the footer -->
<?php include "footer.php" ?>
</div>
 </body>
 </html>
 
