<html>
<title>HELLO</title>
<body>
  <h1>~:  Supplier  :~</h1>

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

$query = "SELECT supplier_id, supplier_name, s_city, dept, material_name, cost_per_unit, no_of_units, status FROM supplier";

$supplierArray = array();

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {

       array_push($supplierArray, $row);
    }
  
    if(count($supplierArray)){

         createXMLfile($supplierArray);

     }

    /* free result set */
    $result->free();
}


function createXMLfile($supplierArray){
  
   $filePath = 'sup.xml';

   $dom     = new DOMDocument('1.0', 'utf-8'); 

   $root      = $dom->createElement('supplier'); 

   for($i=0; $i<count($supplierArray); $i++){
     
     $supId        =  $supplierArray[$i]['supplier_id'];  

     $supName      =  htmlspecialchars($supplierArray[$i]['supplier_name']); 

     $supScity    =  $supplierArray[$i]['s_city']; 

     $supDept     =  $supplierArray[$i]['dept']; 

     $supMaterial      =  $supplierArray[$i]['material_name']; 

     $supCost     =  $supplierArray[$i]['cost_per_unit']; 

     $supNo     =  $supplierArray[$i]['no_of_units']; 

     $supStatus     =  $supplierArray[$i]['status']; 


     $sup = $dom->createElement('sup');

     $sup->setAttribute('supplier_id', $supId);

     $name     = $dom->createElement('supplier_name', $supName); 

     $sup->appendChild($name); 

     $s_city   = $dom->createElement('s_city', $supScity); 

     $sup->appendChild($s_city); 

     $dept    = $dom->createElement('dept', $supDept); 

     $sup->appendChild($dept); 

     $isbn     = $dom->createElement('material_name', $supMaterial); 

     $sup->appendChild($isbn); 

      $cost_per_unit   = $dom->createElement('cost_per_unit', $supCost); 

     $sup->appendChild($cost_per_unit); 

      $no_of_units   = $dom->createElement('no_of_units', $supNo); 

     $sup->appendChild($no_of_units); 

      $status   = $dom->createElement('status', $supStatus); 

     $sup->appendChild($status); 

     
 
     $root->appendChild($sup);

   }

   $dom->appendChild($root); 

   $dom->save($filePath); 

 } 





?>


<br>

<a href="sup.xml"><button>XML CODE OF SUPPLIER DATABASE</button></a>
<br>
<br>
<a href="formsup.html"><button>INSERT INTO SUPPLIER</button></a>

<br>
<br>

<a href="displaysup.php"><button>DISPLAY SUPPLIER</button></a>

<br><br>

<a href="index.php"><button>HOME</button></a>

 </body>
 </html>