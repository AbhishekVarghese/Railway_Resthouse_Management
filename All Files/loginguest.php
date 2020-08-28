<?php
require_once 'connect.php';
 
// Define variables and initialize with empty values
$GID = $password = "";
$GID_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if GID is empty
    if(empty(trim($_POST["GID"]))){
        $GID_err = 'Please enter GID.';
    } else{
        $GID = trim($_POST["GID"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($GID_err) && empty($password_err)){
        // Prepare a select statement
	$sql = "SELECT GID, PASSWORD FROM GUEST_HOUSES WHERE GID = ?";
	
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_GID);
            
            // Set parameters
            $param_GID = $GID;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if GID exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $GID, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(($password == $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the GID to the session */
                            session_start();
                            $_SESSION['GID'] = $GID;
                            $_SESSION['last_login'] = time();
                            header("location: house_profile.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if GID doesn't exist
                    $GID_err = 'No account found with that GID.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
