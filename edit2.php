<?php
#ini_set('display_errors',1);
#error_reporting(E_ALL);

error_reporting(E_ALL ^ E_NOTICE);
include('conf.php');
$count = "1";
$user1 = $_POST['user1'];
$table = "comicslist";
$table2 = "main";

$db = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
	echo '<p>Error: Could not connect to Database</p>';
}

$sql = "delete from $table2 where user = '$user1'";
$stmt = $db->prepare($sql);
$stmt->execute();

$sql1 = "SELECT COUNT(*) from comicslist";
$db1 = new mysqli($host, $user, $pass, $database);
$stmt1 = $db1->prepare($sql1);
$stmt1->execute();
$stmt1->bind_result($snum);
$stmt1->fetch();
$snum++;
$snum++;
$snum++;
$snum++;
$snum++;
$snum++;
$snum++;
$snum++;
$snum++;
$snum++;
$snum++;
echo $snum;
while ($count != $snum) {
	$id = $_POST[$count];
//	echo "ID $count = $id<br>";
	if ($id == "1") {
		$order1 = "order$count";
		$order = $_POST[$order1];
		$sql2 = "SELECT comic1,comic2,website from $table where id = '$count'";
		$db2 = new mysqli($host, $user, $pass, $database);
		$stmt2 = $db2->prepare($sql2);
		$stmt2->execute();
		$stmt2->bind_result($comic1,$comic2,$website);
		while ($row = $stmt2->fetch()) {
			$db3 = new mysqli($host, $user, $pass, $database);
			$display2 = "$comic1";
			$display3 = "insert into $table2 (user, comic1, comic2, website, order1) values ('$user1', '$comic1', '$comic2', '$website', '$order')";
			$stmt3 = $db3->prepare($display3);
			$stmt3->execute();
#			$stmt3->fetch();
			$display4 .= "$display3<br>";
			$display4 .= "$display2 was added successfully<br>";
		};
	};
	$count++;
};


#echo "center";
echo "$display4";
echo "<br><br>";
?>
	<a href=show.php?user1=<?php echo $user1?>>View your comics</a> | <a href=index.php>Comics Main</a> | <a href=/>Home</a>";
