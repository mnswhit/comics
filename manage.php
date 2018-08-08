<?php
include("conf.php");
$table = "comicslist";

$db = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to Database</p>';
}
$sql = "SELECT comic1,comic2,website from $table order by comic1";
$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->bind_result($comic1,$comic2,$website);
while ($row = $stmt->fetch()){
	$display .= "<br>$comic1
		     <br>
       		     <a href='$website'><img src=cpics/$comic2 border=none alt='Picture Not Available'></a><br>";
};
?>

<html>
<head>
<?php echo "<title>All Comics</title>"; ?>
</head>



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
	
