<?php
//Connection for database
$mysqli = new mysqli("localhost", "root", "", "database");

/* check connection */
if ($mysqli->connect_errno) {

   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

//Select Database
$sql = "SELECT * FROM employee";
$result = $mysqli->query($sql);
?>
<!doctype html>
<html>
<body>
<h1 align="center">Employee Details</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Employee ID</th>
<th>Name</th>
<th>DOB</th>
<th>Department</th>
<th>Join Date</th>
</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
?>
<tr>
<td><?php echo $row['employee_id']; ?></td>
<td><?php echo $row['employee_name']; ?></td>
<td><?php echo $row['dob']; ?></td>
<td><?php echo $row['dept']; ?></td>
<td><?php echo $row['join_date']; ?></td>
</tr>
<?php
}
}
else
{
?>
<tr>
<th colspan="2">There's No data found!!!</th>
</tr>
<?php
}
?>
</table>
<br><br>
<center><a href="formemp.html"><button>Insert</button></a></center>
</body>
</html>