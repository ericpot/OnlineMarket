<center>
<?php echo @$_GET['mes']; ?>
<h1> Your shopping cart </h1>
<table border = 1>
<tr><th colspan=8>Items in your shopping cart </th></tr>
<tr><th> Delete </th><th>Item</th><th>Description</th><th>Price</th><th>Quantity</th><th>Image</th><th>Total Price</th>



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
    <!-- array of checkbox -->
    <tr><td><input type="checkbox" name="check[]" value="<?php echo $id; ?>" multiple/>
    <td><?php echo $name; ?></td><td><?php echo $desc ?></td><td><?php echo $price ?></td><td><input type="hidden" name="id[]" value="<?php echo $id;?>"/><input type="text" name="quantity[]" value="<?php echo $quantity;?>" size="5" /></td><td><img src="image/<?php echo $image ?>"width=50 height=50 /></td><td><?php echo $qprice ?></td>
    



<?php 
}
    
?>
<tr><th colspan=8><input type="submit" name="submit" value="Update"/></th></tr>
</table>
</form>
</center>
<?php

    $con = mysqli_connect($servername, $username, $password);
    mysqli_select_db($con, $database);

if(isset($_POST['submit']))
{
 if(isset($_POST['quantity']))
 {
    $qty = $_POST['quantity'];
    $ids = $_POST['id'];

    $array = array_combine($quantity, $id);

    foreach($array as $q => $i)
    {
        $query ="update Carts set Carts.qty='$q' where id='$i'";
        mysql_query($query);
        header("location:cartPage.php?mes=Update Quantity Successfully");
    }
 }
}

?>
<?php

$con = mysqli_connect($servername, $username, $password);
mysqli_select_db($con, $database);
{
    if(isset($_POST['submit']))
    {
        if(isset($_POST['check']))
        {
            $dele = $_POST['check'];
            foreach($dele as $del)
            {
                $query = "delete from Products where Products.productID = '$del'";
                if(mysql_query($query))
                {
                    header("location:cartPage.php?mes=item removed successfully");
                }
                else 
                {
                    header("location:cartPage.php?mes= failed to remove item from cart");
                }
            }
        }
    }
}   
?>

<div align="right"><p>Total Price: $<?php echo $total; ?></p></div>
<a href="checkout.php"><button> CHECKOUT </button>
<a href="index.php"><button>Continue Shopping </button>