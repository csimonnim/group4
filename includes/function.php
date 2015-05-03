<?php
function IncludeHTML($title){
	echo "
	<html>
	<head>
	<title>Group 4 - " .$title."</title>
	<link rel='stylesheet' type='text/css' href='../css/default.css'>
	</head>
	<body>
	".include_once('header.php')."
	".include_once('footer.php')."
	</body>
    </html>
	";
	}
?>