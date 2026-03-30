<?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/config.php';

// GET ID
$id = "";
if(isset($_GET['edt'])){
    $id = $_GET['edt'];
}

// FETCH DATA
$res = mysqli_query($con,"SELECT * FROM product WHERE p_id='$id'");
$rec = mysqli_fetch_array($res);

// UPDATE
if(isset($_POST['upd_btn']))
{
  $id = $_POST['id'];
  $p_name = mysqli_real_escape_string($con,$_POST['p_name']);
  $p_price = $_POST['p_price'];
  $p_description = mysqli_real_escape_string($con,$_POST['p_description']);
  $p_category = $_POST['p_category'];
  $p_sub_category = $_POST['p_sub_category'];

  // IMAGE 1
  if($_FILES['p_photo']['name']==''){
    $p_photo = $_POST['oldimage'];
  } else {
    $p_photo = rand(1000,9999).$_FILES['p_photo']['name'];
    move_uploaded_file($_FILES['p_photo']['tmp_name'], "images/".$p_photo);

    if(!empty($_POST['oldimage'])){
        unlink("images/".$_POST['oldimage']);
    }
  }

  // IMAGE 2
  if($_FILES['p_photo1']['name']==''){
    $p_photo1 = $_POST['oldimage1'];
  } else {
    $p_photo1 = rand(1000,9999).$_FILES['p_photo1']['name'];
    move_uploaded_file($_FILES['p_photo1']['tmp_name'], "images/".$p_photo1);

    if(!empty($_POST['oldimage1'])){
        unlink("images/".$_POST['oldimage1']);
    }
  }

  $uq="UPDATE product SET 
        p_name='$p_name',
        p_price='$p_price',
        p_description='$p_description',
        p_category='$p_category',
        p_sub_category='$p_sub_category',
        p_photo='$p_photo',
        p_photo1='$p_photo1'
        WHERE p_id='$id'";

  if(mysqli_query($con,$uq)){
    echo "<script>alert('Updated Successfully'); window.location='product_show.php';</script>";
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
<h3>Edit Product</h3>
</div>

<form method="post" enctype="multipart/form-data">
<div class="card-body">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>Product Name</label>
<input type="text" class="form-control" name="p_name" value="<?php echo $rec['p_name']; ?>" required>
</div>

<div class="form-group">
<label>Price</label>
<input type="number" class="form-control" name="p_price" value="<?php echo $rec['p_price']; ?>" required>
</div>

<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="p_description"><?php echo $rec['p_description']; ?></textarea>
</div>

<div class="form-group">
<label>Category</label>
<select class="form-control" name="p_category" id="category-dropdown">
<?php
$resu=mysqli_query($con,"SELECT * FROM category");
while($record=mysqli_fetch_array($resu)){
?>
<option value="<?php echo $record['id']; ?>" <?php if($rec['p_category']==$record['id']) echo 'selected'; ?>>
<?php echo $record['category_name']; ?>
</option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Sub Category</label>
<select class="form-control" name="p_sub_category" id="sub-category-dropdown">
<option value="<?php echo $rec['p_sub_category']; ?>"><?php echo $rec['p_sub_category']; ?></option>
</select>
</div>

<div class="form-group">
<label>Image 1</label><br>
<img src="images/<?php echo $rec['p_photo']; ?>" height="80"><br>
<input type="file" name="p_photo">
<input type="hidden" name="oldimage" value="<?php echo $rec['p_photo']; ?>">
</div>

<div class="form-group">
<label>Image 2</label><br>
<img src="images/<?php echo $rec['p_photo1']; ?>" height="80"><br>
<input type="file" name="p_photo1">
<input type="hidden" name="oldimage1" value="<?php echo $rec['p_photo1']; ?>">
</div>

</div>

<div class="card-footer">
<button type="submit" name="upd_btn" class="btn btn-primary">Update</button>
</div>

</form>
</div>

</div>
</div>
</div>
</section>
</div>

<?php include('includes/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
</script>