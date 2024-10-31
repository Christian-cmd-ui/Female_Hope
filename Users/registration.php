<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <title>Registration</title>
    <style>
        body {
          background-image: url(../pic/Pic4.jpg);
        }
        .container {
            margin-top: 30px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-danger {
            width: 100%;
        }
        hr {
            margin: 30px 0;
        }
        .text-danger {
            color: #d9534f;
        }
        .text-success {
            color: #5cb85c;
        }
    </style>
</head>
<body>

<?php 
include("connection.php");

if(isset($_POST["submit"])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];   
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $DOB = $_POST['DOB'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $maritialstatus = $_POST['maritialstatus'];
    $pswd = $_POST['pswd'];
    $pswd_len = strlen($pswd);
    $d_date = date("y/m/d");

    if(empty($f_name)) {
        $error_msg = "Please Enter Your First Name";
    } elseif(empty($l_name)) {
        $error_msg = "Please Enter Your Last Name";
    } elseif(empty($email)) {
        $error_msg = "Please Enter Your Email Address";
    } elseif(empty($contact)) {
        $error_msg = "Please Enter Your Contact Information";
    } elseif(empty($gender)) {
        $error_msg = "Please Fill Up The Gender";
    } elseif(empty($pswd)) {
        $error_msg = "Please Enter Your Password";
    } elseif($pswd_len <= 8) {
        $error_msg = "Your Password Should Be More Than 8 Characters Long";
    } else {
        $d_query = "INSERT INTO user(f_name, l_name, email, contact, address, DOB, gender, pswd, date)     
                    VALUES('$f_name', '$l_name', '$email', '$contact', '$address', '$DOB', '$gender', '$pswd', '$d_date')";
        mysqli_query($db, $d_query);
        $success_msg = "Thank You For Registration";
        echo "<script> window.location='login.php' </script>";
    }
}
?>

<div class="container">
    <h1 class="text-center">Registration</h1>
    <p class="text-center">Please fill in this form to create an account.</p>
    <hr>

    <form action="registration.php" method="POST">
        <div class="form-group">
            <label for="f_name"><i class="fa fa-user"></i> First Name: *</label>
            <input type="text" class="form-control" name="f_name" placeholder="Enter Your First Name" required>
        </div>
        
        <div class="form-group">
            <label for="l_name"><i class="fa fa-user"></i> Last Name: *</label>
            <input type="text" class="form-control" name="l_name" placeholder="Enter Your Last Name" required>
        </div>
        
        <div class="form-group">
            <label for="email"><i class="fa fa-envelope"></i> Email Address: *</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required>
        </div>
        
        <div class="form-group">
            <label for="contact"><i class="fa fa-address-card-o"></i> Contact Number: *</label>
            <input type="tel" class="form-control" name="contact" placeholder="Enter Your Contact Number" pattern="{9}" required>
        </div>

        <div class="form-group">
            <label for="address"><b>Address:</b></label>
            <textarea class="form-control" name="address" placeholder="Enter Your Address"></textarea>
        </div>

        <div class="form-group">
            <label for="DOB"><b>DOB: *</b></label>
            <input type="date" class="form-control" name="DOB" required>
        </div>

        <div class="form-group">
            <label><i class="fa fa-user"></i> Gender: *</label><br>
            <label class="radio-inline"><input type="radio" name="gender" value="male" required> Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="female" required> Female</label>
        </div>

        <div class="form-group">
            <label><b>Marital Status:</b></label><br>
            <label class="radio-inline"><input type="radio" name="maritialstatus" value="married"> Married</label>
            <label class="radio-inline"><input type="radio" name="maritialstatus" value="single"> Cohabitation</label>
        </div>

        <div class="form-group">
            <label for="pswd"><i class="fa fa-key icon"></i> Create New Password: *</label>
            <input type="password" class="form-control" name="pswd" placeholder="Create Your Password" required>
            <small class="text-muted">Password should be more than 8 characters long.</small>
        </div>

        <button type="submit" class="btn btn-danger text-uppercase" name="submit">Register</button>
    </form>

    <p class="text-center"> <strong> Already a member? <a href="login.php">Login</a></strong></p>
    <h2 class="text-center"><a href="../index.php">Back</a></h2>
    
    <?php
    if (isset($error_msg)) {
        echo "<div class='text-danger text-center'>$error_msg</div>";
    }
    if (isset($success_msg)) {
        echo "<div class='text-success text-center'>$success_msg</div>";
    }
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
