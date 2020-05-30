<?php
session_start();
include "connection.php";
//logout
include "logout.php";

//remember me file
include "rememberme.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body{
            font-family: "Georgia", fantasy;
            background: url("dead.jpg") no-repeat center center;
            background-attachment: fixed;
            background-size: cover;
        }
        a{
            font-family: Georgia, serif;
        }
        .footer{
            text-align: center;
            width: 100%;
            position: absolute;
            bottom: 0;
            color: white;
            text-shadow: 1px 1px 2px black,1px 1px 1px black;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <title>Online Notes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-md  navbar-custom bg-dark navbar-dark fixed-top ">
    <a class="navbar-brand" href="#">Online Notes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="button" data-target="#signinmodal" data-toggle="modal">Login</button>
        </form>
    </div>
</nav>

<!--Jumbotron with signup Button-->
<div class="jumbotron offset-4 offset-lg-5 offset-md-5" id="mycontainer">
    <h1 class="display-4"><strong>Online Notes</strong></h1>
    <h3>Take your notes with you!Wherever you Go</h3>
    <h4>Easy to use,Protects all your Notes</h4>
    <button type="button" class="btn btn-lg btn-success mb-2" data-toggle="modal" data-target="#signupmodal" id="signup">Sign up It's Free</button>
</div>
<!--Footer-->
<div class="footer">
    <div class="container">
        <p><strong>Developed by karan Full stack Developer &copy;2019-20<?php $today=date("y");echo $today?></strong></p>
    </div>
</div>
<!--Login Form-->
<form method="post" id="signinform" >
    <!-- The Modal -->
    <div class="modal fade" id="signinmodal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Login:</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div id="signinmessage">
                </div>
                <div class="modal-body">
                    <div class="form-group input-group">
                        <label for="loginemail"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="loginemail" placeholder="Enter email" name="loginemail">
                    </div>
                    <div class="form-group input-group">
                        <label for="loginpaswd"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="loginpaswd" placeholder="Choose password.." name="loginpaswd" >

                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switch1" name="rememberme">
                        <label class="custom-control-label" for="switch1" >Remember Me</label>
                        <a href="#" class="float-lg-right float-md-right float-right" data-target="#forgotpassmodal" data-toggle="modal" data-dismiss="modal">Forgot Password?</a>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button data-target="#signupmodal" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-outline-primary mr-auto">Register</button>
                    <button type="submit" class="btn btn-success">Login</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</form>

<!--Sign up Form-->
<form method="post" id="signupform" >
    <!-- The Modal -->
    <div class="modal fade" id="signupmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Sign up today and start using our online notes App!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <!--                    signup Message from php file-->
                    <div id="signupmessage">
                    </div>
                    <div class="form-group input-group mb-3">
                        <label for="usrname"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="usrname" placeholder="Enter username" name="username" >
                    </div>
                    <div class="form-group input-group">
                        <label for="signupemail"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" id="signupemail" placeholder="Enter email" name="email" >
                    </div>
                    <div class="form-group input-group">
                        <label for="signuppwd"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="signuppwd" placeholder="Choose password.." name="signuppswd" >
                    </div>
                    <div class="form-group input-group">
                        <label for="signuppwd1"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="signuppwd1" placeholder="Confirm Password.." name="signuppswd1" >
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <label for="signup"></label>
                    <input type="submit" class="btn btn-success" id="signup" value="submit">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!--Forgot Password-->
<form method="post" id=forgotpassform" class="needs-validation" novalidate>
    <!-- The Modal -->
    <div class="modal fade" id="forgotpassmodal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Forgot Password?Enter Your email address:</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group input-group">
                        <label for="forgotemail"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="forgotemail" placeholder="Enter email" name="forgotemail" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button data-target="#signupmodal" data-dismiss="modal" data-toggle="modal" type="button" class="btn btn-outline-primary mr-auto">Register</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

</form>


<!-- Optional JavaScript-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="index.js" type="text/javascript"></script>
</body>
</html>