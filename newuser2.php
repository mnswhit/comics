<?php
include("conf.php");

$input = $_POST['user1'];
$input2 = str_replace(" ", "_", $input);
$input2 = preg_replace('/[^a-zA-Z0-9-_\.]/','', $input2);
if(!$input) {
	die("No username input. To return click <a href=# onClick='history.go(-1);return true;'>here</a>");
}
$table = "usertable";

$db = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to Database</p>';
}

$sql = "insert into $table values('$input2')";
$stmt = $db->prepare($sql);
$stmt->execute();
$display = "your username has been created successfully<br>"; 
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
<center><a href="/">Home</a> | <a href=edit.php?user=?<?php echo $input2;?>>Prifile</a> | <a href=index.php>Comics Main</a>
<br>
<br>
<?php echo $display ?>
<a href=edit.php?user1=<?php echo $input2;?>>Click Here</a> to setup your Account!

