<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Login</title>
        <style>
            body{
                font-family: monospace, monospace;
                font-weight: bold;
                color:rgb(59, 58, 58);
            }
        </style>
    </head>
    <body class="bg-dark">
        <form action="loginprocess.php" method="post">
            <div class="vh-100 d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6">
                            <div class="border border-4 border-danger"></div>
                            <div class="card bg-white shadow-lg">
                                <div class="card-body p-5">
                                    <form class="mb-3 mt-md-4">
                                        <h2 class="fw-bold mb-2 text-uppercase ">Sabco Halls <span style="color: rgb(228, 18, 18);">Platfrom</span></h2>
                                        <p class=" mb-5">Please enter your login credentials!</p>
                                        <div class="mb-3">
                                            <label for="username" class="form-label ">User Name</label>
                                            <input type="input" class="form-control" id="username" name="username" placeholder="username">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label ">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-outline-danger" name="btn" id="btn" type="submit">Login</button>
                                        </div>
                                        <br>
                                        <br>
                                        <center>

                                        <div class="mt-3">
                                        <p class=" mb-5">Have  No Account Signup?
                                            <button class="btn btn-outline-danger" name="btnsignup" id="btnsignup" type="submit">Sign up</button>
                                            </p>
                                        </div>
                                                                                    
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>