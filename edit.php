<?php
include("conf.php");
$user1 = $_GET['user1'];

$db = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
        echo '<p>Error: Could not connect to Database</p>';
}

$sql = "select comic1,website,id from comicslist order by comic2;";
$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->bind_result($comic1,$website,$id);
While ($row = $stmt->fetch()) {
	$sql2 = "select order1 from main where user = '$user1' and comic1 = '$comic1'";
	$db2 = new mysqli($host, $user, $pass, $database);
	$stmt2 = $db2->prepare($sql2);
	$stmt2->execute();
	$stmt2->bind_result($order1);
	$stmt2->fetch();
	if (isset($order1)) {
		$display .= "
		 	<tr>
			  <td><a id=$comic1 href=$website target='_new'>$comic1</a></td>
			  <td><input checked value=1 type=radio name=$id>Yes</td>
			  <td><input value=0 type=radio name=$id>No</td>
			  <td><input value=$order1 type=number name=order$id size=2 min=1 max=100><font color=yellow></font></td>
			</tr>";
#			  <td><font color=yellow>Place number value for comic order<br>
#			      Please place a 0(zero) infront of 1-9<br>
#			      Ex. (01 10) </font><br></td>
#			</tr>";
	} else {
	        $display .= "
		        <tr>
			  <td><a id=$comic1 href=$website target='_new'>$comic1</a></td>
			  <td><input value=1 type=radio name=$id>Yes</td>
			  <td><input checked value=0 type=radio name=$id>No</td>
			  <td><input width=100% type=number name=order$id size=2 min=1 max=100><font color=yellow></font></td>
			</tr>";  
#			  <td><font color=yellow>Place number value for comic order<br>
#			      Please place a 0(zero) infront of 1-9<br>
#			      Ex. (01 10) </font></td>
#			</tr>";
	};
};
$sql3 = "select count(*) from main where user = '$user1'"; 
$db = new mysqli($host, $user, $pass, $database);
$stmt3 = $db->prepare($sql3);
$stmt3->execute();
$stmt3->bind_result($display2);
$row = $stmt3->fetch();

#While ($row = mysql_fetch_array($resulta)) {
#	$counta = $row['count(*)']; 
#	$display2 = $counta; 
#};
?>

<html>
<head>
<title>Comics</title>
</head>
<body bgcolor="#555555" text=white link=white vlink=white alink=white>
<center><a href="/">Home</a> | <a href=index.php>Comic's Main</a> | <a href=show.php?user1=<?php echo $_GET['user1']?>>Comics</a>
<br><br>You currently have <?php echo $display2 ?> comics!
<form action=edit2.php method=post>
<input type=submit name=submit value=Submit>
<br><br>
<style>
th {
    cursor: pointer;
}

th, td {
    text-align: left;
}

</style>
<table id="myTable" width=800>
 <tr>
  <th onclick="sortTable(0)">Comic</th>
  <th onclick="sortTable(1)">Yes</th>
  <th onclick="sortTable(2)">No</th>
  <th onclick="sortTable(3)">Order</th>
 </tr>
  <?php echo $display ?>
</table>
<?php echo "<input type=hidden name=user1 value=$_GET[user1]>"; ?>
<br><br>
<input type=submit value=Submit name=submit>
</form></center>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

