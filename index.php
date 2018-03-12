<?php
    include("connect.php");
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
        $('.sguest').hide();
        //On click, changing tabs
        $('#guest').click(function() {
            $('.guest').show();
            $('.emp').hide();
            $('.sguest').hide();
            $('.nav li:nth-child(2)').addClass('active');
            $('.nav li:nth-child(1)').removeClass('active');
            $('.nav li:nth-child(3)').removeClass('active');
        });
        $('#sguest').click(function() {
            $('.sguest').show();
            $('.emp').hide();
            $('.guest').hide();
            $('.nav li:nth-child(3)').addClass('active');
            $('.nav li:nth-child(2)').removeClass('active');
            $('.nav li:nth-child(1)').removeClass('active');
        });
        $('#emp').click(function() {
            $('.emp').show();
            $('.sguest').hide();
            $('.guest').hide();
            $('.nav li:nth-child(1)').addClass('active');
            $('.nav li:nth-child(2)').removeClass('active');
            $('.nav li:nth-child(3)').removeClass('active');
        });
    });
    </script>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Login form container -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Railway Resthouse Management</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="container">    
                    <div class="form_container panel panel-default">
                        <!-- Main buttons to change pages -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a id="emp" href="#">Employee</a></li>
                            <li><a id="guest" href="#">Guest</a></li>
                            <li><a id="sguest" href="#">Special Guest</a></li>
                        </ul>
                        <!-- Email, Username field areas and buttons -->
                        <!-- Login page for Employees -->
                        <div class="panel-body emp" id="emp">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                        <!-- Login page for guests -->
                        <div class="panel-body guest" id="guest">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                        <!-- Login page for special guests -->
                        <div class="panel-body sguest" id="sguest">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Submit</button>
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
</body>
</html>