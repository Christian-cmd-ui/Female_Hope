<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <style>
        body {
            background-image: url(../pic/Pic4.jpg);
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #000066;
            color: white;
        }
        .btn-custom:hover {
            background-color: #333;
        }
        .error-msg {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php
error_reporting(0);
session_start();
include("connection.php");

if(isset($_POST['submit'])){

$id=$_POST['id'];
$pswd=$_POST['pswd'];
$email=$_POST['email'];
if(empty($email) || empty ($pswd))
{
$error_msg="filled all the requirements";
}

else

{

$u_query="select* from user where email='$email' AND pswd='$pswd'";
	$check=mysqli_query($db,$u_query);
	
	if(mysqli_num_rows($check)>0)
	/*if($_POST['id']=='$id' && $_POST['pswd']=='$pswd')*/
	
	{
	$check_row= mysqli_fetch_assoc($check);
	$_SESSION['email']=$check_row['email'];
	echo "<script> window.location='view_user_home_page.php' </script> ";
	}
	else
	{
	$invalid_msg="Invalid user email/ password ";
	}

}
}
?>

<div class="login-container">
    <h1 class="text-center">Victim Login</h1>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" placeholder="Enter e-mail" name="email" required>
        </div>
        <div class="form-group">
            <label for="pswd">Password</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="pswd" required>
        </div>
        <button type="submit" name="submit" value="login" class="btn btn-custom btn-block">Login</button>
    </form>
    <p class="text-center mt-3">
        Not Yet A Member? <a href="registration.php"><strong>Register</strong></a><br>
        <a href="../index.php"><strong>Back To Home Page</strong></a>
    </p>
    <?php
    if (isset($error_msg)) {
        echo "<div class='error-msg'>$error_msg</div>";
    }
    if (isset($invalid_msg)) {
        echo "<div class='error-msg'>$invalid_msg</div>";
    }
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
