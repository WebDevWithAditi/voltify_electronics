<?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/config.php';

$res = null; 

// Fetch data for editing
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($con, "SELECT * FROM subcategory WHERE id='$id'");
    $res = mysqli_fetch_array($result);
}


// Handle update submission
if (isset($_POST['submit_button'])) {
    $sub_id = $_POST['sub_id'];
    $name = $_POST['sub_name'];
    $category_id = $_POST['category_name'];

    // Handle image upload
    if ($_FILES['sub_image']['name'] == '') {
        $image = $_POST['oldimage'];
    } else {
        $image = rand(1,1000) . $_FILES['sub_image']['name'];
        $tmp_img = $_FILES['sub_image']['tmp_name'];
        move_uploaded_file($tmp_img, 'images/' . $image);
    }

    $uq = "UPDATE subcategory SET category_id='$category_id', subcategory_name='$name', subcategory_image='$image' WHERE id='$id'";
    $cuq = mysqli_query($con, $uq);

    if ($cuq) {
        echo '<script>
                alert("Updated successfully");
                window.location="subcategory.php";
              </script>';
    }
}

// Handle delete
if (isset($_GET['del'])) {
    $dq = "DELETE FROM subcategory WHERE id='" . $_GET['del'] . "'";
    $cdq = mysqli_query($con, $dq);
    if ($cdq) {
        echo '<script>
                alert("Deleted successfully");
                window.location="subcategory.php";
              </script>';
    }
}
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Page Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Subcategory</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Subcategory Details</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form method="post" enctype="multipart/form-data">
              <input type="hidden" name="sub_id" value="<?php echo $res['id']; ?>">
              
              <div class="card-body">
                <!-- Category Name Dropdown -->
                <div class="form-group">
                  <label for="categorySelect">Category Name:</label>
                  <select class="form-control" id="categorySelect" name="category_name" required>
                    <?php
                    $cat_query = mysqli_query($con, "SELECT * FROM category");
                    while ($cat = mysqli_fetch_array($cat_query)) {
                      $selected = ($cat['id'] == $res['category_id']) ? 'selected' : '';
                      echo "<option value='{$cat['id']}' $selected>{$cat['category_name']}</option>";
                    }
                    ?>
                  </select>
                </div>

                <!-- Subcategory Name -->
                <div class="form-group">
                  <label for="subName">Subcategory Name:</label>
                  <input type="text" class="form-control" id="subName" name="sub_name" value="<?php echo $res['subcategory_name']; ?>" required>
                </div>

                <!-- Subcategory Image -->
                <div class="form-group">
                  <label for="subImage">Subcategory Image:</label>
                  <div class="mb-2">
                    <img src="images/<?php echo $res['subcategory_image']; ?>" height="100" width="200" alt="Subcategory Image">
                  </div>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="sub_image" id="subImage">
                      <label class="custom-file-label" for="subImage">Choose new image (optional)</label>
                    </div>
                  </div>
                  <input type="hidden" name="oldimage" value="<?php echo $res['subcategory_image']; ?>">
                </div>
              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="submit_button" class="btn btn-primary">Update</button>
                <a href="subcategory.php" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
