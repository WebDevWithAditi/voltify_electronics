<?php include 'includes/header.php'; ?>
<?php include 'admin/includes/config.php'; ?>

  <section class="slider_section">
        <!-- <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel"> -->
         <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel" data-interval="3000">     
        <div class="carousel-inner">
    <?php 
    $sq="select * from dynamic_image";
    $csq=mysqli_query($con,$sq);
    $first = true;

    while($r=mysqli_fetch_array($csq))
    {
    ?>
    <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
        <img class="d-block w-100" src="images/<?php echo $r['image']; ?>" alt="Banner Image" loading="eager">

        <!-- <div class="container">
             <div class="carousel-caption relative">
                <span>All New Phones </span>
                <h1>up to 25% Flat Sale</h1>
                <p>Best mobile deals available now</p>
                <a class="buynow" href="#">Buy Now</a>
            </div> 
        </div> -->
    </div>
    <?php  
    $first = false;  
    }
    ?>
</div> 
            
         
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>

    <!-- about 
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 co-sm-l2">
                    <div class="about_img">
                        <figure><img src="images/about.png" alt="img" /></figure>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 co-sm-l2">
                    <div class="about_box">
                        <h3>About Us</h3>
                        <span>Our Mobile Shop</span>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of It is a long established fact that a reader will be distracted by the </p>

                    </div>
               
            </div>
        </div>
    </div>
    </div>
    end about -->

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

    <div class="why_choose">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Why Choose Us</h2>
                <p>We provide the best service and quality products</p>
            </div>
        </div>

        <div class="row mt-4">

            <div class="col-md-3 text-center">
                <div class="box">
                    <h3>💯</h3>
                    <h5>Genuine Products</h5>
                    <p>100% original branded electronics</p>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="box">
                    <h3>💰</h3>
                    <h5>Best Prices</h5>
                    <p>Affordable and competitive pricing</p>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="box">
                    <h3>🚚</h3>
                    <h5>Fast Delivery</h5>
                    <p>Quick and safe delivery service</p>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="box">
                    <h3>📞</h3>
                    <h5>24/7 Support</h5>
                    <p>Customer support anytime</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Categories -->
<div class="brand">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="titlepage">
                    <h2>Our Categories</h2><br>
                    <p>Explore top-quality electronics and home appliances</p>
                </div>
            </div>
        </div>
    </div>

    <div class="brand-bg">
        <div class="container">
            <div class="row">

            <?php
            $sq="select * from category";
            $csq=mysqli_query($con,$sq);
            
            while($r=mysqli_fetch_array($csq))
            {
            ?>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="brand_box text-center">

                    <div class="image-box">
    <img src="admin/images/<?php echo $r['category_image']; ?>" alt="Category">
</div>
                        
                        <!-- <img src="admin/images/<?php echo $r['category_image']; ?>" class="img-fluid mb-3" style="height:100px;"> -->

                        <h5><strong><?php echo $r['category_name']; ?></strong></h5>
                        <a href="subcategory.php?subcat=<?php echo $r['id']; ?>&name=<?php echo urlencode($r['category_name']); ?>"
                       
   class="btn btn-red btn-sm mt-2">
   View Products
</a>

                        <!-- <a href="subcategorypomato.php?subcat=<?php echo $r['id']; ?>" class="btn btn-warning btn-sm mt-2">
                            View Products
                        </a> -->

                    </div>
                </div>

            <?php
            }
            ?>

                <div class="col-md-12 text-center mt-3">
                    <a class="btn btn-dark">See More Categories</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end Categories -->

<!-- Products -->
<div class="products">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Our Products</h2>
                <p>Explore latest electronics</p>
            </div>
        </div>

        <div class="row">

        <?php
        $sq="select * from product";
        $csq=mysqli_query($con,$sq);

        while($r=mysqli_fetch_array($csq))
        {
        ?>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
              <div class="product_box text-center">

    <div class="product_img">
        <img src="admin/images/<?php echo $r['p_photo']; ?>" alt="Product">
    </div>

    <h5><?php echo $r['p_name']; ?></h5>

    <p class="price">₹<?php echo $r['p_price']; ?></p>

    <a href="cart.php?id=<?php echo $r['p_id']; ?>" class="btn btn-red btn-sm">
    Add to Cart
</a>

</div>
            </div>

        <?php } ?>

        </div>
    </div>
</div>
<!-- end Products -->
 
<!-- clients --> 
 <div class="clients"> 
    <div class="container"> 
        <div class="row">
             <div class="col-md-12">
                 <div class="titlepage"> 
                    <h2>what say our clients</h2> 
                </div> </div> </div> </div> </div> 
                <div class="clients_red">
    <div class="container">
        <div id="testimonial_slider" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                $sq = "SELECT * FROM testimonial";
                $csq = mysqli_query($con, $sq);
                $i = 0;

                while($r = mysqli_fetch_array($csq)) {
                ?>
                <li data-target="#testimonial_slider"
                    data-slide-to="<?php echo $i; ?>"
                    class="<?php if($i == 0) echo 'active'; ?>">
                </li>
                <?php $i++; } ?>
            </ol>


            <!-- Carousel Items -->
            <div class="carousel-inner">

                <?php
                $sq = "SELECT * FROM testimonial";
                $csq = mysqli_query($con, $sq);
                $i = 0;

                while($r = mysqli_fetch_array($csq)) {
                ?>

                <div class="carousel-item <?php if($i == 0) echo 'active'; ?>">
                    <div class="testomonial_section">
                        <div class="full center"></div>

                        <div class="full testimonial_cont text_align_center cross_layout">
                            <div class="cross_inner">

                                <h3>
                                    <?php echo $r['t_name']; ?><br>
                                    <strong class="ornage_color">
                                        <?php echo $r['t_role']; ?>
                                    </strong>
                                </h3>

                                <p><?php echo $r['t_message']; ?></p>

                                <div class="full text_align_center margin_top_30">
                                    <img src="images/<?php echo $r['t_image']; ?>" alt="#">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <?php $i++; } ?>

            </div>

        </div>
    </div>
</div>

                             <!-- The slideshow 
                              <div class="carousel-inner">
                                 <div class="carousel-item">
                                     <div class="testomonial_section">
                                         <div class="full center">
                                             </div> 
                                         <div class="full testimonial_cont text_align_center cross_layout"> 
                                            <div class="cross_inner">
                                                 <h3>Due markes<br>
                                                 <strong class="ornage_color">Rental</strong>
                                                </h3>
                                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess</i> 
                                                </p> 
                                                <div class="full text_align_center margin_top_30"> 
                                                    <img src="icon/testimonial_qoute.png">
                                                 </div> </div> </div> </div> </div> 
                                                 <div class="carousel-item active"> 
                                                    <div class="testomonial_section"> 
                                                        <div class="full center">
                                                             </div> 
                                                             <div class="full testimonial_cont text_align_center cross_layout"> 
                                                                <div class="cross_inner">
                                                                     <h3>Due markes<br>
                                                                     <strong class="ornage_color">Rental</strong></h3> 
                                                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess</i> </p> 
                                                                     <div class="full text_align_center margin_top_30"> 
                                                                        <img src="icon/testimonial_qoute.png"> </div> </div> </div> </div> </div> 
                                                                        <div class="carousel-item"> 
                                                                            <div class="testomonial_section">
                                                                                  <div class="full center"> 

                                                                                 </div> 
                                                                                 <div class="full testimonial_cont text_align_center cross_layout">
                                                                                     <div class="cross_inner"> 
                                                                                        <h3>Due markes<br><strong class="ornage_color">Rental</strong></h3> 
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess</i> </p> 
                                                                                        <div class="full text_align_center margin_top_30"> 
                                                                                            <img src="icon/testimonial_qoute.png">
                                                                                         </div> </div> </div> </div> </div> </div> </div> </div> </div>
                                                                                          end clients -->



    <!-- contact -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Contact us</h2>
                    </div>
                    <form class="main_form" method="POST" action="contact.php">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input class="form-control" placeholder="Your name" type="text" name="Name">
                            </div>
                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input class="form-control" placeholder="Email" type="text" name="Email">
                            </div>
                             <div class=" col-md-12">
                                <input class="form-control" placeholder="Phone" type="text" name="Phone">
                            </div>
                           
                           
                            <div class="col-md-12">
                                <textarea class="textarea" placeholder="Message"></textarea>
                            </div>
                            <div class=" col-md-12">
                                <button class="send" name="send">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
  <a href="logout.php" class="send btn">Logout</a>
</div>

    
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
    <!-- <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
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
    <script>
$(document).ready(function(){
    $('#myCarousel').carousel({
        interval: 3000,
        ride: 'carousel'
    });
});
</script>
</body>

</html>