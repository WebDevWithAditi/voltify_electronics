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
        <div class="row align-items-center">
            
            <div class="col-md-5">
                <div class="about_img">
                    <img src="images/aboutus.jpg" class="img-fluid rounded">
                </div>
            </div>

            <div class="col-md-7">
                <div class="about_box">
                    <h2>About Our Store</h2>
                    <p>
                        Welcome to our Electronics Store – your one-stop solution for all modern gadgets and home electronics. 
                        We provide a wide range of products including mobiles, laptops, televisions, accessories, and home appliances.
                    </p>

                    <div class="row mt-3">
    <div class="col-6">
        <p>📱 Smartphones</p>
        <p>💻 Laptops</p>
        <p>📺 LED TVs</p>
        <p>🎧 Accessories</p>
    </div>
    <div class="col-6">
        <p>❄️ Air Conditioners</p>
        <p>🧺 Washing Machines</p>
        <p>🧊 Refrigerators</p>
        <p>⌚ Smart Watches</p>
    </div>
</div>
                    <p>
                        Our goal is to deliver high-quality products at the best prices with trusted service and customer satisfaction.
                    </p>
                </div>
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

