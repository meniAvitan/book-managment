<?php
include 'config/app.php';
include 'codes/auth.php';

$auth->isLoggedIn();

include 'includes/header.php';
include 'includes/navbar.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php include ('message.php') ?>

                <div class="card" style="margin-bottom: 3rem;">
                    <div class="card-header">
                    <h4>Register</h4>
                    </div>
                    
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="md-3">
                                <label for="">First Name</label>
                                <input type="text" name="fname" class="form-control">
                            </div>
                            <div class="md-3">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" class="form-control">
                            </div>
                            <div class="md-3">
                                <label for="">Email Id</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="md-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="md-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirmPassword" class="form-control">
                            </div>
                            <div class="md-3 mt-3">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
</body>
</html>


<?php
include 'includes/footer.php';

?>