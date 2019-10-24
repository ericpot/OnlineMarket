<html>
	<head> <title>Product Detail</title> </head>
	<body>
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
	
	<p align = "right">
	<input class="MyButton" type="button" value="Go to wishlist!" onclick="window.location.href='https://en.wikipedia.org/wiki/Wish_list'" />
	<input class="MyButton" type="button" value="Go to Shopping Cart" onclick="window.location.href='https://en.wikipedia.org/wiki/Shopping_cart'" />
	</p>
	<h1><p align="Left">Product Details</p></h1>
	
	<?php
	
	/*Query for adding into cart START here!*/
	if(isset($_GET['AddtoCart'])){
		$sql = "INSERT INTO Carts VALUES (4," .$_GET['productid'].", 1)";
		
		if ($conn->query($sql) === TRUE) {
		echo "Item is added to cart!<br>";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
		}
	}
	/*Query for adding into cart END here!*/
	
	/*Query for adding into wishlist START here!*/
	if(isset($_GET['AddtoWishlist'])){
		$sql = "INSERT INTO Wishlist VALUES (1," .$_GET['productid'].")";
		
		if ($conn->query($sql) === TRUE) {
		echo "Item is added to wishlist!<br>";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
		}
	}
	/*Query for adding into wishlist END here!*/
	
	/*Query to show item details START here*/
	$sql = "SELECT * FROM Products p WHERE productID = " .$_GET['productid'];
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		//echo "id: <br>" . $row["productName"]. " - Name: " . $row["price"]. " " . $row["description"]. "<br>";
		echo "Product Name : " .$row["productName"]. "<br> Price : $" .$row["price"]. "<br> Description : " . $row["description"]. "<br>";
		echo "<img src=\"https://i.ytimg.com/vi/bbIRfQ6K87M/maxresdefault.jpg\" alt = 'Product Image' width = '350' height = '350'>" ;
	}
	} else {
	echo "0 results";
	}
	/*Query to show item details END here*/
	
	$conn->close();
	?>
	
	<form action = "Product detail.php" method = "GET">
		<input type="hidden" name="productid" value="<?php echo $_GET['productid']; ?>"/>
		<input type = "submit" name = "AddtoCart" value = "Add to Cart!"/>
	</form>
	
	<form action = "Product detail.php" method = "GET">
		<input type="hidden" name="productid" value="<?php echo $_GET['productid']; ?>"/>
		<input type = "submit" name = "AddtoWishlist" value = "Add to Wishlist!"/>
	</form>

	</body>
</html>
