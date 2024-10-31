<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Message</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Arial", sans-serif;
            width: 100%;
            height: 100vh;
            background-image: url(../pic/Pic4.jpg);
            background-size: cover;
            background-position: center;
        }
        h1 {
            font-size: 36px;
            text-align: center;
            color: #333;
            padding-top: 60px;
        }
        #container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            align-items: flex-start;
        }
        #left, #right {
            flex: 0 0 48%;
            padding: 20px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }
        #last {
            text-align: center;
            margin-top: 40px;
        }
        ul {
            font-size: 24px;
            list-style-type: none;
            padding: 0;
        }
        .btn-info {
            font-size: 20px;
            width: 200px; /* Reduced button width */
            margin: 0 auto; /* Center the button */
        }
        .alert {
            margin: 10px 0;
        }
        .text-danger {
            font-weight: bold;
        }
        .text-success {
            font-weight: bold;
            color: green;
        }
        .form-control {
            max-width: 300px; /* Reduced width for input fields */
            margin: 0 auto; /* Center the input fields */
        }
    </style>
</head>
<body>
    <h1 class="text-capitalize text-center">Messages</h1>
    <hr>
    
    <?php 
    include("../connection.php");
    session_start();
    $d_email = $_SESSION['email'];

    if(isset($_POST["submit"])) {
        $sid = $_POST['sid'];
        $pid = $_POST['pid'];
        $d_text = $_POST['d_text'];

        if(empty($sid)) {
            $error_msg = "Enter Your ID";
        } elseif(empty($pid)) {
            $error_msg = "Enter This Id";
        } elseif(empty($d_text)) {
            $error_msg = "Select Date";
        } else {
            $d_query = "INSERT INTO doc_message(sid, pid, d_text) VALUES('$sid', '$pid', '$d_text')";
            mysqli_query($db, $d_query);
            $update_msg = "Message Sent";
            if (mysqli_query($db, $d_query)) {
                echo "<script>alert('Your Message Has Been Sent Successfully');</script>";
            } else {
                echo "Error: " . mysqli_error($db);
            }
        }
    }
    ?>

    <div id="container">
        <div id="left">
            <h2 class="text-primary">My replies to patients</h2>
            <hr>
            <div>
                <?php
                $echo_doc_text = "SELECT doc_message.date AS ddate, doc_message.d_text AS dmtext, user.id AS uid, user.f_name AS fname, user.l_name AS lname, doctor.f_name AS dfname, doctor.l_name AS dlname FROM doctor JOIN schedule ON schedule.d_id = doctor.id JOIN doc_message ON schedule.s_id = doc_message.sid JOIN user ON user.id = doc_message.pid WHERE doctor.email='$d_email'";
                $run_doc_text = mysqli_query($db, $echo_doc_text);

                while ($drow = mysqli_fetch_array($run_doc_text)) {
                    echo "<strong>{$drow['dfname']} {$drow['dlname']}</strong>: <span class='text-danger'>{$drow['dmtext']}</span> to <a href='../Admin/user_detail.php?id={$drow['uid']}'>{$drow['fname']} {$drow['lname']}</a> on {$drow['ddate']}<br><br>";
                }
                ?>
            </div>
        </div>

        <div id="right">
            <h2 class="text-primary">All Messages from Patients</h2>
            <hr>
            <div>
                <?php
                $echo_user_text = "SELECT message.date AS udate, message.text AS mtext, user.id AS uid, user.f_name AS fname, user.l_name AS lname FROM doctor JOIN schedule ON schedule.d_id = doctor.id JOIN message ON schedule.s_id = message.sid JOIN user ON user.id = message.pid WHERE doctor.email='$d_email'";
                $run_user_text = mysqli_query($db, $echo_user_text);

                while ($drow = mysqli_fetch_array($run_user_text)) {
                    echo "<strong>Patient's/User's ID: {$drow['uid']}</strong>: <a href='../Admin/user_detail.php?id={$drow['uid']}'>{$drow['fname']} {$drow['lname']}</a> <span class='text-danger'>{$drow['mtext']}</span> on {$drow['udate']}<br><br>";
                }
                ?>
            </div>
        </div>
    </div>

    <div id="last">
        <h1 class="text-warning">Reply/Send Message</h1>
        <form action="d_message.php" method="POST">
            <h3 class="alert font-weight-bold">Enter Your ID:</h3>
            <?php
            $doctor_sid_show_squery = "SELECT * FROM doctor JOIN schedule ON schedule.d_id = doctor.id WHERE email='$d_email'";
            $doctor_sid_squery = mysqli_query($db, $doctor_sid_show_squery);
            while ($d_s_row = mysqli_fetch_array($doctor_sid_squery)) {
                echo "<span>{$d_s_row['s_id']}</span><br>";
            }
            ?>
            <input type="text" name="sid" class="form-control" placeholder="Your ID" required><br>
            <h3 class="alert font-weight-bold">Enter Patient's/User's ID:</h3>
            <input type="text" name="pid" class="form-control" placeholder="Patient/User ID" required><br>
            <h3 class="alert font-weight-bold">Enter Message:</h3>
            <textarea name="d_text" placeholder="Enter your message" class="form-control" cols="50" rows="5" required></textarea><br>
            <input type="submit" name="submit" class="btn btn-info" value="Reply"><br>

            <?php
            if (isset($error_msg)) { echo "<div class='text-danger'>$error_msg</div>"; }
            if (isset($update_msg)) { echo "<div class='text-success'>$update_msg</div>"; }
            ?>
        </form>
        <div class="container">
            <ul class="pager">
                <li class="center border-dark"><a href="../Doctor/doctor_home_page.php">Back to home page</a></li>
            </ul>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
