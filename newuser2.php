<?php
include("conf.php");

$input = $_POST['user1'];
$input2 = str_replace(" ", "_", $input);
$table = "usertable";

$conn = mysql_connect($host, $user, $pass) or die(mysql_error()); 
$db = mysql_select_db($database, $conn) or die(mysql_error()); 
$sql = "insert into $table values('$input2')";
$result = mysql_query($sql,$conn);
if ($result){
   $display = "your username has been created successfully<br>"; 
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
<center><a href="/">Home</a> | <a href=edit.php?user=?<?php echo $input2;?>>Prifile</a> | <a href=index.php>Comics Main</a>
<br>
<br>
<?php echo $display ?>
<a href=edit.php?user1=<?php echo $input2;?>>Click Here</a> to setup your Account!

