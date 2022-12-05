<?php
include("home.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users Form</title>
  </head>
  <body>
 <div class="container my-3">
    <div class="d-flex justify-content-between m-2">
      <h1 class="text-center">Users Form</h1>
      <h5 id="state"></h5>
      <button type="button" class="btn btn-dark my-3" id="callModal" data-bs-toggle="modal" data-bs-target="#completeModal"> <i class="fa-solid fa-user-plus"></i>New User</button>
    </div>
    <div id="displayDataTable"></div>
  </div>
    <!-- Insert Model -->
    <div class="modal fade" id="completeModal" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Create user</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
            <div class="form-group">
                  <div style="color:red; font-size: 25px; font-weight: bold;" id="error"> </div>
                </div> 
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your Name">
              </div> 
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter your Email">
              </div> 
              <div class="form-group">
                <label for="pasword">passowrd</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password">
              </div> 
            
              <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type">
                  <option> Choose user Type<option>
                  <option value="Admin">Admin<option>
                  <option value="Business">Business<option>
                  <option value="Customer">Customer<option>
                </select>
              </div>  
          </div>
            </form>
                
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" id="btnsave" onclick="adduser()" >Submit</button>
            <button type="button" class="btn btn-dark" id="btnupdate" onclick="updateDetails()" >Update</button>
            <input type="hidden" id="hiddendata">
            <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>   
</body>
<script>
  $(document).ready(function(){
   
    displayData();
    $("#callModal").click(function(){
      $('#btnsave').show();
      $('#btnupdate').hide();
    }); 
  });
  //display data
  
  function displayData(){
    var displayData="true";
   $.ajax({
    url:"userproccess.php",
    type:'post',
    data:{
      displaysend:displayData

    },
    success:function(data,status){
      $('#displayDataTable').html(data);

     }
  });
}
  function adduser(){
    var name=$('#name').val();
    var pass=$('#password').val();
    var email=$('#email').val();
    var type=$('#type').val(); 
    var save=$('#btnsave').val(); 
    $.ajax({
     url:"userproccess.php",
     type:'post',
    data:{
      name:name,
      pass:pass,
      email:email,
      type:type,
      save:save,
     },
   success:function(data){
        var obj = jQuery.parseJSON(data);
        if (obj.status == 200) {
            displayData();
            $('#completeModal').modal("hide");
        }
        if (obj.status == 404) {
            $('#error').css('display', 'block');
            $("#error").text(obj.message);
        }
     }
    });
  }
    
  //delete record
  function deleteuser(id){
    $.ajax({
      url:"userproccess.php",
      type:"post",
      data:{
        deleteid:id

      },
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
  //get details function
  function GetDetails(id){
    $('#hiddendata').val(id);
    $("#error").val("");
    $.post("userproccess.php",{updateid:id},
    function(data,status){
   var userid=JSON.parse(data);
   var name=$('#name').val(userid.username);
    var pass=$('#password').val(userid.password);
    var email=$('#email').val(userid.email);
    var type=$('#type').val(userid.type); 
    });
    $('#btnsave').hide();
    $('#btnupdate').show();
    $('#completeModal').modal("show");
  }
  
  //onclick update event
  function updateDetails(){
   var name=$('#name').val();
    var pass=$('#password').val();
    var email=$('#email').val();
    var type=$('#type').val(); 
    var update=$('#update').val(); 
     $.post("userproccess.php",{
      name:name,
      pass:pass,
      email:email,
      type:type,
      update:update,

     },function(data){
      var obj = jQuery.parseJSON(data);
        if (obj.status == 200) {
            displayData();
        }
        if (obj.status == 404) {
            $('#error').css('display', 'block');
            $("#error").text(obj.message);
        }
     });

  }

  

  </script>
</html>