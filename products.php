<?php include 'includes/header.php'; ?>
<?php include 'admin/includes/config.php'; ?>

<div class="container mt-5">

<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sq = "SELECT * FROM products WHERE id='$id'";
    $res = mysqli_query($con, $sq);

    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_array($res);
?>

<div class="row">

    <!-- IMAGE -->
    <div class="col-md-5">
        <?php if(!empty($row['image'])){ ?>
            <img src="admin/images/<?php echo $row['image']; ?>" class="img-fluid border">
        <?php } else { ?>
            <img src="https://via.placeholder.com/300" class="img-fluid">
        <?php } ?>
    </div>

    <!-- DETAILS -->
    <div class="col-md-7">
        <h2><?php echo htmlspecialchars($row['product_name']); ?></h2>

        <h4 class="text-success mt-3">
            ₹ <?php echo number_format($row['price']); ?>
        </h4>

        <p class="mt-3">
            <?php 
            if(!empty($row['description'])){
                echo $row['description'];
            } else {
                echo "No description available.";
            }
            ?>
        </p>

        <br>

        <a href="#" class="btn btn-primary">Add to Cart</a>
        <a href="products.php" class="btn btn-secondary">Back</a>
    </div>

</div>

<?php 
    } else {
        echo "<h3 class='text-center'>Product not found</h3>";
    }
} else {
    echo "<h3 class='text-center'>Invalid Request</h3>";
}
?>

</div>

<?php include 'includes/footer.php'; ?>