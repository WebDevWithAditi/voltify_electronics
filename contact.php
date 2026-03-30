
<?php include 'includes/header.php'; ?>
<?php include 'admin/includes/config.php';?> 

<?php 

if(isset($_POST['send']))
{
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $message = $_POST['Message'];

    $query = "INSERT INTO contact (name,email,phone,message) 
              VALUES ('$name', '$phone', '$email', '$message')";

    if(mysqli_query($con, $query))
    {
        echo "<script>alert('Message Sent Successfully'); window.location='index.php';</script>";
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!-- contact -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form class="main_form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input class="form-control" placeholder="Your name" type="text" name="YourName">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input class="form-control" placeholder="Email" type="text" name="Email">
                            </div>
                            <div class=" col-md-12">
                                <input class="form-control" placeholder="Phone" type="text" name="Phone">
                            </div>
                            <div class="col-md-12">
                                <textarea class="textarea" placeholder="Message" name="Message"></textarea>
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
    <!-- end contact -->

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