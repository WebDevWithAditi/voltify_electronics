<?php 
include 'includes/header.php';
 include 'includes/sidebar.php'; 
 include 'includes/config.php'; 
?> 
<?php if(isset($_GET['del'])) { $cdq=mysqli_query($con,"DELETE FROM product WHERE p_id= ' ".$_GET['del']." ' "); } ?>
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
       <section class="content-header"> 
        <div class="container-fluid"> 
            <div class="row mb-2">
                 <div class="col-sm-6">
                    <h1>Product show</h1> 
                </div> </div> </div>
                <!-- /.container-fluid --> 
                </section> <!-- Main content -->
                 <section class="content">
                     <div class="container-fluid">
                         <div class="row"> 
                            <div class="col-12"> 
                                <div class="card"> 
                                    
                                <div class="card-header">
                                     <h3 class="card-title">Product Details Showing</h3> </div> 
                                     <!-- /.card-header --> 
                                      
                                     <div class="card-body"> 
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info"> 
                                            <thead> 
                                                <tr role="row"> <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">P_name</th> 
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">P_category</th> 
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">p_sub_category</th> 
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">p_price</th> 
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">p_description</th> 
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">P_photo</th> 
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">P_photo1</th> 
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Del</th> 
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Edit</th> 
                                            </thead> 
                                        </tr> 
                                        <tbody> 
                                            <?php $sq="select * from product";
                                             $csq=mysqli_query($con,$sq); 
                                             while($r=mysqli_fetch_array($csq))
                                              { ?> 
                                              <tr> 
                                                <td><?php echo $r['p_name']; ?></td>
                                          
                                             <?php $a=$r['p_category'];
                                              $sq1=mysqli_query($con,"select * from category where id='$a'"); 
                                              while($r1=mysqli_fetch_array($sq1))
                                               { ?> 
                                               <td><?php echo $r1['category_name']; ?></td>
                                              <?php 
                                              } ?> 
                                              <td><?php echo $r['p_sub_category']; ?></td> 
                                                 <td><?php echo $r['p_price']; ?></td> 
                                             <td><?php echo $r['p_description']; ?></td> 
                                              <td> <img src="<?php echo'images/'.$r['p_photo'];?>" height="100" width="200"/> </td> 
                                              <td> <img src="<?php echo 'images/'.$r['p_photo1']; ?>" height="100" width="200"/> </td>
                                               <td> <a class="btn btn-danger btn-sm" href="product_show.php?del=<?php echo $r['p_id']; ?>" > Delete</a> </td>
                                                <td> <a class="btn btn-info btn-sm " href="product_update.php?edt=<?php echo $r['p_id']; ?>" >Update</a> </td> 
                                            </tr>
                                         </tbody>
                                          <?php 
                                          } ?>
                                           </table>
                                        </div></div></div></div></div> </div>
                                     </section>
                                     </div> 

                                     <?php include('includes/footer.php'); ?>