<?php

require_once "connect.php"; //Verifies if MySQL Database is connected or not.

//Creating the required table


/*$tab = "CREATE TABLE IF NOT EXISTS USERS (
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    loggedin tinyint(1) NOT NULL DEFAULT 0,
    aadhar INT(12) NOT NULL,
    email VARCHAR(50) NOT NULL,
    hash VARCHAR(32) NOT NULL,
    active int(1) NOT NULL,
    first_time int(2) NOT NULL DEFAULT 0
); ";*/

/*$tab = "ALTER TABLE USERS
        ADD id INT NOT NULL PRIMARY KEY AUTO_INCREMENT";

if(mysqli_query($conn, $tab)) {
    echo "Table created successfully";
}
else {
    echo "Error creating table!" .mysqli_error($conn);
} */

$username = $pass = $conf_pass = $aadhar = $email = ""; //Initializing the variables
$username_error = $pass_error = $conf_pass_error = $aadhar_error = $email_error = $hash = ""; //Initializing error variables

if($_SERVER["REQUEST_METHOD"] == "POST") {

    //Line to be editted if the condition for employee id is changed according to policies.

    if(empty(trim($_POST["username"]))) {
        $username_error = "Please enter valid username";
    }
    else {
        $sql = "SELECT id FROM USERS WHERE username=?";
        if($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1) {
                    $username_erroror = "The username already exists"; //This check however is unnecessary, will be removed in later update
                }
                else {
                    $username = trim($_POST["username"]);
                }
            }
            else {
                echo "Something went wrong, try again!";
            }
        }
        mysqli_stmt_close($stmt);
    }

    //Validate Email Address not working right now.
    $email = trim($_POST['email']);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format";
    }
    //Validate aadhar number
    if(empty(trim($_POST['aadhar']))){
        $aadhar_error = "Please enter an aadhar number";
    } elseif(strlen(trim($_POST['aadhar'])) != 12){
        $aadhar_error = "Aadhar number must have exactly 12 digits.";
    } elseif(!is_numeric(trim($_POST['aadhar']))){
        $aadhar_error = "Aadhar number must contain only digits.";
    }
    else{
        $aadhar = trim($_POST['aadhar']);
    }

    //Validate employee id
    /*if(empty(trim($_POST['employee_id']))){
        $employee_id_error = "Please enter an employee id";
    } elseif(strlen(trim($_POST['employee_id'])) != 6){
        $employee_id_error = "employee id must have exactly 6 digits.";
    } elseif(!is_numeric(trim($_POST['employee_id']))){
        $employee_id_error = "employee id must contain only digits.";
    } else{
        $employee_id = trim($_POST['employee_id']);
    }*/

    // Validate password not necessary.. done in form

    $pass = trim($_POST['password']);

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $conf_pass_error = 'Please confirm password.';
    }
    else {
        $conf_pass = trim($_POST['confirm_password']);
        if($pass != $conf_pass) {
            $conf_pass_error = 'Password did not match.';
        }
    }

    $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
    // Check input errors before inserting in database
    if(empty($username_error) && empty($email_error) && empty($pass_error) && empty($conf_pass_error) && empty($aadhar_error) && (!empty($hash))){

        // Return Success - Valid Email
        //$msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';


        $sql = "INSERT INTO USERS (username, password, aadhar, loggedin, email, first_time, hash) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssisis", $param_username, $param_password, $param_aadhar, $param_logged, $param_email, $param_first, $param_hash);

            // Set parameters
            //$param_empID = $employee_id;
            $param_email = $email;
            $param_hash = $hash;
            $param_aadhar = $aadhar;
            $param_first = 1;
            $param_logged = 1;
            $param_username = $username;
            $param_password = password_hash($pass, PASSWORD_DEFAULT); // Creates a password hash
            //send email to user with verification email

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                //check the data from the url against the data in our database
                // Redirect to login page
                require 'mail/PHPMailerAutoload.php';
                $mail = new PHPMailer;

                //Tell PHPMailer to use SMTP
                $mail->isSMTP();

                $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
                );

                //Enable SMTP debugging
                // 0 = off (for production use)
                // 1 = client messages
                // 2 = client and server messages
                $mail->SMTPDebug = 2;

                //Ask for HTML-friendly debug output
                $mail->Debugoutput = 'html';

                //Set the hostname of the mail server
                $mail->Host = 'smtp.gmail.com';
                // use
                // $mail->Host = gethostbyname('smtp.gmail.com');
                // if your network does not support SMTP over IPv6

                //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                $mail->Port = 587;

                //Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = 'tls';

                //Whether to use SMTP authentication
                $mail->SMTPAuth = true;

                //Username to use for SMTP authentication - use full email address for gmail
                $mail->Username = "no-reply@iitgoa.ac.in";

                //Password to use for SMTP authentication
                $mail->Password = "donotreply";

                $mail->setFrom('no-reply@iitgoa.ac.in','Ministry of Railways');
                $mail->addAddress($email, $username);
                $mail->Subject = 'Signup | Verification' ;
                $mail->Body = '
                Thanks for signing up!
                Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

                ------------------------
                Username: '.$username.'
                Password: '.$pass.'
                ------------------------

                Please click this link to activate your account:
                http://www.yourwebsite.com/verify.php?email='.$email.'&hash='.$hash.'

                '; // Our message above including the link'

                //send the message, check for errors
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    echo "Message sent!";
                }
                //header("location: index.php");
            }
            else {
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        var_dump(mysqli_error($conn));
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
    <script>
    function empCheck() {
        var check = document.getElementById("empCh");
        var inp = document.getElementById("empIn");

        if(check.checked == true) {
            inp.disabled = false;
        }
        else {
            inp.disabled = true;
        }
    }
    </script>
</head>
<body>
    <div class="wrapper">
        <!--Prints the day, date, month, year, time, AM or PM-->
        <?php echo date("l jS \of F Y h:i:s A") . "<br>";?>
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                <span class="help-block"><?php echo $username_error; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>">
                <label>Email Id</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" required>
                <span class="help-block"><?php echo $email_error; ?></span>
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="bday" class="form-control" required>
            </div>
            <div class="form-group <?php echo (!empty($aadhar_error)) ? 'has-error' : ''; ?>">
                <label>Aadhar Number</label>
                <input type="text" name="aadhar"class="form-control" value="<?php echo $aadhar; ?>" required>
                <span class="help-block"><?php echo $aadhar_error; ?></span>
            </div>
            <input type="checkbox" id="empCh" onclick="empCheck()"/> Check if you're Railway Employee.
            <div class="form-group <?php echo (!empty($aadhar_error)) ? 'has-error' : ''; ?>">
                <label>Employee ID</label>
                <input type="text" name="empid" id="empIn" disabled="true" class="form-control" value="<?php echo $aadhar; ?>" required>
                <span class="help-block"><?php echo $aadhar_error; ?></span>
            </div>
            <!--<div class="form-group  echo (!empty($pass_error)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<ph echo $pass; ?>">
                <span class="help-block">< echo $pass_error; ?></span>
            </div>-->
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password"  class="form-control" value="<?php echo $pass; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
            </div>
            <div class="form-group <?php echo (!empty($conf_pass_error)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $conf_pass; ?>" required>
                <span class="help-block"><?php echo $conf_pass_error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Already have an account? <a href="index.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
