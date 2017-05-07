<!DOCTYPE html>
<html>
<head>
<style>h1{color:white;text-align: center;}</style>
	<meta charset="utf-8">
	<title>Access Level</title>
	<link rel="stylesheet" type="text/css" href="css/displaystudentstyle.css">
	<h1>Access Level</h1>
</head>
<body>
	<table class="form" width="100%" border="1" cellpadding="1" cellspacing="1">
		<tr>
			<th>Parent</th>
			<th>Student</th>
			<th>Admin</th>
			<th>Teacher</th>
		</tr>

		<tr class="field-wrap">
			<td>0-100</td>
			<td>100-300</td>
			<td>300-500</td>
			<td>500-900</td>
		</tr>
	</table>
	<form id="back" action="profile.php" method="post">
		<button type="submit" onclick="profile.submit()" class="button button-block " name="back">Back</button>
	</form>
</body>
</html>