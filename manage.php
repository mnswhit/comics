<?php
include("conf.php");
#
#Header("Cache-Control: must-revalidate");
#$offset = 60 * 60 * 12 * 0;
#$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
#Header($ExpStr);

#$user1 = $_GET['user1'];
$table = "comicslist";

$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
$db = mysql_select_db($database, $conn) or die(mysql_error());
$sql = "SELECT * from $table order by comic1";
#$sql = "SELECT * from $table";
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
		if ($ucomics[1] == $comic1) {
			$display .="<br>$comic1
				    <br>
				    <a href='$website'><img src=$comic2 border=none alt='Picture Not Available'></a><br>";
#				    $fix_string";
		}elseif ($ucomics[2] == $comic1) {
			$display .="<br>$comic1
				    <br>
				    <a href='$website'><img src=$comic2 border=none alt='Picture Not Available'></a><br>";
#				    $fix_string";
		}elseif ($ucomics[3] == $comic1) {
			$display .="<br>$comic1
				    <br>
				    <a href='$website'><img src=$comic2 border=none alt='Picture Not Available'></a><br>";
#				    $fix_string";
		}elseif ($ucomics[4] == $comic1) {
			$display .="<br>$comic1
				    <br>
				    <a href='$website'><img src=$comic2 border=none alt='Picture Not Available'></a><br>";
#				    $fix_string";
		} else {
			$display .= "<br>$comic1
	        		     <br>
       				     <a href='$website'><img src=$comic2 border=none alt='Picture Not Available'></a><br>";
		};
	
};
?>

<html>
<head>
<?php echo "<title>$user1's Comics</title>"; ?>
</head>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-933049-1";
urchinTracker();
</script>



<body bgcolor=#555555 text=white link=white vlink=white alink=white>
<center><a href="index.php">Comics main</a> | <a href="/">Home</a> | <a href="edit.php?user1=<?php echo $user1?>">Profile</a> 
<br>
<br>
<font color=red>Comming soon, custom selected backgrounds! Please submit suggestions <a href="background.php?user1=<?php echo $user1?>">here</a><br><br></font>
<font color=yellow>New Comic Available! <a href=http://www.elusive-concept.com/current.htm target=_new>Operation Elusive Concept</a>. To add this comic to your list <a href="edit.php?user1=<?php echo $user1?>">Click Here</a><br></font>
<font color=yellow>New Comic Available! <a href=http://www.abstractgender.com target=_new>Abstract Gender</a>. To add this comic to your list <a href="edit.php?user1=<?php echo $user1?>">Click Here</a><br></font>
<font color=yellow>New Comic Available! <a href="http://http://bit-bucket.com/" target=_new>Too much Information</a>. To add this comic to your list <a href="edit.php?user1=<?php echo $user1?>">Click Here</a><br></font>
<br><br>
<font color=red><strong>Attention: I believe I may have found a solution to the broken comics. I will be monitoring the changes to confirm that these comics are working</strong></font><br>
<br><br>
<?php echo $display; ?>
	
