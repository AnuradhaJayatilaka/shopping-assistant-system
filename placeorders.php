<!--
<!DOCTYPE html>
<html>
<head>
 <title> Place Orders </title>
 <link rel="stylesheet" type="text/css" href="login.css">
 
</head>
<body>
<div class="container" >
 <img class="containerimg" src="singhesuper.jpg"/>
 <form method="GET" >
 <div class="form-input">
 <input type="text" name="List of Products" placeholder="Enter the list of products. please press enter after each product"/> 
 </div>
 <div class="form-input">
 <input type="password" name="password" placeholder="password"/>
 </div> -->
 <!-- <input type="submit" type="submit" value="Place Order" class="btn-login"/>
 </form>
 </div>


</body>
</html> -->
<?php

//mysqli connectivity, select database
$connect= new mysqli("127.0.0.1:3308","root","","singhe_super") or die("ERROR:could not connect to the database!!!");

//extract all html field
extract($_POST);
if(isset($save))
{
//store textarea values in <pre> tag
$quantity="<pre>$quantity</pre>";

//insert values in textarea table
$query="insert into textarea values('','$product_name','$quantity')";
$connect->query($query);
echo "Data saved";	

}//click on display button to show all values entered by you
if(isset($disp))
{
	$query="select * from textarea";
	$result=$connect->query($query);
	echo "<table border=1>";
	echo "<tr><th>product_name</th><th>quantity</th></tr>";
	while($row=$result->fetch_array())
		{
		echo "<tr>";
		echo "<td>".$row['product_name']."</td>";
		echo "<td>".$row['quantity']."</td>";
		echo "</tr>";
		}
	echo "</table>";	
}
?>
<style>
input,textarea{width:250px}
textarea{height:200px}
input[type=submit]{width:150px}
</style>
<form method="post">
<table width="200" border="1">
  
  <tr>
    <td>Product Name</td>
    <td><input type="text" name="product_name" placeholder="product name" /></td>
  </tr>
 
  
  <tr>
    <td>Quantity</td>
    <td><textarea placeholder="contents"  name="quantity"></textarea></td>
  </tr>
  <tr>
    <td colspan="2">
		<input type="submit" value="Save" name="save"/>
		<input type="submit" value="Display" name="disp"/>
	</td>
  </tr>
  
</table>
</form>