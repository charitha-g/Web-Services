<html>
<title>HELLO</title>
<body>
  <h1>~:  Employee  :~</h1>

 <style>
body
{
 text-align:center;
 width:100%;
 margin:0 auto;
 padding:0px;
 font-family:helvetica;
 background-color:#81DAF5;

 background: url(image.jpeg) no-repeat center center fixed; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}
#wrapper
{
 text-align:center;
 margin:0 auto;
 padding:0px;
 width:995px;
}
h1
{
 margin-top:150px;  
 color:white;
 font-size:45px;
}
</style>
</head>
<body>
<div id="wrapper">
</div>
</body>

 



<?php

/** create XML file */ 
$mysqli = new mysqli("localhost", "root", "", "database");

/* check connection */
if ($mysqli->connect_errno) {

   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

$query = "SELECT employee_id, employee_name, dob, dept, join_date FROM employee";

$employeeArray = array();

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {

       array_push($employeeArray, $row);
    }
  
    if(count($employeeArray)){

         createXMLfile($employeeArray);

     }

    /* free result set */
    $result->free();
}


function createXMLfile($employeeArray){
  
   $filePath = 'emp.xml';

   $dom     = new DOMDocument('1.0', 'utf-8'); 

   $root      = $dom->createElement('employee'); 

   for($i=0; $i<count($employeeArray); $i++){
     
     $empId        =  $employeeArray[$i]['employee_id'];  

     $empName      =  htmlspecialchars($employeeArray[$i]['employee_name']); 

     $empDob    =  $employeeArray[$i]['dob']; 

     $empDept     =  $employeeArray[$i]['dept']; 

     $empJoin_date      =  $employeeArray[$i]['join_date']; 



     $emp = $dom->createElement('emp');

     $emp->setAttribute('employee_id', $empId);

     $name     = $dom->createElement('employee_name', $empName); 

     $emp->appendChild($name); 

     $dob   = $dom->createElement('dob', $empDob); 

     $emp->appendChild($dob); 

     $dept    = $dom->createElement('dept', $empDept); 

     $emp->appendChild($dept); 

     $isbn     = $dom->createElement('join_date', $empJoin_date); 

     $emp->appendChild($isbn); 
     
 
     $root->appendChild($emp);

   }

   $dom->appendChild($root); 

   $dom->save($filePath); 

 } 





?>


<br>

<a href="emp.xml"><button>XML CODE OF EMPLOYEE DATABASE</button></a>
<br>
<br>
<a href="formemp.html"><button>INSERT INTO EMPLOYEE</button></a>

<br>
<br>

<a href="display1.php"><button>DISPLAY EMPLOYEE DATABASE</button></a>

<br>
<br>

<a href="index.php"><button>HOME</button></a>



 </body>
 </html>