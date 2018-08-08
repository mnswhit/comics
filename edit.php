<?php
include("conf.php");

$user1 = $_GET['user1'];
$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
$db=mysql_select_db($database, $conn) or die (mysql_error());
$sql = "select * from comicslist order by comic1";
$result = mysql_query($sql,$conn); 
While ($row = mysql_fetch_array($result)) {
	$comic1 = $row['comic1'];
	$website = $row['website'];
	$id = $row['id'];	
	$conn1 = mysql_connect($host, $user, $pass) or die(mysql_error()); 
	$db = mysql_select_db($database,$conn) or die(mysql_error()); 
	$sql1 = "select * from main where user = '$user1' and comic1 = '$comic1'";
	$result1 = mysql_query($sql1,$conn1);
	if ($row1 = mysql_fetch_array($result1)) {
		$order1 = $row1['order1'];
		$display .= "
		 	<tr>
			  <td><a href=$website target='_new'>$comic1</a></td>
			  <td><input type=radio name=$id value=1 checked>Yes</td>
			  <td><input type=radio name=$id value=0>No</td>
			  <td><input type=text name=order$id size=2 value=$order1><font color=yellow></font></td>
			  <td><font color=yellow>Place number value for comic order<br>
			      Please place a 0(zero) infront of 1-9<br>
			      Ex. (01 10) </font><br></td>
			</tr>";
	} else {
	        $display .= "
		        <tr>
			  <td><a href=$website target='_new'>$comic1</a></td>
			  <td><input type=radio name=$id value=1>Yes</td>
			  <td><input type=radio name=$id value=0 checked>No</td>
			  <td><input type=text name=order$id size=2><font color=yellow></font></td>
			  <td><font color=yellow>Place number value for comic order<br>
			      Please place a 0(zero) infront of 1-9<br>
			      Ex. (01 10) </font></td>
			</tr>";
	};
};
$sqla = "select count(*) from main where user = '$user1'"; 
$resulta = mysql_query($sqla,$conn); 
While ($row = mysql_fetch_array($resulta)) {
	$counta = $row['count(*)']; 
	$display2 = $counta; 
};
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
<center><a href="/">Home</a> | <a href=index.php>Comic's Main</a> | <a href=show.php?user1=<?php echo $_GET['user1']?>>Comics</a>
<br><br>You currently have <?php echo $display2 ?> comics!
<form action=edit2.php method=post>
<input type=submit name=submit value=Submit>
<br><br>
<table width=800>
  <?php echo $display ?>
</table>
<?php echo "<input type=hidden name=user1 value=$_GET[user1]>"; ?>
<br><br>
<input type=submit value=Submit name=submit>
</form></center>
