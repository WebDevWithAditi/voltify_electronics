<?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/config.php';

// DELETE
if(isset($_GET['del'])){
    $id = $_GET['del'];

    mysqli_query($con,"DELETE FROM contact WHERE id='$id'");

    echo "<script>alert('Deleted Successfully'); window.location='contactusdispomato.php';</script>";
}
?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Contact Messages</h1>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="card">

<div class="card-header">
<h3 class="card-title">All Contact Messages</h3>
</div>

<div class="card-body">

<table class="table table-bordered table-hover">
<thead>
<tr>
<th>No</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Message</th>
<th>Delete</th>
</tr>
</thead>

<tbody>

<?php
$co = 1;
$sq = "SELECT * FROM contact";
$csq = mysqli_query($con,$sq);

if(mysqli_num_rows($csq) > 0){
while($r = mysqli_fetch_array($csq)){
?>

<tr>
<td><?php echo $co; ?></td>
<td><?php echo htmlspecialchars($r['name']); ?></td>
<td><?php echo htmlspecialchars($r['email']); ?></td>
<td><?php echo htmlspecialchars($r['phone']); ?></td>
<td><?php echo htmlspecialchars($r['message']); ?></td>

<td>
<a href="contactus.php?del=<?php echo $r['id']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure to delete?')">
Delete
</a>
</td>

</tr>

<?php 
$co++; 
} 
} else {
    echo "<tr><td colspan='6' class='text-center'>No Messages Found</td></tr>";
}
?>

</tbody>

</table>

</div>
</div>
</div>
</section>
</div>

<?php include('includes/footer.php'); ?>