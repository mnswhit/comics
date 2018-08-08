<?php
#ini_set('display_errors',1);
#error_reporting(E_ALL);
include('conf.php');
$table = "backgrounds";

if ($_FILES["bgfile"] != "") {
	$name = $_FILES["bgfile"]["name"];
	$name=str_replace(" ", "_", $name);
	$name=str_replace("'", "_", $name);
	$name=str_replace("\\", "_", $name);
	$name=str_replace("(", "_", $name);
	$name=str_replace(")", "_", $name);
	$name=str_replace("&", "and", $name);
        $new_filename = "images/".$name;
	move_uploaded_file($_FILES["bgfile"]["tmp_name"], $new_filename)
        or die ("Couldn't copy the file. Error#".$_FILES["bgfile"]["error"]);

	//Making the thumbnail
	$image_base = explode('.', $name);
	$thumb_name = "images/thumbs/".$image_base[0]."-th".".".$image_base[1];
	$make_thumb = system("convert -thumbnail 200 $new_filename $thumb_name");
} else {
	die("no input file specified");
}
$db = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to Database</p>';
}
$sql = "insert into $table (location, thumb_location, filesname) values ('$new_filename', '$thumb_name', '$name')"; 
$stmt = $db->prepare($sql);
$stmt->execute();
?>
You have successfully uploaded <?php echo "$name"; ?>
