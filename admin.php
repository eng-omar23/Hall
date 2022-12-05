<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hall Booking</title>
     
		
    
    <style>
        body{
            font-family: monospace, monospace;
            font-size: 17px;
        }
        .navbar{
            font-family: monospace, monospace;
            font-size: 18px;
        }
        .logo {
            cursor: pointer;
            font-size: 20px;
            padding: 0 15px;
            letter-spacing: 2px;
        }

        .readmore a {
            font-size: 18px;
            font-family: sans-serif;
            color: #f48282;
        }
        .container-fluid{
            width: 95vw;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="Dashboard.php"><span style="color: blue;">Hall</span>Booking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-info active" aria-current="page" href="Dashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Registration
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="companyReg.php">Company</a></li>
                            <li><a class="dropdown-item" href="customers.php">Halls</a></li>
                            <li><a class="dropdown-item" href="employee.php">Facility</a></li>
                            <li><a class="dropdown-item" href="members.php">Schedule</a></li>
                            
                            <li><a class="dropdown-item" href="users.php">Users</a></li>
                         
                            
                
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        customers
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="expense.php">Register</a></li>
                            <li><a class="dropdown-item" href="Fees.php">Bill</a></li>
                            <li><a class="dropdown-item" href="sales.php">Payment</a></li>
                            <li><a class="dropdown-item" href="payroll.php">Booking</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            View Reports
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="sales_rpt.php">Booking Report</a></li>
                            
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link mx-2" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>

