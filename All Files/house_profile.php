<?php
	require_once "connect1.php";
	session_start();
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	if(!$conn) {
					die("Connection failed " . mysqli_connect_error());
			}

	$G_ID =  $_SESSION['GID'];

	ini_set('session.cache_limiter', 'public');
	session_cache_limiter(false);
	session_start();
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	if(!$conn) {
        	die("Connection failed " . mysqli_connect_error());
    	}

	$G_ID =  $_SESSION['GID'];

        if(!isset($_SESSION["GID"]) || empty($_SESSION["GID"])) {
        echo "Please login first";
        header("refresh: 2; url= index_guest.php"); //To be changed to Javascript, standard scripting issues.
        session_destroy();
        exit;
    }

	$sql = "SELECT * FROM GUEST_HOUSES WHERE GID='$G_ID'";
	$result = mysqli_query($conn,$sql);
	if (!$result) {
        	die('<p>query failed: <p>' . mysqli_error());
    	}

	$row=mysqli_fetch_row($result);
	echo "<center><h1>".$row[1]."</h1>".$row[4]." ,".$row[2]."</center>";
	echo "<br><br>";

	echo "<strong>GID:</strong> ".$row[0]."<br>";
	echo "<strong>Contact No: </strong> ". $row[3]."<br>";
	echo "<strong>Number of AC rooms: </strong> ". $row[5]."<br>";
	echo "<strong>Number of Non AC rooms: </strong> ". $row[6]."<br>";
	echo "<strong>Number of booked AC rooms: </strong> ". $row[7]."<br>";
	echo "<strong>Number of booked Non AC rooms: </strong> ". $row[8]."<br>";

   	mysqli_close($conn);
   	function isLoginExpired() {
        $timeout = 100000;
        if(isset($_SESSION["last_login"]) && isset($_SESSION["GID"])) {
            if((time() - $_SESSION["last_login"]) > $timeout) {
                return true;
            }
        }
        return false;
    }
    if(isset($_SESSION["username"]) && isLoginExpired()) {
        header("location: logout.php");
    }

//view current bookings
//change guest_house info
//view future bookings
//confirm arrival of guests
?>
<html>
	<head><title>Profile Page</title>
	<body>


	<form method="post" action="confirm.php">
	<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>
	<button type="submit">Confirm arrival of guests</button>
	</form>
	<form method="post" action="checkout.php">
	<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>
	<button type="submit">Checkout of guests</button>
	</form>
	<form method="post" action="edit.php">
	<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>
	<input type="submit" value="Change Basic info">
	</form>
	<form method="post" action="view.php">
	<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>
	<button type="submit">View recent bookings</button>
	</form>

	<form method="post" action="veto_opt.php">
	<input type="hidden" name="GID" value="<?php echo $G_ID; ?>"> <br>
	<button type="submit">Use veto power</button>
	</form>
	 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--<a class="navbar-brand" href="house_profile.php">Railway Resthouse Management</a>-->
                <a style="text-align: right" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
	</body>
</html>
