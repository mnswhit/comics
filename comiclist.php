<?php
include('conf.php');
$table = "comicslist";

$db = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
	echo '<p>Error: Could not connect to Database</p>';
}
$sql = "select comic1,website from $table order by comic1"; 
$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->bind_result($comic1, $website);
$display = "";
while ($row = $stmt->fetch()) {
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

