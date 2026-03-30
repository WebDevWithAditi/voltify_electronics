<?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/config.php';

if(isset($_POST['ins_btn']))
{
  $p_name = mysqli_real_escape_string($con, $_POST['p_name']);
  $p_price = $_POST['p_price'];
  $p_description = mysqli_real_escape_string($con, $_POST['p_description']);
  $p_category = $_POST['p_category'];
  $p_sub_category = $_POST['p_sub_category'];

  // VALIDATION
  if(empty($p_name) || empty($p_price)){
    echo "<script>alert('Please fill all required fields');</script>";
  } else {

    // IMAGE 1
    $p_photo = "";
    if(!empty($_FILES['p_photo']['name'])){
        $p_photo = rand(1000,9999).$_FILES['p_photo']['name'];
        move_uploaded_file($_FILES['p_photo']['tmp_name'], "images/".$p_photo);
    }

    // IMAGE 2
    $p_photo1 = "";
    if(!empty($_FILES['p_photo1']['name'])){
        $p_photo1 = rand(1000,9999).$_FILES['p_photo1']['name'];
        move_uploaded_file($_FILES['p_photo1']['tmp_name'], "images/".$p_photo1);
    }

    $iq = "INSERT INTO product(p_name,p_price,p_description,p_category,p_sub_category,p_photo,p_photo1) 
    VALUES('$p_name','$p_price','$p_description','$p_category','$p_sub_category','$p_photo','$p_photo1')";

    if(mysqli_query($con,$iq)){
      echo "<script>alert('Product Added Successfully'); window.location='product_show.php';</script>";
    } else {
      echo "<script>alert('Error inserting product');</script>";
    }
  }
}
?>

<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-8">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Add Product</h3>
</div>

<form method="post" enctype="multipart/form-data">
<div class="card-body">

<!-- NAME -->
<div class="form-group">
<label>Product Name</label>
<input type="text" class="form-control" name="p_name" required>
</div>

<!-- PRICE -->
<div class="form-group">
<label>Product Price</label>
<input type="number" class="form-control" name="p_price" required>
</div>

<!-- DESCRIPTION -->
<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="p_description"></textarea>
</div>

<!-- CATEGORY -->
<div class="form-group">
<label>Category</label>
<select class="form-control" name="p_category" id="category-dropdown" required>
<option value="">Select Category</option>
<?php
$resu = mysqli_query($con,"SELECT * FROM category");
while($record = mysqli_fetch_array($resu)){
?>
<option value="<?php echo $record['id'];?>"><?php echo $record['category_name'];?></option>
<?php } ?>
</select>
</div>

<!-- SUB CATEGORY -->
<div class="form-group">
<label>Sub Category</label>
<select class="form-control" name="p_sub_category" id="sub-category-dropdown">
<option value="">Select Sub Category</option>
</select>
</div>

<!-- IMAGE 1 -->
<div class="form-group">
<label>Product Image</label>
<input type="file" name="p_photo" class="form-control">
</div>

<!-- IMAGE 2 -->
<div class="form-group">
<label>Product Image 2</label>
<input type="file" name="p_photo1" class="form-control">
</div>

</div>

<div class="card-footer">
<button type="submit" name="ins_btn" class="btn btn-primary">Submit</button>
</div>

</form>
</div>

</div>
</div>
</div>
</section>
</div>

<?php include('includes/footer.php'); ?>

<!-- AJAX SCRIPT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  $('#category-dropdown').on('change', function(){
    var category_id = this.value;

    $.ajax({
      url: "sub_cat_code.php",
      type: "POST",
      data: {category_id: category_id},
      success: function(result){
        $("#sub-category-dropdown").html(result);
      }
    });
  });
});
</script>