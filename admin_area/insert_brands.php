<?php
include('../includes/connect.php');

if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];
    //select data from database to stop repetation
$select_query= "SELECT * FROM `brands` where brand_title = '$brand_title' ";
$result_select = mysqli_query($con,$select_query);
$number = mysqli_num_rows($result_select);
if($number > 0){
    echo "<script>alert('This Brand is already present in the database')</script>";
}else{
    $query= "INSERT INTO `brands` (`brand_title`) VALUES ('$brand_title');    ";
$result = mysqli_query($con,$query);
if($result){
    echo "<script>alert('Brand has been inserted successfully')</script>";
}}
}


?>


<form action="" method="post">
<div class="input-group mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i> </span>
  <input type="text" name="brand_title" class="form-control" placeholder="Insert Brands" aria-label="Insert_brands" aria-describedby="basic-addon1">
</div>
<input type="submit" name="insert_brand" value="Insert Brand" class="btn btn-info rounded-0"></input>
</form>