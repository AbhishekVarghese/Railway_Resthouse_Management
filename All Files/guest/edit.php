<?php
	require_once "connect.php";
	ini_set('session.cache_limiter', 'public');
	session_cache_limiter(false);
	session_start();
 	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die('<p>Connection failed: <p>' . mysqli_connect_error());
		
	}

	$G_ID=$_POST['GID'];
	
	$contact_error = $contact = $n_ac_room_error = $ac_room_error = $n_ac_room = $ac_room = "";
	$_SESSION['contact']=$_POST['contact'];
	$_SESSION['ac_room']=$_POST['ac_room'];
	$_SESSION['n_ac_room']=$_POST['n_ac_room'];
	
		

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//Validate contact number
		if($_POST['contact']==NULL) {
			$contact_error = "";
		}
		else if(strlen(trim($_POST['contact'])) != 10){
    	    $contact_error = "Contact number must have exactly 10 digits.";
    	} else if(!is_numeric(trim($_POST['contact']))){
    	    $contact_error = "Contact number must contain only digits.";
    	} else{
    	    $contact = trim($_POST['contact']);
    		$contact_error = "";
    	}
    	
    	if($_POST['n_ac_room']==NULL) {
			$n_ac_room_error = "";
		}
    	else if(!is_numeric(trim($_POST['n_ac_room']))){
        	$n_ac_room_error = "Non -ac rooms must contain only digits.";
    	}
    	else{
    	    $n_ac_room = trim($_POST['n_ac_room']);
    		$n_ac_room_error = "";
    	}
    	if($_POST['ac_room']==NULL) {
			$ac_room_error = "";
		}
    	else if(!is_numeric(trim($_POST['ac_room']))){
        	$ac_room_error = "ac rooms must contain only digits.";
    	}
    	else{
    	    $ac_room = trim($_POST['ac_room']);
    		$ac_room_error = "";
    	}
    
    }

	if((($_POST['contact']!=NULL) || ($_POST['ac_room']!=NULL) || ($_POST['n_ac_room']!=NULL)) && empty($contact_error) && empty		($n_ac_room_error) && empty($ac_room_error)){
	    header("location: update.php");
	}    

?>

<html>
<head><title>Edit basic info</title></head>
<body>

	<div class="wrapper">
        <h2>EDIT info</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($contact_error)) ? 'has-error' : ''; ?>">
                <label>Contact No</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $contact; ?>" >
          
                <span class="help-block"><?php echo $contact_error; ?></span>
            </div>
            <div class="form-group" <?php echo (!empty($n_ac_room_error)) ? 'has-error' : ''; ?> ">
                <label>Number of NON-AC Rooms</label>
                <input type="int" name="n_ac_room" class="form-control" value="<?php echo $n_ac_room; ?>" >
                <span class="help-block"><?php echo $n_ac_room_error; ?></span>
            </div>
            <div class="form-group" <?php echo (!empty($ac_room_error)) ? 'has-error' : ''; ?>">
                <label>Number of AC Rooms</label>
                <input type="int" name="ac_room" class="form-control" value="<?php echo $ac_room; ?>">
                <span class="help-block"><?php echo $ac_room_error; ?></span>
            </div>
			<!--<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>  <!--value="<?php echo $_GET["fname"]; ?>" -->
			<input type="submit" value="Update">
</form>
</div>
</body>
</html>

