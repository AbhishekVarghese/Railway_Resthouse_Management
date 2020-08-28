<?php
    include("connect.php");
    require_once("loginguest.php");
    session_start();
    if(isset($_SESSION["GID"])) {
        echo "You are already logged in";
        header("refresh: 1; url=house_profile.php");
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
    <div class="container-fluid">
    <!-- Login form container -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
              <h3> Indian Railways Guest Houses</h3>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="container">    
                    <div class="form_container panel panel-default">
                        <!-- Main buttons to change pages -->
                        <div class="panel-heading"><h4><center>LOGIN</center></h4></div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a id="emp" href="#">Employee</a></li>
                            
                        </ul>
                        <div class="panel-body emp" id="emp">
                            <div class="form-group <?php echo (!empty($GID_err)) ? 'has-error' : ''; ?>">
                                <label for="text">GUEST HOUSE ID:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" name="GID" placeholder="guest house ID" value="<?php echo $GID; ?>">
                                </div>
                            </div>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label for="pwd">PASSWORD:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                                </div>
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group" style="width: 100%; !important">
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-log-in">&nbsp;</span>Login</button>
                            </div>
                        </div>
                        <!-- Login page for guests -->
                       
                </div>
            </form>
<form action="forgot.php" method="POST">
        <h2 class="form-signin-heading">Forgot Password</h2>
        <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input type="text" name="GID" class="form-control" placeholder="guest house ID" required>
    </div>
    <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Forgot Password</button>
        <!--<a class="btn btn-lg btn-primary btn-block" href="forgot.php">Login</a>-->
      </form>

        </div>
        <!-- Instructions -->
        <div class="col-md-6">
            Instructions
            <br>
            
            -- Add instructions here
        </div>
    <!-- End of login form container -->
    </div>
</div>
</body>
</html>
