<html>
<head> 
<title>Demo Online Book Catalog</title> 

<style>

table {
border-collapse: collapse;
width: 100%;
color: #FFA500;
font-family: arial;
font-size: 20px;
text-align: left;
}
th {
background-color: #FFA500;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}

</style>

</head>
<body>
<table>
<tr>
<th>Item</th>
<th>Description</th>
<th>Quantity</th>
<th>Price</th>
<th>Product</th>
<th>Remove</th>
<td><input type="checkbox" />    &nbsp;   </td>
</tr>


<?php 
$servername = "localhost";
$username = "root";
$password = "TIC2601";
$database = "OnlineMarket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
echo "Connected successfully";

echo "<br>";
echo "<br>";


$sql = "select Carts.productID, Products.productName, Products.description, Carts.qty, Products.price, Products.image from Carts inner join Products on Carts.productID = Products.productID";
$result = $conn->query($sql);

$sql2 = "select count (Carts.productID) from Carts inner join Product on Cart.productID = Product.productID";
$cart_count = $conn->query($sql2);
//$num = mysql_num_rows($result);

echo "No of items in cart:".$cart_count;
echo "<br>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row["Carts.productID"]. "</td><td>" . $row["Products.productName"] . "</td><td>"
  . $row["password"]. "</tr><td>" . $row["Products.description"] . "</tr><td>" . $row["Carts.qty"] .  "</tr><td>" . $row["Products.price"]. "</tr><td>"  . $row["Products.image"] . "</td></tr>";
  }
  echo "</table>";
  
    //$sql2 = "select count (Carts.productID) from Carts inner join Product on Cart.productID = Product.productID";
    //$cart_count = $conn->query($sql2);
    

    //echo $cart_count; </span></a>
    
  } 
  
  else { echo "<br>"; echo "Your Cart is Empty!"; }
 
 
  $conn->close();
  
?>

</table>
</body>
</html>