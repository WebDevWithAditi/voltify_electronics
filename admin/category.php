<?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/config.php';

// INSERT CATEGORY
if(isset($_POST['sb']))
{
  $a = mysqli_real_escape_string($con, $_POST['category_name']);

  if(empty($a)){
    echo "<script>alert('Please enter category name');</script>";
  } else {

    // IMAGE UPLOAD
    $image = "";
    if(!empty($_FILES['category_image']['name'])){
        $image = rand(1000,9999).$_FILES['category_image']['name'];
        move_uploaded_file($_FILES['category_image']['tmp_name'], "images/".$image);
    }

    $iq = "INSERT INTO category(category_name, category_image) VALUES('$a','$image')";
    mysqli_query($con, $iq);

    echo "<script>alert('Category Added Successfully');</script>";
  }
}
?>

<div class="content-wrapper">
<section class="content-header">
  <div class="container-fluid">
    <h1>Category Type</h1>
  </div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Manage Category</h3>
  </div>

<form method="post" enctype="multipart/form-data">
<div class="card-body">

<div class="form-group">
  <label>Category Name:</label>
  <input type="text" class="form-control" name="category_name" placeholder="Enter category name" required>
</div>

<div class="form-group">
  <label>Category Image:</label>
  <input type="file" class="form-control" name="category_image">
</div>

</div>

<div class="card-footer">
  <button type="submit" name="sb" class="btn btn-primary">Submit</button>
</div>
</form>

</div>

<!-- TABLE -->
<div class="card">
<div class="card-body">

<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Category Name</th>
<th>Image</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>

<tbody>

<?php 
$co = 1;
$sq = "SELECT * FROM category";
$csq = mysqli_query($con, $sq);

while($r = mysqli_fetch_array($csq))
{
?>

<tr>
<td><?php echo $co; ?></td>
<td><?php echo $r['category_name']; ?></td>

<td>
<?php if(!empty($r['category_image'])){ ?>
<img src="images/<?php echo $r['category_image']; ?>" height="80">
<?php } else { echo "No Image"; } ?>
</td>

<td>
<a href="category_edit.php?edit=<?php echo $r['id']; ?>" class="btn btn-info btn-sm">Edit</a>
</td>

<td>
<a href="category_edit.php?del=<?php echo $r['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
</td>

</tr>

<?php
$co++;
}
?>

</tbody>
</table>

</div>
</div>

</div>
</div>
</div>
</section>
</div>

<?php include 'includes/footer.php'; ?>