<?php
include("conf.php");

$table="usertable";

$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
$db = mysql_select_db($database, $conn) or die(mysql_error());
$sql = "SELECT * from $table";
$result = mysql_query($sql,$conn);
while ($row = mysql_fetch_array($result)) {
	$user = $row['user'];
	$display .= "<a href=show.php?user1=$user>$user</a><br>"; 
	}
?>
<html>
<head>
<title>Comics</title>
</head>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-933049-1";
urchinTracker();
</script>

<body bgcolor="#555555" text=white link=white vlink=white alink=white>
<center><a href="/">Home</a> | <a href="newuser.php">New User</a>
<br>
<br>
<?php echo $display; ?>
<br>
<a href=comiclist.php>Current list of comics</a>
<br>
<br>
<a href="/">Home</a> | <a href="newuser.php">New User</a>
