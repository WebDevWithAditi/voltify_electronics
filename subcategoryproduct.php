

<?php include 'includes/header.php'; ?>
<?php include 'admin/includes/config.php'; ?>

    

    
    <!-- brand -->
    <div class="brand">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                       <h2>
<?php
echo isset($_GET['name']) ? $_GET['name']." Products" : "Our Products";
?>
</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="brand-bg">
            <div class="container">
                <div class="row">

<?php
if(isset($_GET['product']))
    
{
    $id = $_GET['product'];
  
    $sq = "SELECT * FROM product WHERE p_category = '$id'";
   $csq = mysqli_query($con, $sq);

 while($rec1 = mysqli_fetch_array($csq))
    { 
?>
<div class="col-md-12 margin">
    <div class="brand_box" style="display:flex; gap:20px; align-items:center; border:1px solid #ddd; padding:15px; margin-bottom:20px;">

        <!-- LEFT SIDE (IMAGE) -->
        <div>
            <img src="admin/images/<?php echo $rec1['p_photo']; ?>" 
                 style="width:200px; height:200px; object-fit:cover;">

            <!-- PRICE BELOW IMAGE -->
            <h4 style="text-align:center; color:green; margin-top:10px;">
                ₹ <?php echo $rec1['p_price']; ?>
            </h4>
        </div>

        <!-- RIGHT SIDE (DETAILS) -->
        <div style="flex:1;">

            <h3><?php echo $rec1['p_name']; ?></h3>

            <p style="margin-top:10px; color:#555;">
                <?php echo $rec1['p_description']; ?>
            </p>

            <br>
            <a href="cart.php?id=<?php echo $rec1['p_id']; ?>" class="btn btn-red btn-sm">
    Add to Cart
</a>

            <!-- <a href="productdes.php?productdes=<?php echo $rec1['p_id']; ?>" 
               style="background:#ff6600; color:white; padding:8px 15px; text-decoration:none;">
               View Details
            </a> -->

        </div>

    </div>
</div>
                    <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                        <div class="brand_box">
                        
                            <img src="admin/images/<?php echo $rec1['p_photo']; ?>" height="100" width="100">
                            <img src="admin/images/<?php echo $rec1['p_photo1']; ?>" height="100" width="100">
                        
                            <span><?php echo $rec1['p_name']; ?></span>

                             <td><a href="productdes.php?productdes=<?php echo $rec1['p_category']; ?>" class="btn btn-red btn-sm mt-2">Product Description </a></td>
    
                        
                        </div>
                    </div> -->
                    
                    <?php
                
} }
        

?>

                    <div class="col-md-12">
                        <a class="read-more">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end brand -->
    
<?php include 'includes/footer.php'; ?>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>