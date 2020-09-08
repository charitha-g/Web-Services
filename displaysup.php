<?php
//Connection for database
$mysqli = new mysqli("localhost", "root", "", "database");

/* check connection */
if ($mysqli->connect_errno) {

   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

//Select Database
$sql = "SELECT * FROM supplier";
$result = $mysqli->query($sql);
?>
<!doctype html>
<html>
<body>
<h1 align="center">Supplier Details</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Supplier ID</th>
<th>Name</th>
<th>City</th>
<th>Department</th>
<th>Material Name</th>
<th>Cost per unit</th>
<th>Number of Units</th>
<th>Status</th>
</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
?>
<tr>
<td><?php echo $row['supplier_id']; ?></td>
<td><?php echo $row['supplier_name']; ?></td>
<td><?php echo $row['s_city']; ?></td>
<td><?php echo $row['dept']; ?></td>
<td><?php echo $row['material_name']; ?></td>
<td><?php echo $row['cost_per_unit']; ?></td>
<td><?php echo $row['no_of_units']; ?></td>
<td><?php echo $row['status']; ?></td>

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

<center><a href="formsup.html"><button>Insert</button></a></center>
</body>
</html>