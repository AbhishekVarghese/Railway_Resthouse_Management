<?php
    include("connect.php");
    require_once("login.php");
    session_start();
    if(isset($_SESSION["username"])) {
        echo "You are already logged in";
        header("refresh: 1; url=profile.php");
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
    <script>
    $(document).ready(function() {
    //Hiding the contents of other two login pages.
        $('.guest').hide();
        //On click, changing tabs
        $('#guest').click(function() {
            $('.guest').show();
            $('.emp').hide();
            $('.nav li:nth-child(2)').addClass('active');
            $('.nav li:nth-child(1)').removeClass('active');
        });
        $('#emp').click(function() {
            $('.emp').show();
            $('.guest').hide();
            $('.nav li:nth-child(1)').addClass('active');
            $('.nav li:nth-child(2)').removeClass('active');
        });
    });
    </script>
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
                            <li><a id="guest" href="#">Guest</a></li>
                        </ul>
                        <!-- Email, Username field areas and buttons -->
                        <!-- Login page for Employees -->
                        <div class="panel-body emp" id="emp">
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label for="text">Employee ID:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Employee ID" value="<?php echo $username; ?>">
                                </div>
                            </div>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label for="pwd">Password:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                                </div>
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group" style="width: 100%; !important">
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-log-in">&nbsp;</span>Login</button>
                            &nbsp; First time? <a href="register.php"> Register here!</a>
                            </div>
                        </div>
                        <!-- Login page for guests -->
                        <div class="panel-body guest" id="guest">
                            <div class="form-group <?php //echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label for="text">Guest Email-ID:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" name="guest_email" placeholder="Email ID" value="<?php echo $username; ?>">
                                </div>
                            </div>
                            <div class="form-group <?php //echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label for="mob">Mobile Number:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number" name="guest_mobile">
                                </div>
                                <span class="help-block"><?php //echo $password_err; ?></span>
                            </div>
                            <div class="form-group" style="width: 100%; !important">
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-log-in">&nbsp;</span>Login</button>
                            &nbsp; Railway Employee? <a href="register.php"> Register here!</a>
                            </div>
                        </div>
                    </div>
                </div>
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