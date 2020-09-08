<html>
<title>insert to database</title>
<body>
<?php
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$cost = $_POST['cost'];
$availability = $_POST['availability'];
if (!empty($product_id) || !empty($product_name) || !empty($cost) || !empty($availability)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "database";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT product_id From product Where product_id = ? Limit 1";
     $INSERT = "INSERT Into product (product_id, product_name, cost, availability) values(?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $product_id);
     $stmt->execute();
     $stmt->bind_result($product_id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $product_id, $product_name, $cost, $availability);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already has this product_id";
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
<a href="indexpro.php"><button>CHECK</button></a>

</body>
</html>