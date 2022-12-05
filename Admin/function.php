<?php
function
 comAdd($db,$sql)
{
	$query=mysqli_query($db,$sql); 
    
if($query){
       
    return 1;
}
else{
    return 2;
}
}

?>
    


