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
if(isset($_GET['name'])) {
    echo $_GET['name'] ;  
    echo " Category"; // Mobile / Laptop
} else {
    echo "Our Brand";
}
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
            if(isset($_GET['subcat']))
            {
             $id = $_GET['subcat'];

        $sq="select * from subcategory where `category_id` = $id ";
        $csq=mysqli_query($con,$sq);
        
            while($rec=mysqli_fetch_array($csq))
            {

            
    ?>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                        <div class="brand_box">
                            <img src="admin/images/<?php echo $rec['subcategory_image']; ?>" height="100" width="100">
                        
                            <span><?php echo $rec['subcategory_name']; ?></span>
 <a href="subcategoryproduct.php?product=<?php echo $rec['category_id']; ?>&name=<?php echo urlencode($rec['subcategory_name']); ?>" 
class="btn btn-red btn-sm mt-2">
View Products
</a>

                            
                            
                        
                        </div>
                    </div>
                    
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