<html>
<title>HELLO</title>
<body>
  <h1>~:  Product  :~</h1>

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

$query = "SELECT product_id, product_name, cost, availability FROM product";

$productArray = array();

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {

       array_push($productArray, $row);
    }
  
    if(count($productArray)){

         createXMLfile($productArray);

     }

    /* free result set */
    $result->free();
}


function createXMLfile($productArray){
  
   $filePath = 'pro.xml';

   $dom     = new DOMDocument('1.0', 'utf-8'); 

   $root      = $dom->createElement('product'); 

   for($i=0; $i<count($productArray); $i++){
     
     $empId        =  $productArray[$i]['product_id'];  

     $empName      =  htmlspecialchars($productArray[$i]['product_name']); 

     $empDob    =  $productArray[$i]['cost']; 

     $empDept     =  $productArray[$i]['availability']; 



     $emp = $dom->createElement('emp');

     $emp->setAttribute('product_id', $empId);

     $name     = $dom->createElement('product_name', $empName); 

     $emp->appendChild($name); 

     $cost   = $dom->createElement('cost', $empDob); 

     $emp->appendChild($cost); 

     $availability    = $dom->createElement('availability', $empDept); 

     $emp->appendChild($availability); 
     
 
     $root->appendChild($emp);

   }

   $dom->appendChild($root); 

   $dom->save($filePath); 

 } 





?>


<br>

<a href="pro.xml"><button>XML CODE OF PRODUCT DATABASE</button></a>
<br>
<br>
<a href="formpro.html"><button>INSERT INTO PRODUCT</button></a>

<br>
<br>

<a href="displaypro.php"><button>DISPLAY PRODUCT DATABASE</button></a>

<br>
<br>

<a href="index.php"><button>HOME</button></a>





 </body>
 </html>