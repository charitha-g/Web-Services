<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #663300;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: black;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  -webkit-animation: fadeEffect 1s;
  animation: fadeEffect 1s;
}

/* Fade in tabs */
@-webkit-keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}



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

<h1>RWF INTERNSHIP</h1>

<div class="tab">
  <button class="tablinks" onclick="myfunc1()"><p style="color:white;">EMPLOYEE</p></button>
  <button class="tablinks" onclick="myfunc2()"><p style="color:white;">SUPPLIER</p></button>
  <button class="tablinks" onclick="myfunc3()"><p style="color:white;">PRODUCTS</p></button>
</div>

<script>
  function myfunc1()
  {
    location.replace("index1.php")
  }

  function myfunc2()
  {
    location.replace("indexsup.php")
  }

  function myfunc3()
  {
    location.replace("indexpro.php")
  }

</script>
</body>
</html> 
