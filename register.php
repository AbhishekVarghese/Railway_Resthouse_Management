<?php

require_once "connect.php"; //Verifies if MySQL Database is connected or not.

//Creating the required table
//For sake of commit

/* 

Below table is created just for test purpose of raw registration system, alterations are to be made as follows:

-id will be replaced with emp_id, I am planning to create it as random 6 digit number assigned uniquely on each registrations, easy checks can be placed to verify that.
-Aadhar number can be used for non-employee registrations as their unique identification (not sure though)
-More fields like Age, department, location, etc. general information tabs are to be added.
-Email Verification

NOTE: Maintain an update log so that other people editting the script know where the changes are made and work only through PULL REQUESTS, anyway no one should merge to master branch without approval.

*/ 

/*$tab = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
); ";

if(mysqli_query($conn, $tab)) {
    echo "Table created successfully";
}
else {
    echo "Error creating table!" .mysqli_error($conn);
}*/


$username = $pass = $conf_pass = $aadhar = $employee_id = ""; //Initializing the variables
$username_error = $pass_error = $conf_pass_error = $aadhar_error = $employee_id_error = ""; //Initializing error variables

if($_SERVER["REQUEST_METHOD"] == "POST") {

    //Line to be editted if the condition for employee id is changed according to policies.
    
    if(empty(trim($_POST["username"]))) {
        $username_error = "Please enter valid username";
    }
    else {
        $sql = "SELECT id FROM users WHERE username=?";
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
    
    //Validate aadhar number
    if(empty(trim($_POST['aadhar']))){
        $aadhar_error = "Please enter an aadhar number";
    } elseif(strlen(trim($_POST['aadhar'])) != 12){
        $aadhar_error = "Aadhar number must have exactly 12 digits.";
    } elseif(!is_numeric(trim($_POST['aadhar']))){
        $aadhar_error = "Aadhar number must contain only digits.";
    } else{
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
    if(empty(trim($_POST['password']))){
        $pass_error = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $pass_error = "Password must have atleast 6 characters.";
    } else{
        $pass = trim($_POST['password']);
    }
    
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
    // Check input errors before inserting in database
    if(empty($username_error) && empty($pass_error) && empty($conf_pass_error) && empty($aadhar_error)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, loggedin) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_username, $param_password, $param_logged);
            
            // Set parameters
            $param_logged = 1;
            $param_username = $username;
            $param_password = password_hash($pass, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: index.php");
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
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
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>" required>
                <span class="help-block"><?php echo $username_error; ?></span>
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="bday" class="form-control">
            </div>
            <div class="form-group <?php echo (!empty($aadhar_error)) ? 'has-error' : ''; ?>">
                <label>Aadhar Number</label>
                <input type="text" name="aadhar"class="form-control" value="<?php echo $aadhar; ?>" required>
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
