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
	<h2>Online Market - Add Product</h2>
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
<hr>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<?php
		echo "Title: <input type='text' name='Title'><br>";
		echo "Category: <select name='Category'><option value=''>Select category</option><br>";
		$result = $conn->query("SELECT DISTINCT category FROM Products");
		while ($row = $result->fetch_array()) {
			echo "<option value=\"".$row[0]."\">".$row['category']."</option><br>";
		}
		$result->close();
		echo "</select><br>";
		echo "Desc: <input type: 'text' name='Desc' style='height:100px;width:300px'><br>";
		echo "Price: $ <input type:'number' name='price'><br>";
		echo "Image: <input type: 'file' name='productPic'><br>";
		/*Need to create the PHP script for uploading into the DB
		Limit File Size
		Limit File Type*/
		echo "<input type='submit' value='Create Me!' style='float: right'>";
	?>
	
</form>
	
</body>
</html>