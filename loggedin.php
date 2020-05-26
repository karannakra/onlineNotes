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
            font-family: Georgia;
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>My Notes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css">
</head>
<body>
<!--navbar for logged in page-->
<nav class="navbar navbar-expand-md  navbar-custom bg-dark navbar-dark fixed-top ">
    <a class="navbar-brand" href="#">Online Notes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link " href="#">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">My notes</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 mr-lg-3 mr-md-3">
            <button class="btn btn-outline-warning my-2 my-sm-0 active "><strong>logged in as karan nakra</strong></button>
        </form>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-warning my-2 my-sm-0">Logout</button>
        </form>
    </div>
</nav>
<!---->
<!--footer-->
<div class="footer">
    <div class="container">
        <p><strong>Developed by karan Full stack Developer &copy;2019-20<?php $today=date("y");echo $today?></strong></p>
    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>