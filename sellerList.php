<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Online Market - TIC2601</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<style>
* {
	box-sizing: border-box;
}
<!--Styling the header -->
header {
	background-color: #666;
	padding: 30px;
	text-align: center;
	font-size: 35px;
	color: white;
}


img {
border-radius: 50%}

h2 {
	border: 2px solid Navy;
	padding: 10px 15px;
}

.topnav {
	background-color: #3366ff;
	overflow: hidden;
}

.topnav a{
	float: left;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	font-size: 17px;
	
}

.userBox {
	width: 250px;
	height: 50px;
	border: 2px solid #3333ff;
	border-radius: 10px;
	box-sizing: border-box;
	text-align: center;
}

.profilePic {
	border-radius: 50%;
}

<!--id Attribute-->
#p01 {
	color: RoyalBlue;
}

<!--The class attribute-->
p.diffClass {
	color: red;
}

a:visited {
	color: red;
	background-color: transparent;
	text-decoration: underline;
}

a:hover {
	color: green;
	background-color: transparent;
	text-decoration: none;
}

.grid-container {
	display: grid;
	grid-template-columns: auto auto auto;
	background-color: #2196F3;
	padding: 10px;
}

.grid-item {
	background-color: rgba(255, 255, 255, 0.8);
	border: 1px solid rgba(0, 0, 0, 0.8);
	padding: 20px;
	font-size: 30px;
	text-align: center;
}

table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
}

th, td {
	padding: 10px;
}

th {
	text-alignL left;
}

</style>
</head>
<body>

<header>
	<h2>Online Market - Seller Listing</h2>
</header>	

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
?>
<div class="topnav">
	<a class="active" href="#home">Home</a>
	<a href="Page1">Page 1</a>
	<a href="Page2">Page 2</a>
	<a href="Page3">Page 3</a>
	<a href="Page4">Page 4</a>
	<a href="#contact">Contact</a>
	<a href="#about">About</a>
</div>
<br>

<div class = "profilePic">
	<?php
		$filepath = 'A:\Photos\Me\Snoopy_profilepic.jpg alt="Snoopy_profilepic" width="104" height="108"';
		echo '<img src="'.$filepath .'">"';
	?>
	<br>

</div>
<div class = "userBox">
	<?php
		//$_SESSION['username']
		echo "username";
	?>
	<br>
</div>


<button style="float: inline-start">Add products</button>
<hr>

<?php
/*
$_SESSION['userid']
	$_SESSION['username']
*/
$sql = "SELECT u.name, p.productName, p.price, p.image FROM Users u, Products p 
	WHERE u.userID = p.sellerID
	AND p.sellerID = 15";
$result = $conn->query($sql);

//echo "<b>SQL: </b>".$sql."<br><br>";

echo "<table border=\"1\" >
  <col width=\"75%\">
  <col width=\"25%\">
  <tr>
  <th>Image</th>
  <th>Name</th>
  <th>Product</th>
  <th>Price</th>
  </tr>";
 
while ($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>".$row['image']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['productName']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "</tr>";
}
//echo "</table>";
  $result->close();		
?>
</body>
</html>