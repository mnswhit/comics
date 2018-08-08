<?php
include('conf.php');
$table = "backgrounds";

$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
$db = mysql_select_db($database,$conn) or dies(mysql_error());

if ($_FILES[file] != "") {
	$name = $_FILES[file][name];
	$name=str_replace(" ", "_", $name);
	$name=str_replace("'", "_", $name);
	$name=str_replace("\\", "_", $name);
	$name=str_replace("(", "_", $name);
	$name=str_replace(")", "_", $name);
	$name=str_replace("&", "and", $name);
        $new_filename = "images/".$name;
        @copy($_FILES[file][tmp_name], $new_filename)
        or die ("Couldn't copy the file.");

	//Making the thumbnail
	$image_base = explode('.', $name);
	$thumb_name = "images/thumbs/".$image_base[0]."-th".".".$image_base[1];
	$make_thumb = system("convert -thumbnail 200 $new_filename $thumb_name");
} else {
	die("no input file specified");
}

$sql = "insert into $table (location, thumb_location, filesname) values ('$new_filename', '$thumb_name', '$name')"; 
$result = mysql_query($sql, $conn) or die(mysql_error()); 

?>
You have successfully uploaded <?php echo "$name"; ?>
