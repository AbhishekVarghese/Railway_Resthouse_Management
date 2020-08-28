<?php
    include("connect.php");
    session_start();
    //Need to change this later using a prepared statement
    $username = $_SESSION["username"];
    $first = 1;
    $sql = "SELECT first_time FROM users WHERE username = ?";
        
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        // Set parameters
        $param_username = $username;
        if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $first);
                    if(mysqli_stmt_fetch($stmt)) {
                        //echo "Ghusa firse";
                        //echo $first;
                        if($first == 0) {
                            header("location: main.php");
                        }
                    }
                }
                else {
                    echo "Not found";
                }
        }
        else {
            echo "Something went wrong!";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    function isLoginExpired() {
        $timeout = 100000;
        if(isset($_SESSION["last_login"]) && isset($_SESSION["username"])) {
            if((time() - $_SESSION["last_login"]) > $timeout) {
                return true;
            }
        }
        return false;
    }
    if(isset($_SESSION["username"]) && isLoginExpired()) {
        header("location: logout.php");
    }
?>
<html>
<head>
<title>SIH</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Login form container -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="profile.php">Railway Resthouse Management</a>
                <a style="text-align: right" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <!-- Checks if the user is logged in or not -->
    <?php
        if(!isset($_SESSION["username"]) || empty($_SESSION["username"])) {
        echo "Please login first";
        header("refresh: 2; url=index.php"); //To be changed to Javascript, standard scripting issues. 
        session_destroy();
        exit;
    }
    ?>
    <!-- if the user is logged in then show (execute) further data -->
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="media">
                <center>
                    <!-- <form action="img_up.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Edit profile picture" name="submit">
                    </form> -->
                    <img src="img/img_avatar1.png" width="150px"/>
                <br>
                <div class="media-body">
                    <h3 class="media-heading"><?php if(isset($_SESSION["username"])) { echo ucfirst(htmlspecialchars($_SESSION["username"])); } ?></h3> 
                </div>
                </center>
            </div>
            <hr>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Required information
                </div>
                <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php //echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="username" class="form-control" value="<?php //echo $username; ?>" required>
                            </div>
                            <span class="help-block"><?php //echo $username_error; ?></span>
                        </div>
                        <div class="form-group <?php //echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                            <label>Post</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                                <input type="text" name="username" class="form-control" value="<?php //echo $username; ?>" required>
                            </div>
                            <span class="help-block"><?php //echo $username_error; ?></span>
                        </div>
                        <div class="form-group <?php //echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                            <label>Department</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input type="text" name="username" class="form-control" value="<?php //echo $username; ?>" required>
                            </div>
                            <span class="help-block"><?php //echo $username_error; ?></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Additional information
                </div>
                <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php //echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                        <label>Address</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input type="text" name="username" class="form-control" value="<?php //echo $username; ?>" required>
                        </div>
                        <span class="help-block"><?php //echo $username_error; ?></span>
                    </div>
                    <div class="form-group <?php //echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                        <label>Mobile Number</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input type="text" name="username" class="form-control" value="<?php //echo $username; ?>" required>
                        </div>
                        <span class="help-block"><?php //echo $username_error; ?></span>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
