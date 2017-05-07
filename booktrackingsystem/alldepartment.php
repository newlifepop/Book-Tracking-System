<?php
require 'booktrackingdb.php'
?>

<?php
session_start();
$sql = "SELECT * FROM dept ORDER BY dept_id";
$sql2 = "SELECT COUNT(*) FROM dept";

$records = $mysqli->query($sql) or die($mysqli->error);
$counter = $records->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Display All Department</title>
	<link rel="stylesheet" type="text/css" href="css/displaydepartmentstyle.css">
</head>

<body>
	<div>
		<?php
			while($department = $records->fetch_assoc()){
				echo "<table class=form width=100% border=1 cellpadding=1 cellspacing=1>";
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "</tr>";

				echo "<tr class=field-wrap>";
				echo "<td>".$department['dept_id']."</td>";
				echo "<td>".$department['dept_name']."</td>";
				echo "</tr>";
				echo "</table>";
			}
		?>
		<form id="back" action="profile.php" method="post">
		<button type="submit" onclick="profile.submit()" class="button button-block " name="back">Back</button>
		</form>
	</div>
</body>
</html>