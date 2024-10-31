<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <title>Doctor Registration</title>
    <style>
        body {
          background-image: url('../pic/Pic4.jpg');
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
    $d_f_name = $_POST['f_name'];
    $d_l_name = $_POST['l_name'];
    $d_email = $_POST['email'];   
    $d_contact = $_POST['contact'];
    $d_specialist = $_POST['specialist'];
    $d_qualification = $_POST['qualification'];
    $d_DOB = $_POST['DOB'];
    $d_gender = $_POST['gender'];
    $d_address = $_POST['address'];
    $d_bmdc_reg_num = $_POST['bmdc_reg_num'];
    $d_pswd = $_POST['pswd'];
    $d_pswd_len = strlen($d_pswd);
    $d_date = date("y/m/d");

    // Validation logic
    if(empty($d_f_name)) {
        $error_msg = "Please Enter Your First Name";
    } elseif(empty($d_l_name)) {
        $error_msg = "Please Enter Your Last Name";
    } elseif(empty($d_email)) {
        $error_msg = "Please Enter Your Email Address";
    } elseif(!filter_var($d_email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Please Enter A Valid Email Address";
    } elseif(empty($d_contact)) {
        $error_msg = "Please Enter Your Contact Information";
    } elseif(empty($d_specialist)) {
        $error_msg = "Please Enter Your Specialism";
    } elseif(empty($d_qualification)) {
        $error_msg = "Please Enter Your Qualification";
    } elseif(empty($d_DOB)) {
        $error_msg = "Please Enter Your Date Of Birth (DOB)";
    } elseif(empty($d_gender)) {
        $error_msg = "Please Fill Up The Gender";
    } elseif(empty($d_bmdc_reg_num)) {
        $error_msg = "Please Provide Your BMDC Registration Number";
    } elseif(!filter_var($d_bmdc_reg_num, FILTER_VALIDATE_INT)) {
        $error_msg = "Please Enter A Valid Number for BMDC Registration";
    } elseif(empty($d_pswd)) {
        $error_msg = "Please Enter Your Password";
    } elseif($d_pswd_len <= 8) {
        $error_msg = "Your Password Should Be More Than 8 Characters Long";
    } else {
        $d_query = "INSERT INTO doctor(f_name, l_name, email, contact, specialist, qualification, DOB, gender, address, bmdc_reg_num, pswd, date, permission)     
                    VALUES('$d_f_name', '$d_l_name', '$d_email', '$d_contact', '$d_specialist', '$d_qualification', '$d_DOB', '$d_gender', '$d_address', '$d_bmdc_reg_num', '$d_pswd', '$d_date', 'Pending')";
        mysqli_query($db, $d_query);
        $success_msg = "Thank You For Registration. Please Wait For Admin's Approval.";
    }
}
?>

<div class="container">
    <h1 class="text-center">Doctor Registration</h1>
    <p class="text-center">Please fill in this form to create an account.</p>
    <hr>

    <form action="doctor_registration.php" method="POST">
        <div class="form-group">
            <label for="f_name"><i class="fa fa-user"></i> First Name: *</label>
            <input type="text" class="form-control" name="f_name" placeholder="Enter Your First Name" required>
        </div>
        
        <div class="form-group">
            <label for="l_name"><i class="fa fa-user"></i> Last Name: *</label>
            <input type="text" class="form-control" name="l_name" placeholder="Enter Your Last Name" required>
        </div>
        
        <div class="form-group">
            <label for="email"><b>Email Address: *</b></label>
            <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required>
        </div>
        
        <div class="form-group">
            <label for="contact"><b>Contact Number: *</b></label>
            <input type="tel" class="form-control" name="contact" placeholder="Enter Your Contact Number" pattern="[0-9]{11}" required>
        </div>

        <div class="form-group">
            <label for="specialist"><b>Specialist: *</b></label>
            <select name="specialist" class="form-control" required>
                <option value="Orthopedic">Orthopedic</option>
                <option value="Gynecologist">Gynecologist</option>
                <option value="Dentist">Dentist</option>
                <option value="Medicine">Medicine</option>
                <option value="Cardiologist">Cardiologist</option>
                <option value="Cardiac Electrophysiologist">Cardiac Electrophysiologist</option>
                <option value="Surgeon">Surgeon</option>
            </select>
        </div>

        <div class="form-group">
            <label for="qualification"><b>Qualification: *</b></label>
            <input type="text" class="form-control" name="qualification" placeholder="Enter Your Designation" required>
        </div>
        
        <div class="form-group">
            <label for="DOB"><b>DOB: *</b></label>
            <input type="date" class="form-control" name="DOB" required>
        </div>

        <div class="form-group">
            <label><b>Gender: *</b></label><br>
            <label class="radio-inline"><input type="radio" name="gender" value="male" required> Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="female" required> Female</label>
        </div>

        <div class="form-group">
            <label for="address"><b>Hospitals/Clinic Address: *</b></label>
            <input type="text" class="form-control" name="address" placeholder="Enter Clinic/Hospital Address" required>
        </div>

        <div class="form-group">
            <label for="bmdc_reg_num"><b>BMDC Registration Number: *</b></label>
            <input type="text" class="form-control" name="bmdc_reg_num" placeholder="Enter Your Registration Number" required>
            <p><strong>Only input numeric numbers (e.g., 1, 2, 3).</strong></p>
        </div>

        <div class="form-group">
            <label for="pswd"><i class="fa fa-key icon"></i> Create New Password: *</label>
            <input type="password" class="form-control" name="pswd" placeholder="Create Your Password" required>
            <p><strong>Password should be more than 8 characters long.</strong></p>
        </div>

        <button type="submit" class="btn btn-danger text-uppercase" name="submit">Register</button>
    </form>

    <p class="text-center"><strong>Already a Member? <a href="doctor_login.php">Login</a></strong></p>
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
