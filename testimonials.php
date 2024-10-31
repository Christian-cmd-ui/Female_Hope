<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Female_Hopes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
.testimonials {
  padding: 100px 0;
}
.testimonials h3 {
  margin-bottom: 20px;
}
.testimonials .card {
  border-bottom: 3px #007bff solid !important;
  transition: 0.5s;
  margin-top: 60px;
}
.testimonials .card i {
  background-color: #007bff;
  color: #ffffff;
  width: 75px;
  height: 75px;
  line-height: 75px;
  margin: -40px auto 0 auto;
}

input[type=text]:focus {
    width: 100%;
}
  .container {
      padding: 80px 120px;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(60%);
      filter: grayscale(60%); /* make all photos black and white */ 
      width: 50%; /* Set width to 100% */
      margin: auto;
      height: 50%;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;
  font-size:24px;}
  .bg-1 p {font-style:oblique;
  font-size:20px;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  

  .nav-tabs li a {
      color:#999999;
  } 
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 16px !important;
	    font-weight:900;
      letter-spacing: 2px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 22px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
  color:#FFFF66;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }    footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color:#999999;
  }  .container-fluid {
      padding: 5px 20px;
  }
  </style></head>

  <?php
	   include("connection.php");
error_reporting(0);
 $queryPermission="WHERE permission='Approved'";
  $show_number_pending_request_query = "SELECT * 
                  FROM doctor $queryPermission 
				";
				   $run = mysqli_query($db, $show_number_pending_request_query);
				   $count=mysqli_num_rows($run);
	

 

?>
<?php    $queryPermission="WHERE permission='Approved' || permission='Added' ";
       $show_approve_request_query = "SELECT * 
                  FROM doctor WHERE permission='Approved' || permission='Added'
				 ";
$n_query=mysqli_query($db,$show_approve_request_query );
                              while($drow = mysqli_fetch_array($n_query))
				                  {}
								    $count=mysqli_num_rows($n_query);
								  ?>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid ">
    <div class="navbar-header">
      <a class="navbar-brand text-dark" href="index.php"><strong>Female_hopes</strong></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">LogIn <span class="caret"></span></a>
          <ul class="dropdown-menu">
                  <li><a href="Doctor/doctor_login.php">As a Doctor</a></li>
                  <li><a href="Users/login.php">As User</a></li>
            	<li><a href="Admin/adminlogin.php">As Admin</a></li>
                  </ul>
          </li>
        <!-- <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#location">Hospital Location  <span class="caret"></span></a>
          <ul class="dropdown-menu"> 
          <li> <a href="location map/dhaka.html">Dhaka</a></li>
          <li>  <a href='location map/chittagong.html'>Chittagong</a></li>
          <li> <a href="location map/barishal.html">Barishal</a></li>
          <li>  <a href="location map/khulna.html">Khulna</a></li>
          <li>   <a href='location map/mymensingh.html'>Mymensingh</a></li>
          <li>   <a href='location map/rajshahi.html'>Rajshahi</a></li>
          <li>   <a href='location map/rangpur.html'>Rangpur</a></li>
          <li>   <a href='location map/sylhet.html'>Sylhet</a></li>
          </ul>
        </li> -->
        
        
        <!-- <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Doctors
          <span class="caret"></span></a>
          <ul class="dropdown-menu">     
          <li> <a href='medicine.php'>Medicine</a></li>
          <li>  <a href='dentist.php'>Dentist</a></li>
          <li> <a href='bone.php'>Orthopedic</a></li>
          <li> <a href="cardiac_electrophysiologist.php">Cardiac electrophysiologist</a></li>
          <li> <a href='cardiologist.php'>Cardiologist</a></li>
          <li> <a href='surgeon.php'>Surgeon</a></li>
          <li>  <a href='gynecologist.php'>Gynecologist</a></li>
          </ul>
        </li> -->
        <li><a href="disease_prediction.php">Testimonials</a></li>
        <li> <a href="blog/blog_front_page.php" >Blog</a></li>
          
     
   <li> <a href="#contact" onclick="toggleFunction()">Contact Us</a></li>
                
     <li>
       <form action = "search.php" method = "POST">

 <input type = "text" name="f_name" placeholder="Search By Doctor Name..." />
                   <input  type="submit"name="search"  value="GO" />
                       <?php
if(isset($error_msg)){echo $error_msg;}
?>
       </form></li>
       </li> 

      </ul>
    </div>
  </div>
</nav>
<div class="testimonials text-center">

    <div class="container">
      <h3>Testimonials</h3>
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="card border-light bg-light text-center">
            <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
            <div class="card-body blockquote">
              <p class="card-text">I felt heard and understood for the first time in years. Thank you for listening.</p>
              <footer class="blockquote-footer"><cite title="Source Title">Amanda</cite></footer>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card border-light bg-light text-center">
            <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
            <div class="card-body blockquote">
              <p class="card-text">The support I received here helped me find my voice again. I'm forever grateful.</p>
              <footer class="blockquote-footer"><cite title="Source Title">Emily</cite></footer>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card border-light bg-light text-center">
            <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
            <div class="card-body blockquote">
              <p class="card-text">I was trapped, but this platform's resources and guidance set me free. Thank you.</p>
              <footer class="blockquote-footer"><cite title="Source Title">Rachel</cite></footer>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="card border-light bg-light text-center">
            <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
            <div class="card-body blockquote">
              <p class="card-text">I never thought I'd escape, but the advocates here believed in me. Now I'm rebuilding my life.</p>
              <footer class="blockquote-footer"><cite title="Source Title">Jessica</cite></footer>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card border-light bg-light text-center">
            <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
            <div class="card-body blockquote">
              <p class="card-text">This platform's confidentiality and support gave me the strength to leave my abuser. I'm finally safe.</p>
              <footer class="blockquote-footer"><cite title="Source Title">Anonymous</cite></footer>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card border-light bg-light text-center">
            <i class="fa fa-quote-left fa-3x card-img-top rounded-circle" aria-hidden="true"></i>
            <div class="card-body blockquote">
              <p class="card-text">I thought I was alone, but this platform showed me I'm not. Thank you for the courage to keep going.</p>
              <footer class="blockquote-footer"><cite title="Source Title">Sarah</cite></footer>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</body>
</html>