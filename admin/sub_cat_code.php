<?php
include 'includes/config.php';

if(isset($_POST['category_id'])){
$category_id = $_POST["category_id"];

$result = mysqli_query($con,"SELECT * FROM subcategory where category_id = $category_id");
?>
<!-- <option value="">Select SubCategory</option> -->
<?php
while($row = mysqli_fetch_array($result)) {
?>
<!-- <option value="< ?php echo $row["sub_id"];?>">< ?php echo $row["subcat_name"];?></option> -->
<option value="<?php echo $row["subcategory_name"];?>"><?php echo $row["subcategory_name"];?></option>
<?php
}    
}
?> 

