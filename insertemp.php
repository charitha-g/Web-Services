<html>
<title>insert to database</title>
<body>
<?php
$employee_id = $_POST['employee_id'];
$employee_name = $_POST['employee_name'];
$dob = $_POST['dob'];
$dept = $_POST['dept'];
$join_date = $_POST['join_date'];
if (!empty($employee_id) || !empty($employee_name) || !empty($dob) || !empty($dept) || !empty($join_date)) {
 $host = "localhost";
    $dbname = "root";
    $dbPassword = "";
    $dbemployee_name = "database";
    //create connection
    $conn = new mysqli($host, $dbname, $dbPassword, $dbemployee_name);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT employee_id From employee Where employee_id = ? Limit 1";
     $INSERT = "INSERT Into employee (employee_id, employee_name, dob, dept, join_date) values(?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $employee_id);
     $stmt->execute();
     $stmt->bind_result($employee_id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssi", $employee_id, $employee_name, $dob, $dept, $join_date);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already has this employee_id";
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
<a href="index.php"><button>CHECK</button></a>

</body>
</html>