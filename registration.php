<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link rel="stylesheet" type="text/css" href ="css/bootstrap.min.css">
</head>

<body>
    <div>
        <?php
        if(isset($_POST['create'])){
            $fName       =        $_POST['fName']; // fName is name given in form 
            $lName       =        $_POST['lName'];
            $email      =        $_POST['email'];
            $password   =        md5($_POST['password']);
            
            $sql = "INSERT INTO users(fName, lName, email, password) VALUES(?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$fName,$lName,$email,$password]);
            if($result){
                echo 'Successfully saved.';
            }else{
                echo 'There were errors while saving the data.';
            }
        }
        ?>
    </div>
    <div>
        <form action="registration.php" method="POST">
            <div class="container">

                <div class="row">
                    <div class="col-sm-3">
                    <h3>Registration Form </h1>
                    <p>Please! Fill Up The Form With Correct Details.</p>
                    <hr class="mb-3">

                    <label for="fName"><b>First Name</b></label>
                    <input type="text" class="form-control" name="fName" id="fName" placeholder="Enter your first name" required>
                    
                    <label for="lName"><b>Last Name</b></label>
                    <input type="text" class="form-control" name="lName" id="lName" placeholder="Enter your last name" required>
                     <label for="email"><b>Email</b></label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email ID" required>

                    <label for="password"><b>Password</b></label>
                    <input type="Password" name="password" id="password" class="form-control"
                     placeholder="Enter your password" required>

                    <label for="confirm_pasword"><b>Confirm Password</b></label><span id="confirm_password_error"></span>
                    <input type="password" name="confirm_password" id="confirm_pasword" class="form-control"
                        placeholder="Re-enter your password" required>

                    <hr class="mb-3">
                    <input type="submit" name="create" class="btn btn-primary" value="Sign Up">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>