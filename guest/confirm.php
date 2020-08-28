<?php
	require_once "connect.php";
	ini_set('session.cache_limiter', 'public');
	session_cache_limiter(false);
	session_start();
 	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die('<p>Connection failed: <p>' . mysqli_connect_error());
	}
	if(isset($_SESSION['GID'])) {
		$G_ID=$_SESSION['GID'];	
	}
	else echo "error";
	$_SESSION['u_id']=$_POST['u_id'];
	$_SESSION['c_in_date']=  $_POST['c_in_date'];
	$aadhar_error=$aadhar="";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//Validate aadhar number
    	if(empty(trim($_POST['u_id']))){
    	    $aadhar_error = "Please enter an aadhar number.";
    	} 
    	elseif(strlen(trim($_POST['u_id'])) != 12){
        	$aadhar_error = "Enter a valid Aadhar number.";
    	}
    	elseif(!is_numeric(trim($_POST['u_id']))){
        	$aadhar_error = "Enter a valid Aadhar number.";
    	}
    	else{
        	$aadhar = trim($_POST['u_id']);
    	}
    }
	if($aadhar!=NULL and $_POST['c_in_date']!=NULL){
		header("location: arrival.php");
	}
	
	
	
?>
<html>
<head><title>Arrival confirmation</title></head>
<body>
<div class="wrapper">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div class="form-group <?php echo (!empty($aadhar_error)) ? 'has-error' : ''; ?>">
                <label>USER ID(AADHAR No.):</label>
                <input type="text" name="u_id" class="form-control" value="<?php echo $aadhar; ?>" >
          
                <span class="help-block"><?php echo $aadhar_error; ?></span>
    </div>
    <!--USER ID(AADHAR No.):  <input type="text" name="u_id" required><br>-->
    BOOKED CHECK-IN DATE: <input type="date" name="c_in_date" required><br>
    <!--<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>  <!--value="<?php echo $_GET['GID']; ?>" -->
    <input type="submit" value="Confirm">
</form>
</div>
</body>
</html>
