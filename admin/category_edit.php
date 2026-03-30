<?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/config.php';

// GET ID
$id = "";
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
}

// FETCH DATA
if (!empty($id)) {
    $res = mysqli_query($con, "SELECT * FROM category WHERE id='$id'");
    $r = mysqli_fetch_array($res);
}

// UPDATE
if (isset($_POST['submit_button'])) {

    $id = $_POST['id'];
    $categoryname = mysqli_real_escape_string($con, $_POST['category_name']);

    if(empty($categoryname)){
        echo "<script>alert('Category name required');</script>";
    } else {

        // IMAGE
        if ($_FILES['category_image']['name'] == '') {
            $image = $_POST['oldimage'];
        } else {
            $image = rand(1000,9999) . $_FILES['category_image']['name'];
            $tmp = $_FILES['category_image']['tmp_name'];

            move_uploaded_file($tmp, 'images/' . $image);

            // DELETE OLD IMAGE
            if(!empty($_POST['oldimage'])){
                unlink("images/" . $_POST['oldimage']);
            }
        }

        $uq = "UPDATE category SET category_name='$categoryname', category_image='$image' WHERE id='$id'";
        mysqli_query($con, $uq);

        echo '<script>
                alert("Updated successfully");
                window.location="category.php";
              </script>';
    }
}

// DELETE
if (isset($_GET['del'])) {
    $del_id = $_GET['del'];

    // GET IMAGE NAME
    $res = mysqli_query($con, "SELECT category_image FROM category WHERE id='$del_id'");
    $row = mysqli_fetch_array($res);

    // DELETE IMAGE FILE
    if(!empty($row['category_image'])){
        unlink("images/" . $row['category_image']);
    }

    mysqli_query($con, "DELETE FROM category WHERE id='$del_id'");

    echo '<script>
            alert("Deleted successfully");
            window.location="category.php";
          </script>';
}
?>

<div class="content-wrapper">
<section class="content-header">
<div class="container-fluid">
<h1>Edit Category</h1>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Update Category</h3>
</div>

<form method="post" enctype="multipart/form-data">
<div class="card-body">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>Category Name:</label>
<input type="text" class="form-control" name="category_name"
value="<?php echo $r['category_name']; ?>" required>
</div>

<div class="form-group">
<label>Category Image:</label><br>

<?php if(!empty($r['category_image'])){ ?>
<img src="images/<?php echo $r['category_image']; ?>" height="100"><br><br>
<?php } ?>

<input type="file" name="category_image" class="form-control">
<input type="hidden" name="oldimage" value="<?php echo $r['category_image']; ?>">
</div>

</div>

<div class="card-footer">
<button type="submit" name="submit_button" class="btn btn-primary">Update</button>
<a href="category.php" class="btn btn-secondary">Cancel</a>
</div>

</form>

</div>

</div>
</div>
</div>
</section>
</div>

<?php include 'includes/footer.php'; ?>