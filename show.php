<?php
include("conf.php");

Header("Cache-Control: must-revalidate");
$offset = 60 * 60 * 12 * 0;
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
Header($ExpStr);

$user1 = $_GET['user1'];
$table = "main";

$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
$db = mysql_select_db($database, $conn) or die(mysql_error());
$sql = "SELECT * from $table where user = '$user1' order by order1";
$result = mysql_query($sql,$conn);
$ucomics = array('Garfield', 'The Boondocks', 'Calvin and Hobbs', 'Foxtrot');
$counter = 0;
foreach ($ucomics as $ucomics2) {
	$counter++;
	$ucomics[$counter] = $ucomics2;
};
$counter = 0;
$fix_string = "<font color=yellow><strong>Working on a fix for this comic</strong><br></font>";

while ($row = mysql_fetch_array($result)){
	$comic1 = $row['comic1'];
	$comic2 = $row['comic2'];
	$website = $row['website'];
			$display .= "<br>$comic1<br>
       				     <a href='$website'><img src=$comic2 border=none alt='Picture Not Available'></a><br>";
	
};
?>

<html>
<head>
<?php echo "<title>$user1's Comics</title>"; ?>
</head>

<body bgcolor=#555555 text=white link=white vlink=white alink=white>
<center><a href="index.php">Comics main</a> | <a href="/">Home</a> | <a href="edit.php?user1=<?php echo $user1?>">Profile</a> 
<br>
<br>
<font color=yellow>Note: I DO NOT monitor all comics, if you notice a comic has not been showing up a few days in a row, please, shoot me an e-mail at <a href=mailto:mark@whitacres.net>mark@whitacres.net</a> and let me know so I can fix the issue. Thank you<br><br></font>
<br><br>
<font color=red>Not all comics are working yet, but I am working on it. You'll see them slowly start showing back up. </font>
<br>
<!--<font color=yellow><strong>Update:</strong> Abstract Gender/Abstract Gender University as discontinued, and domain no longer exists. Sources suggest they may be done for good this time. <br><br>
<strong>Update:</strong> 8-Bit theathre has been removed due to end of life. Sad to see it come to an end, was a good comic. Read em at <a href=http://www.nuklearpower.com>Nuklear Power</a><br><br>
<strong>Update:</strong> Angst Technology was removed from the list due to no updates in over a year. <br><br>
<straong>Update:</strong> Anime Arcadia, and Operation Elusive Concept were removed due to the domain no longer being valid.<br></font>
--><script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-933049-1";
urchinTracker();
</script>
<?php echo $display; ?>
