<?php
require_once("../conn.php");
///======================================insert
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];
    $date=date('YYYY-MM-DD');
    $values_type = ['Admin', 'Customer', 'Business' ];
     // Convert the integer to array
     $int_array  = array_map('intval', str_split($pass));
     //get the lenght of the array
     $int_lenght = count($int_array);
    if(empty($name)){
        $data = ['message'=>'name is Required', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    if(is_numeric($name)){
        $data = ['message'=>'name can be digit', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    if(empty($pass)){
        $data = ['message'=>'Password is Required', 'status'=>404];
        echo json_encode($data);
        return ;
    }  
    if(empty($email)){
        $data = ['message'=>'Email is Required', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    if ($int_lenght <= 4) {
        $data = ['message'=>'pass has to be longer 4 numbers', 'status'=>404];
        echo json_encode($data);
        return ;
    }

    if(empty($type)){
        $data = ['message'=>'USER Type Is Required', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    if (!in_array($type, $values_type)) {
        $data = ['message'=>'Not Valid User type', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    
else{
    $name = preg_replace('/[0-9]+/', '', $name);
    $check_user = mysqli_query($conn,"Select * from users where username = '$name' ");
    if(!(mysqli_num_rows($check_user)>0)){
        $query=mysqli_query($conn,"insert into users
        (username,password,email,type,date)
        values('$name','$pass','$email','$type','$date')");
        if($query){
            $data = ['message'=>'succes', 'status'=>200];
            echo json_encode($data);
            return ;
        }
      
        else{
            $data = ['message'=>'Failed to create user', 'status'=>404];
            echo json_encode($data);
            return ;
        }
    }
    else{
        $data = ['message'=>'User already exist', 'status'=>404];
        echo json_encode($data);
        return ;
    }
}
}

$SNO=1;
if(isset($_POST['displaysend'])){
?>

<table class="table table-hover">
    <thead class="table-dark">
    <tr>
        <th scope="col">#SNO</th>
        <th scope="col">Username</th>
        <th>Email</th>
        <th scope="col">User Password</th>
        <th scope="col">User Type</th>      
            <th scope="col">Operation</th>
    </tr>
    </thead>
    <?php

    $query=mysqli_query($conn,"select * from users");
    if(mysqli_num_rows($query)>0){
    while($rows=mysqli_fetch_array($query)){

    ?>

        <td scope="row"><?php echo $SNO ?></td>
        <td><?php echo $rows['username'];?></td>  
        <td><?php echo $rows['email'];?></td>
        <td><?php echo $rows['password']?></td>
    <td><?php echo $rows['type']?></td>
    <td>
<button  title="Update" class="btn btn-dark" onclick="GetDetails('<?php echo $rows['id'];?>')"><i class="fas fa-edit"></i></button>
<button title="Delete" class="btn btn-danger"  onclick="deleteuser('<?php echo $rows['id'];?>')"><i class="fas fa-trash"></i></button>
</td>
    </tr>
    <?php
    $SNO++;

    } 
}
 else{
    $data = ['message'=>'No Data found in users', 'status'=>404];
    echo json_encode($data);
    return ;
}
}
if(isset($_POST['deleteid'])){
    $unique=$_POST['deleteid'];
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$unique'");
    if(mysqli_num_rows($check_user)>0){ 
          $q=mysqli_query($conn,"delete from users where id='$unique'");
          if($q){
            $data = ['message'=>'Succes', 'status'=>200];
            echo json_encode($data);
            return;
          }
          else{
            $data = ['message'=>'Could not delete user', 'status'=>404];
            echo json_encode($data);
            return;
          }
    }else{
        $data = ['message'=>'User does not exist', 'status'=>404];
        echo json_encode($data);
        return ;
    }

}

   //============================-========== GET Details
   if(isset($_POST['updateid'])){
    $user_id=$_POST['updateid'];
    $check = mysqli_query($conn, "SELECT * from users where id = '$user_id'");
    if(mysqli_num_rows($check)>0){
        $q=mysqli_query($conn,"select * from users where id='$user_id'");
        $response=array();
        if($rows=mysqli_fetch_array($q)){
            $response=$rows;
            echo json_encode($response);

        }else{
            $data = ['message'=>'No Data found in users', 'status'=>404];
            echo json_encode($data);
            return;
        }
    }
    else{
        $data = ['message'=>'User does not exist', 'status'=>404];
        echo json_encode($data);
        return;
    }

}

if(isset($_POST['hiddendata'])){
    $id=$_POST['hiddendata'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $type = $_POST['type'];
    $values_type = ['Admin', 'Customer', 'Business' ];
     // Convert the integer to array
     $int_array  = array_map('intval', str_split($pass));
     //get the lenght of the array
     $int_lenght = count($int_array);
    if(empty($name)){
        $data = ['message'=>'name is Required', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    if(is_numeric($name)){
        $data = ['message'=>'name can be digit', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    if(empty($pass)){
        $data = ['message'=>'Password is Required', 'status'=>404];
        echo json_encode($data);
        return ;
    }  
    if(empty($email)){
        $data = ['message'=>'Email is Required', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    if ($int_lenght <= 4) {
        $data = ['message'=>'pass has to be longer 4 numbers', 'status'=>404];
        echo json_encode($data);
        return ;
    }

    if(empty($type)){
        $data = ['message'=>'USER Type Is Required', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    if (!in_array($type, $values_type)) {
        $data = ['message'=>'Not Valid User type', 'status'=>404];
        echo json_encode($data);
        return ;
    }
    
else{
    $name = preg_replace('/[0-9]+/', '', $name);
    $check_user = mysqli_query($conn,"Select * from users where username = '$name' ");
  
    if(mysqli_num_rows($check_user)>0){
        $query=mysqli_query($conn,"update users set username='$name',password='$pass',email='$email',
      type='$type' where id='$id'");
        if($query){
            $data = ['message'=>'succes', 'status'=>200];
            echo json_encode($data);
            return ;
        }
        else{
            $data = ['message'=>'Failed to Update user', 'status'=>404];
            echo json_encode($data);
            return ;
        }
    }
    else{
        $data = ['message'=>'User does not exist', 'status'=>404];
        echo json_encode($data);
        return ;
    }
}
}


?>