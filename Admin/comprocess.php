<?php
require '../conn.php';
error_reporting(0);
$msg = "";
if (isset($_POST['save'])) {
    $cname=$_POST['Name'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    $address=$_POST['Address'];
	$filename = $_FILES["Logo"]["name"];
	$tempname = $_FILES["Logo"]["tmp_name"];
	$folder = "../image/".$filename;
if(empty($cname)||empty($email)||empty($phone)||empty($address)){
        ?>
        <script>
            alert("all Fields are required");
            window.location="comRegister.php";
        </script>
        <?php
    }
if(file_exists($folder)){
    exit("file already exits".$folder);
}
else{
    move_uploaded_file($tempname, $folder);

	$query=mysqli_query($conn,
    "INSERT INTO company_reg  
    VALUES (null,'$cname','$address','$phone','$email','$folder')") ;
    if($query){    

     header("location:comRegister.php");
    }  
    else{
        echo "<h4> Query Failed</h4>";
    }  
} 
        }


      



if(isset($_POST['update'])){
    $id=$_POST['id'];
    $cname=$_POST['Name'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    $address=$_POST['Address'];
	$filename = $_FILES["Logo"]["name"];
	$tempname = $_FILES["Logo"]["tmp_name"];
	$folder = "../image/" . $filename;
	$folder = "../image/".$filename;
if(empty($cname)||empty($email)||empty($phone)||empty($address)){
        ?>
        <script>
            alert("all Fields are required");
            window.location="comRegister.php";
        </script>
        <?php
    }
if(file_exists($folder)){
    exit("file already exits".$folder);
}
else{
    move_uploaded_file($tempname, $folder);
	$query=mysqli_query($conn,
    "INSERT INTO company_reg set
    Name='$cname', 
    Address='$address',
    Phone='$phone',
    email='$email',
    company_logo='$folder'
    ");
    if($query){    
     header("location:comRegister.php");
    }  
    else{
        echo "<h4> Query Failed</h4>";
    }  
} 
}
if(isset($_POST['displaysend'])){
?>

	<table class="table table-bordered" id="myTable">
    <thead>
    <tr>
        <th scope="col">#SNO</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Email</th>    
        <th scope="col">Phone</th>
        <th scope="col">Logo</th>    
        <th scope="col">Operation</th>
    </tr>
    </thead>
    <?php
	$SNO=1;
    $query=mysqli_query($conn,"select * from company_reg");
    if(mysqli_num_rows($query)>0){
    while($rows=mysqli_fetch_array($query)){

    ?>

        <td scope="row"><?php echo $SNO ?></td>
        <td><?php echo $rows['Name'];?></td>
        <td><?php echo $rows['Address'];?></td>
        <td><?php echo $rows['email'];?></td>
        <td><?php echo $rows['phone'];?></td>
  
        <td><img style="width: 55px;"src="<?php echo $rows['company_logo']?>"/></td>
<td> 
          <a href="comedit.php?id=<?php echo $rows['id'];?>"class="btn btn-outline btn-dark"><i class="fas fa-edit"></i><a>
		  <button title="Delete" class="btn btn-danger"  onclick="delcom('<?php echo $rows['id'];?>')"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
    </tr>
    <?php
    $SNO++;

    }
    }
    else{
       echo "No data Available";
    }

}

if(isset($_POST['deleteid'])){
    $id=$_POST['deleteid'];
$query =mysqli_query($conn,"delete from company_reg where id='$id'");
if($q){
    $data = ['message'=>'Success', 'status'=>200];
    echo json_encode($data);
    return ;
}
else{
    $data = ['message'=>'Could not delete Item ', 'status'=>404];
    echo json_encode($data);
    return ;
}
}

?>
<script>
    $('document').getready(function(){
        ("#myTable").datatable();

    });
</script>
