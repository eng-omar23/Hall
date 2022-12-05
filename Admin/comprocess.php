<?php
require '../conn.php';
error_reporting(0);
$msg = "";
// If upload button is clicked ...
if (isset($_POST['save'])) {
    $cname=$_POST['Name'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    $address=$_POST['Address'];
	$filename = $_FILES["logo"]["name"];
	$tempname = $_FILES["logo"]["tmp_name"];
    $filename2 = $_FILES["manager"]["name"];
	$tempname2 = $_FILES["manager"]["tmp_name"];
	$folder = "./image/" . $filename;
    $folder2 = "./image/" . $filename2;

	$query=mysqli_query($conn,
     "INSERT INTO company_reg  
     VALUES (null,'$cname','$address','$phone','$email','$folder','$folder2') ") ;
 
    if($query){
        if(move_uploaded_file($tempname, $folder)){
            echo "<h4> successfuly uploaded </h4>";

        }
       if(move_uploaded_file($tempname2, $folder2)){
             echo "<h4> successfuly uploaded</h4>";
        }
       
     else{
        echo "<h4> Failed uploaded</h4>";
     }
     header("location:comRegister.php");
    }
    else{
        echo "<h4> Failed uploaded</h4>";
    }



}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $cname=$_POST['Name'];
    $email=$_POST['Email'];
    $phone=$_POST['Phone'];
    $address=$_POST['Address'];
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
    $filename2 = $_FILES["uploadfile2"]["name"];
	$tempname2 = $_FILES["uploadfile2"]["tmp_name"];
	$folder = "./image/" . $filename;
    $folder2 = "./image/" . $filename2;
    $query=mysqli_query($conn,"update company_reg set Name='$cname',
    Address='$address',
    phone='$phone',
    email='$email',  
    company_logo='$filename',
    Owner_pcture='$filename2'
    where id='$id' ");
    if($query){
        if(move_uploaded_file($tempname, $folder)){
            echo "<h4> successfuly uploaded </h4>";

        }
       if(move_uploaded_file($tempname2, $folder2)){
             echo "<h4> successfuly uploaded</h4>";
        }
       
     else{
        echo "<h4> Failed uploaded</h4>";
     }
     header("location:practice.php");

    }

    else{
        echo "<h4> Failed To Update</h4>";
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
        <th scope="col">Manager</th>
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
  
        <td><img src="<?php echo $rows['company_logo']?>"/></td>
        
        <td><img src="<?php echo $rows['Owner_pcture']?>"/></td>
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
