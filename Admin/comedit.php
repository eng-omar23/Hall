<?php
include ("admin.php");
include ("conn.php");
?>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<style>
	body{
		background-color :whitesmoke;


	}
</style>
<?php
$id=$_GET['id'];
$query =mysqli_query($conn,"select * from company_reg where id='$id'");
if($data=mysqli_fetch_array($query)){
}


?>
	<div id="content">
		<form method="POST" action="pracprocess.php" enctype="multipart/form-data">
        <div class="form-group">

        <input class="form-control" type="hidden" name="id" value="<?php echo $data['id'] ;?>">
        <label>Company Name</label>
        <input class="form-control" type="text" name="Name" value="<?php echo $data['Name'] ;?>">
			</div>  
            <div class="form-group">
            <label>Company Email</label>
            <input class="form-control" type="text" name="Email" value="<?php echo $data['Address']; ?> ">
			</div>
            <div class="form-group">
            <label>Company Address</label>
            <input class="form-control" type="text" name="Address" value="<?php echo $data['phone'] ;?>" >
			</div>
            <div class="form-group">
            <label>Company Phone</label>
            <input class="form-control" type="text" name="Phone"value="<?php echo $data['email'] ;?>">
			</div>          
            <div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="<?php echo $data['company_logo'];?>">
			</div>
            <div class="form-group">
				<input class="form-control" type="file" name="uploadfile2" value="<?php echo $data['Owner_pcture'];?>">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="update">Save Changes</button>
			</div>
</form>
</div>
