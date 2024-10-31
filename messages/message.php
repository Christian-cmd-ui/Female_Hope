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
            font-family: "Bahnschrift Light", "Bernard MT Condensed", "Berlin Sans FB Demi", "Bell MT";
            width: 100%;
            height: 100vh;
            background-image: url(../pic/Pic4.jpg);
            background-size: cover;
            color: #000;
        }
        h1 {
            font-size: 50px;
            text-align: center;
            padding-top: 60px;
            color: #fff;
        }
        #left, #right {
            width: 48%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 10px;
        }
        #left {
            float: left;
        }
        #right {
            float: right;
        }
        #last {
            clear: both;
        }
        .text-primary {
            color: #007bff;
        }
        .text-danger {
            color: #dc3545;
        }
        .font-weight-bold {
            font-weight: bold;
        }
        .font-italic {
            font-style: italic;
        }
        .btn {
            font-size: 24px;
        }
        .alert {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <h1 class="text-capitalize">Messages</h1>
    <hr>

    <?php 
    include("../connection.php");
    session_start();
    $d_email = $_SESSION['email'];

    if (isset($_POST["submit"])) {
        $m_id = $_POST['m_id'];
        $pid = $_POST['pid'];
        $sid = $_POST['sid'];
        $text = $_POST['text'];

        if (empty($pid)) {
            $error_msg = "Enter Your ID";
        } elseif (empty($sid)) {
            $error_msg = "Enter This Id";
        } else {
            $u_query = "INSERT INTO message(pid, sid, text) VALUES('$pid', '$sid', '$text')";
            mysqli_query($db, $u_query);
            $update_msg = "Message Sent";
            echo "<script>alert('Your Message Has Been Sent Successfully');</script>";
        }
    }
    ?>

    <div id="left">
        <h2 class="text-primary">Messages sent to Doctor's</h2>
        <hr>
        <span class="text-primary font-italic"> 
        <?php
        $email = $_SESSION['email'];
        $echo_user_text = "SELECT message.date AS udate, message.text AS mtext, schedule.s_id AS dsid, user.f_name AS fname, user.l_name AS lname, doctor.f_name AS dfname, doctor.l_name AS dlname FROM doctor JOIN schedule ON schedule.d_id=doctor.id JOIN message ON schedule.s_id=message.sid JOIN user ON user.id=message.pid WHERE user.email='$email'";
        $run_user_text = mysqli_query($db, $echo_user_text);
        while ($drow = mysqli_fetch_array($run_user_text)) {
            echo $drow['fname'] . " " . $drow['lname'];
            ?>
            </span> &nbsp;&nbsp;&nbsp;
            <div class="text-danger"><?php echo $drow['mtext']; ?></div> to 
            <?php echo "<a href='../View_Doctor_Appointment_Schedule/appointment_detail.php?s_id={$drow['dsid']}'>{$drow['dfname']} {$drow['dlname']}</a>"; ?> 
            &nbsp;&nbsp;&nbsp;<div></div><br />
            <div class="text-black-50"> on <?php echo $drow['udate']; ?></div><br /><br />
        <?php } ?>
    </div>

    <div id="right">
        <h2 class="text-primary">All the Answers from Doctor's</h2>
        <hr>
        <h3 class="text-capitalize"> 
        <?php
        $echo_doc_text = "SELECT doc_message.date AS ddate, doc_message.d_text AS dmtext, schedule.s_id AS dsid, user.f_name AS fname, user.l_name AS lname, doctor.f_name AS dfname, doctor.l_name AS dlname FROM doctor JOIN schedule ON schedule.d_id=doctor.id JOIN doc_message ON schedule.s_id=doc_message.sid JOIN user ON user.id=doc_message.pid WHERE user.email='$email'";
        $run_doc_text = mysqli_query($db, $echo_doc_text);
        while ($drow = mysqli_fetch_array($run_doc_text)) {
            ?>
        </h3>
        <div>Doctor's ID: <?php echo $drow['dsid']; ?></div>&nbsp;&nbsp;&nbsp;
        <span><?php echo "<a href='../View_Doctor_Appointment_Schedule/appointment_detail.php?s_id={$drow['dsid']}'>{$drow['dfname']} {$drow['dlname']}</a>"; ?></span>&nbsp;&nbsp;&nbsp;
        <div class="text-danger"><?php echo $drow['dmtext']; ?></div>&nbsp;&nbsp;&nbsp; 
        <div>on <?php echo $drow['ddate']; ?></div><br>
        <?php } ?>
    </div>

    <div id="last">   
    <hr>
    <h1 class="text-white">Reply/Send Message</h1>
    <br>
    <form class="text-center" action="message.php" method="POST">
        <h3 class="text-white">Enter Your ID: </h3> 
        <span class="text-white">
        <?php
        $user_pid_show_pquery = "SELECT * FROM user WHERE email='$email'";
        $user_pid_pquery = mysqli_query($db, $user_pid_show_pquery);
        while ($u_p_row = mysqli_fetch_array($user_pid_pquery)) {
            echo $u_p_row['id'];
        } ?>
        </span>
        <div class="form-group">
            <input type="text" class="form-control mx-auto" style="width: 300px;" name="pid" />
        </div>
        <br />
        <h3 class="alert font-weight-bold text-white">Enter Doctor's ID:</h3>
        <div class="form-group">
            <input type="text" name="sid" class="form-control mx-auto" style="width: 300px;" />
        </div>
        <br />
        <h3 class="alert font-weight-bold text-white">Enter Message:</h3>
        <div class="form-group">
            <textarea name="text" class="form-control mx-auto" style="width: 300px;" cols="50" rows="10" placeholder="Enter your message"></textarea>
        </div>
        <br />
        <input type="submit" name="submit" class="btn btn-info" value="Reply"><br />
        <?php if (isset($error_msg)) echo $error_msg; ?>
        <?php if (isset($update_msg)) echo $update_msg; ?>
    </form>

    <div class="container">
        <ul class="pager">
            <li class="center"><a href="../Users/view_user_home_page.php">Back to Home Page</a></li>
        </ul>
    </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
