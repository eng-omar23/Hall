<?php
include ("home.php");
include ("../conn.php");
$id=$_GET['id'];
$query =mysqli_query($conn,"select * from company_reg where id='$id'");
if($data=mysqli_fetch_array($query)){
}


?>
		<div class="container-lg mt-2">
<div class="card">
  <h5 class="card-header bg-info p-1 text-white">Company Registration</h5>
  <div class="card-body">
  <form action="comprocess.php" id="company_register" method="Post" enctype="multipart/form-data" >
    <div class="row">
	<input type="hidden" name="id"  class="form-control" value="<?php echo $data['id'] ?>">
      <label class="form-label">Company Name </label>
      <input type="text" name="Name"  class="form-control" value="<?php echo $data['Name'] ?>">
      <label class="form-label">Company Email</label>
      <input type="text" name="Email"  class="form-control" value="<?php echo $data['email'] ?>">
      <label class="form-label">Company Addres </label>
      <input type="text" name="Address"  class="form-control" value="<?php echo $data['Address'] ?>">
      <label class="form-label">Company Phone </label>
      <input type="text" name="Phone"  class="form-control" value="<?php echo $data['phone'] ?>">
      <label class="form-label">Company Logo </label>
      <input type="file" name="Logo"  class="form-control">
      <input type="submit" class="btn btn-primary m-2" name="save" value="submit">
      </div>
  </div>
</form>
</div>
