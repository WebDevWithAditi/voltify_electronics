<?php include 'includes/header.php';?>
<?php include 'admin/includes/config.php'; ?>

<div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>About</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about -->
    <div class="about">
        <div class="container">
            <div class="row">

            <?php 
                $sq="select * from about_content";
                $csq=mysqli_query($con,$sq);

                while($r=mysqli_fetch_array($csq))
                {
                
                    ?>


                <div class="col-xl-5 col-lg-5 col-md-5 co-sm-l2">
                    <div class="about_img">
                        <!-- <figure><img src="images/about.png" alt="img" /></figure> -->
                         <figure><img src="images/<?php echo $r['image']; ?>" alt="image" /></figure>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 co-sm-l2">
                    <div class="about_box">
                        <span><?php echo $r['title'] ?> </span>
                        <p><?php echo $r['content'] ?> </p>

                    </div>
                </div>
                <?php } ?>



                
            </div>
        </div>
    </div>
    </div>
    <!-- end about -->

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

    <?php include 'includes/footer.php'; ?>
