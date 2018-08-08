<?php
include('conf.php');
$count = "1";
$user1 = $_POST['user1'];
$table = "comicslist";
$table2 = "main";

$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
$db = mysql_select_db($database, $conn) or die(mysql_error());
$sql = "delete from $table2 where user = '$user1'";
$result = mysql_query($sql,$conn) or die(mysql_error());
if ($result) {
	$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
	$db = mysql_select_db($database, $conn) or die(mysql_error());
	$sql = "SELECT COUNT(*) from comicslist";
	$result = mysql_query($sql,$conn) or die(mysql_error());
	while ($row = mysql_fetch_array($result)) {
		$special_number = $row['COUNT(*)']; 
		$special_number++;
		$special_number++;
		$special_number++;
		$special_number++;
		$special_number++;
		$special_number++;
		$special_number++;
		$special_number++;
		$special_number++;
		$special_number++;
		$special_number++;
	while ($count != $special_number) {
		$id = $_POST[$count];
//		echo "ID $count = $id<br>";
		if ($id == "1") {
			$order1 = "order$count";
			$order = "$_POST[$order1]";
			$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
			$db = mysql_select_db($database, $conn) or die(mysql_error());
			$sql = "SELECT * from $table where id = '$count'";
			$result = mysql_query($sql,$conn) or die(mysql_error());
			while ($row = mysql_fetch_array($result)) {
				$comic1 = $row['comic1'];
				$comic2 = $row['comic2'];
				$website = $row['website'];
				$display2 = "$comic1";
				$display3 = "insert into $table2 values ('$user1', '$comic1', '$comic2', '$website', '$order')";
				$display5 = mysql_query($display3,$conn) or die(mysql_error()); 
				if ($display5) {
					$display4 .= "$display2 was added successfully<br>";
				} else {
					$display9 .= mysql_error();
				}
			};
		};
		$count++;
	};
};
};
echo "center";
echo "$display4";
echo "<br><br>";
echo "$display9";
echo "<br><br>
<a href=show.php?user1=$user1>View your comics</a> | <a href=index.php>Comics Main</a> | <a href=/>Home</a>";
