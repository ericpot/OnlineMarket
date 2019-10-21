<center>
<?php echo @$_GET['mes']; ?>
<h1> Checkout Page </h1>
<table border = 1>
<tr><th colspan=8>Items in your shopping cart </th></tr>
<tr><<th>Item</th><th>Description</th><th>Price</th><th>Quantity</th><th>Image</th><th>Total Price</th><th>Grand Total</th>

<?php
// connect to database

$servername = "localhost";
$username = "root";
$password = "TIC2601";
$database = "OnlineMarket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
 
echo "Connected successfully";

$sql = "select Carts.productID, Products.productName, Products.description, Carts.qty, Products.price, Products.image from Carts inner join Products on Carts.productID = Products.productID";
$result = $conn->query($sql);

while($row = mysqli_fetch_array($result))
{
    $id = $row['Carts.productID'];
    $name = $row['Products.productName'];
    $desc = $row['Products.description'];
    $price = $row['Products.price'];
    $quantity = $row['Carts.qty'];
    $image = $row['Products.image'];
    //Total price of row
    $qprice = $row['Carts.qty'] * $row['Products.price'];
    // total price of items in cart
    $total += $row['Carts.qty'] * $row['Products.price'];

?>

<td><?php echo $name; ?></td><td><?php echo $desc ?></td><td><?php echo $price ?></td><td><?php echo $quantity; ?> </td><td><img src="image/<?php echo $image ?>"width=50 height=50 /></td><td><?php echo $qprice ?></td><td><?php echo $total ?></td>

<?php 
}
?>
<tr><th colspan=8>
<form action="oayments.php" method="POST">
<textarea name="addressbox" autocapitalize="on" autocomplete="off" 
autocorrect="off" 
class="textBox" maxlength="140">Type your delivery address</textarea>
<input type="submit" value="I confirm all details are correct! Paynow!" name="submit">
</form>
</th></tr>
</table>
</form>
</center>

<?php

$con = mysqli_connect($servername, $username, $password);
mysqli_select_db($con, $database);

if(isset($_POST['address']))
    $confirmation = $_POST['address'];
else
    $address = '';
    
//$sqlScript = "INSERT INTO forms (addressbox) VALUES ('$address')";
    
    $query = "SELECT * FROM Cust;SELECT * FROM OldCust";
    mysqli_multi_query($con,$query);

    mysqli_close($con);
    
    ?>

/*
<div align="right"><p>Total Price: $<?php echo $total; ?></p>
<a href="checkout.php"><button> I confirm that my details are correct!  </button>
<a href="index.php"><button> Take me to Payment </button></div>
*/
