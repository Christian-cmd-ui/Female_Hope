<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Connexion Docteur</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('../pic/Pic4.jpg');
            background-size: cover;
            background-position: center;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .footer-links {
            text-align: center;
            margin-top: 20px;
        }
        .footer-links a {
            color: #007bff;
            text-decoration: none;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php
error_reporting(0);
session_start();
include("connection.php");
include ('..translate.php');

if(isset($_POST['submit'])){

$d_id=$_POST['id'];
$d_pswd=$_POST['pswd'];
$d_email = $_POST['email'];  
if(empty($d_email) || empty ($d_pswd))
{
$error_msg="filled all the requirements";
}
//elseif($d_query="select* from doctor where  email='$d_email'  AND pswd='$d_pswd' AND permission='Pending'")
//{
//$error_msg="Wait for  Admins Approval";

//}
else

{

$d_query="select* from doctor where  email='$d_email'  AND pswd='$d_pswd' AND permission='Approved' OR  email='$d_email'    AND pswd='$d_pswd' AND permission='Added'";
	$check=mysqli_query($db,$d_query);
	
	if(mysqli_num_rows($check)>0)
	/*if($_POST['id']=='$id' && $_POST['pswd']=='$pswd')*/
	
	{
	$check_drow= mysqli_fetch_assoc($check);
	$_SESSION['email']=$check_drow['email'];
	//$_SESSION['id']=$check_drow['id'];
	echo "<script> window.location='doctor_home_page.php' </script> ";
	}
	
else
{
$invalid_msg="Invalid email / password / Not Approved/Added by Admin ";
}
}
}
?>

    <div class="login-container">
        <h2 class="login-title text-center">Psychologist Login</h2>
        <form action="doctor_login.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your e-mail" required>
            </div>
            <div class="form-group">
                <label for="pswd">Password</label>
                <input type="password" class="form-control" name="pswd" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="submit" value="login" class="btn btn-custom btn-block">Connection</button>
        </form>
        <div class="footer-links">
            <p>Not yet a Member ?<a href="doctor_registration.php"><strong>Register</strong></a></p>
            <p><a href="../index.php"><strong>Home page</strong></a></p>
        </div>
        <?php
        if (isset($error_msg)) {
            echo '<div class="alert alert-danger mt-3">' . $error_msg . '</div>';
        }
        if (isset($invalid_msg)) {
            echo '<div class="alert alert-danger mt-3">' . $invalid_msg . '</div>';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
