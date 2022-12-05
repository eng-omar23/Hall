<?php
include ("home.php");
include ("../conn.php");
?>

<!DOCTYPE html>
<html>

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
<body>
	<div id="content">
		<form method="POST" action="comprocess.php" enctype="multipart/form-data">
        <div class="form-group">
        <label>Company Name</label>
        <input class="form-control" type="text" name="Name"  />
			</div>  
            <div class="form-group">
            <label>Company Email</label>
            <input class="form-control" type="text" name="Email" value="" />
			</div>
            <div class="form-group">
            <label>Company Address</label>
            <input class="form-control" type="text" name="Address" value="" />
			</div>
            <div class="form-group">
            <label>Company Phone</label>
            <input class="form-control" type="text" name="Phone" value="" />
			</div>          
            <div class="form-group">
				<input class="form-control" type="file" name="logo" value="" />
			</div>
            <div class="form-group">
				<input class="form-control" type="file" name="manager" value="" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="save">UPLOAD DATA</button>
                
			</div>
		</form>
	</div>
	<div id="displayDataTable"></div>
	
</body>

</html>
<script>
$(document).ready( function () {

	displayData();
   
} );


function delcom(id){
    $.ajax({
      url:"comprocess.php",
      type:"post",
      data:{deleteid:id},
      success:function(data){
        var obj = jQuery.parseJSON(data);
        if (obj.status == 200) {
            displayData();
        }
        if (obj.status == 404) {
            $("#state").text(obj.message);
        }
      
    }
    });
}
function displayData(){
        var displayData="true";
        $.ajax({
            url:"comprocess.php",
            type:'post',
            data:{
            displaysend:displayData

            },
            success:function(data,status){
            $('#displayDataTable').html(data);
            }
        });
    }
</script>
