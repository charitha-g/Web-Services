<html>
<title>insert to database</title>
<body>
<?php
$supplier_id = $_POST['supplier_id'];
$supplier_name = $_POST['supplier_name'];
$s_city = $_POST['s_city'];
$dept = $_POST['dept'];
$material_name = $_POST['material_name'];
$cost_per_unit = $_POST['cost_per_unit'];
$no_of_units = $_POST['no_of_units'];
$status = $_POST['status'];

if (!empty($supplier_id) || !empty($supplier_name) || !empty($s_city) || !empty($dept) || !empty($material_name) || !empty($cost_per_unit) || !empty($no_of_units) || !empty($status)) {
 $host = "localhost";
    $dbname = "root";
    $dbPassword = "";
    $dbsupplier_name = "database";
    //create connection
    $conn = new mysqli($host, $dbname, $dbPassword, $dbsupplier_name);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT supplier_id From supplier Where supplier_id = ? Limit 1";
     $INSERT = "INSERT Into supplier (supplier_id, supplier_name, s_city, dept, material_name, cost_per_unit, no_of_units, status) values(?, ?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $supplier_id);
     $stmt->execute();
     $stmt->bind_result($supplier_id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssss", $supplier_id, $supplier_name, $s_city, $dept, $material_name, $cost_per_unit, $no_of_units, $status);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already has this supplier_id";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>

<br>
<br>
<a href="indexsup.php"><button>CHECK</button></a>

</body>
</html>