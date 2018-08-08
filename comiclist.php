<?php
include('conf.php');
$table = "comicslist";

$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
$db = mysql_select_db($database,$conn) or die(mysql_error());
$sql = "select * from $table order by comic1"; 
$result = mysql_query($sql, $conn);

while ($row = mysql_fetch_array($result)) {
	$comic1 = $row['comic1'];
	$website = $row['website'];
	$display .= "<a href=$website target='_new'>$comic1</a><br>";
};
?>
<html>
<head><title>Comics Available</title>
</head>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-933049-1";
urchinTracker();
</script>


<body bgcolor=#555555 text=white alink=white vlink=white link=white>
<center>
<a href="/">Home</a> | <a href=index.php>Comic's Main</a>
<br><br>
<table>
  <tr>
    <td><?php echo $display ?></td>
  </tr>
</table>
<br>
<a href="/">Home</a> | <a href=index.php>Comic's Main</a>
</center>

