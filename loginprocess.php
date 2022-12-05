<?php
use function PHPSTORM_META\type;
include("conn.php");
session_start();
?>
<?php
if(isset($_POST['btn'])){
$username=$_POST['username'];
$password=$_POST['password'];
$_SESSION['username'];
$type="";
$query=mysqli_query($conn,"select * from users where username ='$username' and password='$password'");
if($query){
    $get_type=mysqli_query($conn,"select type from users where username='$username' and password='$password' ");
    if($data=mysqli_fetch_array($get_type)){
        $type=$data['type'];
    switch($type){
        case 'Business':
            header("location:business");
            break;
                case 'Admin':
                    header("location:Admin");
                    break;

                    case 'customer':
                        header("location:customer");
                        break;
                        default :
                        echo "you Do no have Permission to Access this information";



    }
}
    
}

$query=mysqli_query($conn,"select * from users where username ='$username' or password='$password'");
if($query!=1){
    ?>
    <script>
       alert("Check username or password and try again ");
       window.location="login.php";
    </script>
    <?php
}
else{
    ?>
    <script>
       alert("Invalid login Crediantials");
       window.location="login.php";
    </script>
    <?php

}



}

