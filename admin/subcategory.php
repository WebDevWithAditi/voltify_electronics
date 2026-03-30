<?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/config.php';
?>

<?php


$res=mysqli_query($con,"select * from subcategory");

if(isset($_POST['sb']))
  {

  $name=$_POST['sub_name'];
  $category_id=$_POST['category_name'];

  $image=rand(1,1000).$_FILES['sub_image']['name'];
  move_uploaded_file($_FILES['sub_image']['tmp_name'],"images/".$image);
  

  $iq="insert into subcategory(category_id,subcategory_name, subcategory_image) values('$category_id','$name','$image')";
  $ciq=mysqli_query($con,$iq);

}
  ?>




<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Category Type</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
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
                <h3 class="card-title">Manage Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name:</label>
                    <select class="form-control" name="category_name">
            <?php
             $resu=mysqli_query($con,"select * from category");

            while($record=mysqli_fetch_array($resu))
            {
              ?>
              
             <option value="<?php echo $record['id'];?>"><?php echo $record['category_name'];?></option> 
             
            <?php
             }
             ?>    
            </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Category Name:</label>
                    <input type="text" width=1000px class="form-control" name="sub_name" id="exampleInputEmail1" placeholder="Enter category name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Sub Category Image:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="sub_image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      </div>
                  </div>

                  

                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="sb" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</div>

<div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
  <div class="row"><div class="col-sm-12 col-md-6"></div>
  <div class="col-sm-12 col-md-6"></div></div>
<div class="row"><div class="col-sm-12">
  <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                  <thead>
                  <tr role="row">
                   
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Sub Category Id</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">category_name</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Sub category_name</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Sub category_image</th>
                     <th>Edit</th>
                    <th>Delete</th>
                  </thead>
                  <tbody>
                    <?php 
	                        	while ($rec=mysqli_fetch_array($res)) {
	                        ?>
		                          <tr>
		                            <td><?php echo $rec['id'] ?></td>
                                <td><?php $a=$rec['category_id'];
                                      $result=mysqli_query($con,"select * from category where id='$a'");
                                         while($r=mysqli_fetch_array($result))
                                         {
                                              echo $r['category_name'];
                                            }  
                                ?>
                                </td>
                                
		                            <td><?php echo $rec['subcategory_name']; ?></td>
                                <td><img src="<?php echo 'images/'. $rec['subcategory_image'];?>"height="100" width="200"/></td>
                    <td><a href="subcategory_edit.php?edit=<?php echo $rec['id']; ?>">Edit</a></td>
                    <td><a href="subcategory_edit.php?del=<?php echo $rec['id']; ?>">Delete</a></td>
              
                     
 
                    
                  
                    </td>
                  </tr>
            
                  <?php
                
                  }
                
                    ?>
                  
                  </tbody>
                  <tfoot>
                  <tr><th rowspan="1" colspan="1">id</th><th rowspan="1" colspan="1">category_name</th>
                  <th rowspan="1" colspan="1">Sub category name</th>
                  <th rowspan="1" colspan="1">sub category image</th>
                  <th rowspan="1" colspan="1">Edit</th>
                  <th rowspan="1" colspan="1">Delete</th>
                  
                  </tfoot>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
</div>
</div>
</div></div>
            <?php include 'includes/footer.php'; ?>