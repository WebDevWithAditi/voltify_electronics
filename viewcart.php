<?php
session_start();
?>

<h2>Your Cart</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
</tr>

<?php
$total = 0;

if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $item)
    {
        $subtotal = $item['price'] * $item['qty'];
        $total += $subtotal;
?>

<tr>
    <td><img src="admin/images/<?php echo $item['image']; ?>" width="50"></td>
    <td><?php echo $item['name']; ?></td>
    <td>₹<?php echo $item['price']; ?></td>
    <td><?php echo $item['qty']; ?></td>
    <td>₹<?php echo $subtotal; ?></td>
</tr>

<?php
    }
}
?>

<tr>
    <td colspan="4"><strong>Total</strong></td>
    <td><strong>₹<?php echo $total; ?></strong></td>
</tr>

</table>