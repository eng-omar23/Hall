<?php
include ("home.php");
include ("../conn.php");
?>

<!DOCTYPE html>
<html>
<body>
    

<div class="container-lg mt-2">
<div class="card">
  <h5 class="card-header bg-info p-1 text-white">Company Registration</h5>
  <div class="card-body">
  <form action="comprocess.php" id="company_register" method="Post" enctype="multipart/form-data" >
    <div class="row">
      <label class="form-label">Company Name </label>
      <input type="text" name="Name"  class="form-control">
      <label class="form-label">Company Email</label>
      <input type="text" name="Email"  class="form-control">\
      <label class="form-label">Company Addres </label>
      <input type="text" name="Address"  class="form-control">
      <label class="form-label">Company Phone </label>
      <input type="text" name="Phone"  class="form-control">
      <label class="form-label">Company Logo </label>
      <input type="file" name="Logo"  class="form-control">
      <input type="submit" class="btn btn-primary m-2" name="save" value="submit">
      </div>
  </div>
  
	
	</div>
	<div id="displayDataTable" class="mt-3"></div>
	
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
