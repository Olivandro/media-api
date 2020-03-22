<?php
require 'Findmedia.php';
$Media = new FetchMedia;

if(isset($_GET['jpg_id'])){
	$jpgload = $Media->findjpg();
	header($jpgload[0]);
	readfile($jpgload[1]);
} elseif (isset($_GET['gif_id'])) {
	$gifload = $Media->findgif();
	header($gifload[0]);
	readfile($gifload[1]);
} elseif (isset($_GET['vid_id'])) {
	$vidload = $Media->findvid();
	header($vidload[0]);
	readfile($vidload[1]);
}
?>
<html>
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Basic API Template</title>
		<link rel="Shortcut Icon" href="favicon.ico" />
		<meta name="description" content="Basic API Template">
		<meta name="viewport" content="width=device-width, maximum-scale=1, user-scalable=no" />
		<meta name="author" content="The Creative Hand">
	</head>
	<body>
	</body>
</html>
