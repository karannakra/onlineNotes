<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        table tr{
            cursor: pointer;
        }
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
            padding-top:10px;
            text-align: center;
            width: 100%;
            position: absolute;
            bottom: 0;
            color: white;
            text-shadow: 1px 1px 2px black,1px 1px 1px black;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Profile</title>
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
                <a class="nav-link active" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="log" href="loggedin.php">My notes</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 mr-lg-3 mr-md-3">
            <button class="btn btn-outline-warning my-2 my-sm-0 active " type="button"><strong>logged in as karan nakra</strong></button>
        </form>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-warning my-2 my-sm-0">Logout</button>
        </form>
    </div>
</nav>
<!--update username forms-->


<!--main content-->
<h2 style="margin-top: 100px;text-align: center;color: white">General Account Settings</h2>
<div class="table-responsive float-right mr-lg-5 mr-5 " style="width: 60%;text-align: center;">
    <table class="table table-dark table-hover text-black font-weight-bold table-bordered">
        <tr data-target="#updateusernamemodal" data-toggle="modal">
            <td>USERNAME</td>
            <td>value</td>
        </tr>
        <tr data-target="#updateemailemodal" data-toggle="modal">
            <td>EMAIL</td>
            <td>value</td>
        </tr>
        <tr data-target="#updatepassmodal" data-toggle="modal">
            <td>PASSWORD</td>
            <td>value</td>
        </tr>
    </table>
</div>
<form method="post" id="updatenameform" >
    <!-- The Modal -->
    <div class="modal fade" id="updateusernamemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Username:</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group input-group mb-3">
                        <label for="usrname"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="usrname" placeholder="change Username" name="updateusername" >

                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Change</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form method="post" id="updateemailform" >
    <!-- The Modal -->
    <div class="modal fade" id="updateemailemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Email:</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group input-group mb-3">
                        <label for="updateemail"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" id="updateemail" placeholder="change Email" name="updateemail" >

                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Change</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form method="post" id="updatepassform" >
    <!-- The Modal -->
    <div class="modal fade" id="updatepassmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Enter current and New Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group input-group mb-3">
                        <label for="currntpass"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="text" class="form-control" id="currntpass" placeholder="Current passoword" name="currentpass" >
                    </div>
                    <div class="form-group input-group mb-3">
                        <label for="newpass"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="text" class="form-control" id="newpass" placeholder="New password" name="newpass" >
                    </div>
                    <div class="form-group input-group mb-3">
                        <label for="newpass1"></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="text" class="form-control" id="newpass1" placeholder="Confirm passoword" name="newpass1" >
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Change</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>



<div class="footer">
    <div class="container">
        <p><strong>Developed by karan Full stack Developer &copy;2019-20<?php $today=date("y");echo $today?></strong></p>
    </div>
</div>

<!--footer-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- The core Firebase JS SDK is always required and must be listed first -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="index.js"></script>
<script src="loadnotes.js"></script>
</body>
</html>