<?php
//Connection for database
$mysqli = new mysqli("localhost", "root", "", "database");

/* check connection */
if ($mysqli->connect_errno) {

   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

//Select Database
$sql = "SELECT * FROM product";
$result = $mysqli->query($sql);
?>
<!doctype html>
<html>
<body>
<h1 align="center">Product Details</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Product ID</th>
<th>Name</th>
<th>Cost</th>
<th>Availability</th>
</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
?>
<tr>
<td><?php echo $row['product_id']; ?></td>
<td><?php echo $row['product_name']; ?></td>
<td><?php echo $row['cost']; ?></td>
<td><?php echo $row['availability']; ?></td>
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
</table><br><br>

<center><a href="formpro.html"><button>Insert</button></a></center>

</body>
</html>