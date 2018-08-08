<?php
$user1=$_GET['user1']; 
include('conf.php');
$conn = mysql_connect($host, $user, $pass) or die(mysql_error()); 
$db = mysql_select_db($database,$conn) or die(mysql_error()); 
$sql = "select * from backgrounds"; 
$resuld = mysql_query($sql,$conn) or die(mysql_error()); 
$count = 1;
while ($row = mysql_fetch_array($resuld)) {
	$location = $row['location'];
	$thumb = $row['thumb_location'];
	$filename = $row['filesname'];

	$display = "<td valign=top width=250><a href=$location target=\"_new\"><img src=$thumb border=none></a><br></td> \n";
	if ($count == 6) {
		$count = 1; 
		$display2 .= "</tr>
		<tr>      $display
		";
		#echo "</tr>
		#<tr>     $display
		#";
	}else{
		$count++;
		#echo $display;
		$display2 .= $display;
	};
};
?>
<html>
<head>
<title>Background Selections</title>
</head>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-933049-1";
urchinTracker();
</script>

<body bgcolor=#333333 text=white>
<center><a href="show.php?user1=<?echo $user1?>">Comics</a> | <a href="/">Home</a> | <a href="edit.php?user1=<?echo $user1?>">Profile</a>
<br><br><br>
<center>I am taking suggestiongs for backgrounds for the comic script. Please upload a suggestion or two! I will be implementing a background chooser soon. 
</center>
<br>
<form action=background2.php method=post ENCTYPE="multipart/form-data">
File: <input type=FILE name=file size=30><input type=submit name=submit value='Upload File'>
</form>
<br><br><br>
Currently submitted backgrounds below. 
<table>
<tr>
<? echo $display2 ?></table><br><br>
<center><a href="show.php?user1=<?echo $user1?>">Comics</a> | <a href="/">Home</a> | <a href="edit.php?user1=<?echo $user1?>">Profile</a>
