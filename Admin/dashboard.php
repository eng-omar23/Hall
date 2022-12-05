<?php

    include("admin.php");

       /* //Declaration For Members
        $allMembers = "";
        $activeMembers = "";
        $inactiveMembers = "";
        
        //Declaration For Fees
        $allFees = "";
        $paidFees = "";
        $dueFees = "";
        
        //Declaration For Sales
        $allSales = "";
        $paidSales = "";
        $dueSales = "";
        
        //Declaration For Payrolls
        $allPayroll = "";
        $paidPayroll = "";
        $duePayroll = "";
        
        //Declaration For Expenses
        $allExpenses = "";
        $paidExpenses = "";
        $dueExpenses = "";
        
        //Declaration For Expenses
        $allItems = "";
        $allcost = "";
?>
<?php
        
       // **********%*%*%*%*%*%*%*%*%*%*%*Logic for Fees
        //**********************Getting Total Amount
            $query=mysqli_query($conn,"SELECT sum(amount) as Total FROM fees");
            if($rows=mysqli_fetch_assoc($query)){
                $allFees = $rows['Total'];
            }
            else{
                $allFees = "0";
            }
        //**********************Getting Paid Amount
 
        $query = mysqli_query($conn,"SELECT sum(amountPaid) as TotalPaid FROM fees;");
        if($rows=mysqli_fetch_assoc($query)){
                $paidFees = $rows['TotalPaid'];
            }
            else{
                $paidFees = "0";
            }
        //**********************Getting Due Amount
            $query = mysqli_query($conn,"SELECT sum(amountDue) as TotalDue FROM fees;");
            if($rows=mysqli_fetch_assoc($query)){
                    $dueFees  = $rows['TotalDue'];
               }
            else{
                $dueFees = "0";
            }         
    

    ?>

<?php
        
        // **********%*%*%*%*%*%*%*%*%*%*%*Logic for Members
         //**********************Getting Total members
             $query=mysqli_query($conn,"SELECT count(*) as Total FROM members;");
             if($rows=mysqli_fetch_assoc($query)){
                 $allMembers = $rows['Total'];
             }
             else{
                 $allMembers = "0";
             }
         //**********************Getting active members
  
         $query = mysqli_query($conn,"SELECT count(*) as Total FROM members  where mem_status = 'Enabled'");
         if($rows=mysqli_fetch_assoc($query)){
                 $activeMembers = $rows['Total'];
             }
             else{
                 $activeMembers = "0";
             }
         //**********************Getting inactive members
             $query = mysqli_query($conn,"SELECT count(*) as Total FROM members  where mem_status = 'Disabled'");
             if($rows=mysqli_fetch_assoc($query)){
                     $inactiveMembers  = $rows['Total'];
                }
             else{
                 $inactiveMembers = "0";
             }         
     
 
     ?>

<?php
        
            // **********%*%*%*%*%*%*%*%*%*%*%*Logic for Sales
            //**********************Getting Total Sales
             $query=mysqli_query($conn,"SELECT sum(total_amount) as Total FROM sales");
             if($rows=mysqli_fetch_assoc($query)){
                 $allSales = $rows['Total'];
             }
             else{
                 $allSales = "0";
             }
         //**********************Getting paid sales
  
         $query = mysqli_query($conn,"SELECT sum(amountPaid) as TotalPaid FROM sales");
         if($rows=mysqli_fetch_assoc($query)){
                 $paidSales = $rows['TotalPaid'];
             }
             else{
                 $paidSales = "0";
             }
         //**********************Getting Sales Due
             $query = mysqli_query($conn,"SELECT (sum(total_amount)-sum(amountPaid)) as TotalDue FROM sales");
             if($rows=mysqli_fetch_assoc($query)){
                     $dueSales  = $rows['TotalDue'];
                }
             else{
                 $dueSales = "0";
             }         
     
 
     ?>


<?php
    //**********%*%*%*%*%*%*%*%*%*%*%*Logic for Payroll
    //**********************Getting Total Amount
   // $query=mysqli_query($conn,"select count(*) as Totalemployee from employee;");
   // if($rows=mysqli_fetch_assoc($query)){
    
            $allPayroll = $rows['Totalemployee'];
        
    }
    else{
        $allPayroll = "0";
    }
    //**********************Getting Paid Amount
   // $query=mysqli_query($conn,"SELECT sum(amount) as Paid FROM employee_payroll;");
    if($rows=mysqli_fetch_assoc($query)){
    
            $paidPayroll =  $rows['Paid'];
        
    }
    else{
        $paidPayroll = "0";
    }

?>
<?php
    //**********%*%*%*%*%*%*%*%*%*%*%*Logic for Items
    //**********************Getting Total Items
   // $query=mysqli_query($conn,"select count(*) as totalItems from items_details");
    if($rows=mysqli_fetch_assoc($query)){
    
            $allItems = $rows['totalItems'];
        
    }
    else{
        $allItems = "0";
    }
    //**********************Getting Item cost
    $query=mysqli_query($conn,"SELECT sum(cost) as Paid FROM items_details");
    if($rows=mysqli_fetch_assoc($query)){
    
            $allcost =  $rows['Paid'];
        
    }
    else{
        $allcost = "0";
    }
    //**********************Getting Total Amount
    $query=mysqli_query($conn,"SELECT sum(amount) as Total FROM expenses;");
    if($rows=mysqli_fetch_assoc($query)){
            $allExpenses =$rows['Total'];
    }
    else{
        $allExpenses = "0";
    }
?>
<style>
    .bg_op{
        opacity: 90%;
    }
</style>
*/
?>

<div class="container-fluid mt-3">
  <div class="row row-cols-lg-3  row-cols-lg-3 g-1">
        <div class="col">
            <div class="p-5 bg-dark text-white border rounded bg_op">
                <center>
                    <div class="icon"><i class="fa-solid fa-people-line"></i></div>
                    <h4>Customers Info</h4>
                    <hr>
                    <br>
                    Total members &Gg; <?php //echo //$allMembers; ?> <br><br><br>
                    Active Members &Gg; <?php //echo //$activeMembers; ?> <br><br><br>
                    Inactive members &Gg; <?php //echo //$inactiveMembers; ?> <br><br>
                    <div class="readmore"><a href="members.php">Read More &Rightarrow; </a></div>
                </center>
            </div>
        </div>
        <div class="col">
            <div class="p-5 bg-dark text-white border rounded  bg_op">
                <center>
                    <div class="icon"><i class="fa-solid fa-money-bill"></i></div>
                    <h4>Booking Info</h4>
                    <hr><br>
                    Total Fess &Gg; <?php //echo //$allFees; ?> <br><br><br>
                    Amount Paid &Gg; <?php //echo  //$paidFees; ?> <br><br><br>
                    Amount Due &Gg; <?php  //echo //$dueFees; ?><br><br>
                    <div class="readmore"><a href="fees.php">Read More &Rightarrow; </a></div>
                </center>
            </div>
        </div>
        <div class="col">
            <div class="p-5 bg-dark text-white border rounded bg_op">
                <center> 
                    <div class="icon"><i class="fa-solid fa-people-line"></i></div>
                    <h4>Transaction Info</h4>
                    <hr><br>
                    Total Sales &Gg; <?php //echo //$allSales; ?> <br><br><br>
                    Amount Paid &Gg; <?php //echo //$paidSales; ?> <br><br><br>
                    Amount Due &Gg; <?php //echo //$dueSales; ?><br><br>
                    <div class="readmore"><a href="sales.php">Read More &Rightarrow; </a></div>
                </center>
            </div>
        </div>
    </div>
    <div class="row row-cols-lg-3  row-cols-lg-3 g-1">
        <div class="col">
            <div class="p-3 bg-dark text-white border rounded bg_op">
                <center>      
                    <div class="icon"><i class="fa-solid fa-people-line"></i></div>
                    <h4>Hall Info</h4>
                    <hr><br><br>
                    Total Employees &Gg; < <br><br><br>
                    Amount Paid &Gg; <?php //echo// $paidPayroll; ?> <br><br><br>
                    <!-- Amount Due &Gg; <%= duePayroll %> -->
                    <div class="readmore"><a href="payroll.php">Read More &Rightarrow; </a></div><br><br><br>
                </center>
            </div>
        </div>
        <div class="col">
            <div class="p-3 bg-dark text-white border rounded bg_op">
                <center>
                    <div class="icon"><i class="fa-solid fa-people-line"></i></div>
                    <h4>Notification Info</h4>
                    <hr><br><br>
                    Total Items &Gg; <?php// echo  //$allItems; ?> <br><br><br>
                    Total Cost &Gg; <?php  //echo //$allcost; ?> <br><br><br>
                    <div class="readmore"><a href="items_details.php">Read More &Rightarrow; </a></div><br><br><br>
                </center>
            </div>
        </div>
        <div class="col">
            <div class="p-3 bg-dark text-white border rounded bg_op">
                <center>
                    <div class="icon"><i class="fa-solid fa-people-line"></i></div>
                    <h4>Company Info</h4>
                    <hr><br><br><br><br>
                    Total Expenses &Gg; <?php// echo//$allExpenses; ?> <br><br><br>
                    <div class="readmore"><a href="expense.php">Read More &Rightarrow; </a></div><br><br><br><br>
                </center>
            </div>
        </div>
    </div>
</div>