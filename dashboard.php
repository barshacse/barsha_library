<?php

$con=odbc_connect('hrdata','hr','hr');
if(!$con)
{
	die('error connecting database');
}
$query="select * from books";
$result=odbc_exec($con,$query);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
<div style="margin-top: 100px" align="center">
	<h1>Admin Panel</h1>
	<div style="margin-top: 20px">
		<button onclick="window.location='test.php'">Add Books</button>
		<button onclick="window.location='test.php'">Manage Books</button>
		<button onclick="window.location='test.php'">Search Books</button>
	</div>
	<div style="margin-top: 20px; height: 10px">
		<table border="1">
			<tr>
				<td>Book Id</td>
				<td>Book Name</td>
				<td>Self Number</td>
				<td>Available</td>
			</tr>
			<?php while($row=odbc_fetch_array($result)) {?>
			<tr>
				<td><?php echo $row['BOOK_ID'];?></td>
				<td><?php echo $row['BOOK_NAME'];?></td>
				<td><?php echo $row['SELF_NUMBER'];?></td>
				<?php if($row['AVAILABLE']==1){?>
				<td>Available</td>
				<?php } else {?>
				<td>Not Available</td>
				<?php }?>
			</tr>
			<?php }?>
		</table>
	</div>
</div>
</body>
</html>