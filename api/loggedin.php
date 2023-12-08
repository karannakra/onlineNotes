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
        textarea{
            line-height: 1.6em;
            width: 100%;
            max-width: 100%;
            border: 1px solid white;
            font-weight: bold;
            color: white;
            border-left: 30px solid white;
            background-color:rgb(27,30,36);
            text-shadow: 1px 1px 2px black,1px 1px 1px black;
            font-family: Georgia, serif;
        }
        #container{
            margin-top:100px;
        }
        #Done,#AllNotes,#notePad,.delete{
            display: none;
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
        .noteheader{
            border: 1px solid black;
            color: white;
            background-color:rgb(27,30,36);
            text-shadow: 1px 1px 2px black,1px 1px 1px black;
            border-radius: 10px;
            margin-bottom: 10px;
            padding: 0 10px;
        }
        .text{
            font-size: 20px;
            margin-bottom: 5px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .time-text{
            font-size: 15px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .notes{
            font-family: Georgia, serif;
        }
        .noteheader:hover{
            cursor: pointer;
    </style>

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
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
                <a class="nav-link " href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#" id="log">My notes</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 mr-lg-3 mr-md-3">
            <button class="btn btn-outline-warning my-2 my-sm-0 active " type="button"><strong>logged in as <?php echo $_SESSION['username']?></strong></button>
        </form>
        <form class="form-inline my-2 my-lg-0">
            <a href="index.php?logout=1" class="btn btn-outline-warning my-2 my-sm-0" id="logout">logout</a>
        </form>
    </div>
</nav>
<!--content of the page-->
<div class="container" id="container">
    <!--    Alert Message-->
    <div class="alert alert-danger collapse" id="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p id="alert-content"></p>
    </div>
    <div class="row">
        <div class="offset-md-0 col-md-10 offset-lg-1 col-lg-10 offset-0" >
            <!--            div for buttons-->
            <div class="mb-lg-2 ">
                <button id="AddNote" class="btn btn-warning " type="button"><strong>Add Note</strong></button>
                <button id="Edit"  class="btn btn-warning  float-lg-right ml-lg-1 ml-md-2 float-md-right ml-1 float-right " type="button"><strong>Edit</strong></button>
                <button id="Done" class="btn btn-primary float-lg-right mr-lg-1  mr-md-2 float-md-right mr-1 float-right " type="button"><strong>Done</strong></button>
                <button id="AllNotes" class="btn btn-warning " type="button"><strong>All Notes</strong></button>
            </div>
            <div id="notePad">
                <label for="textarea"></label>
                <textarea id="textarea" rows="8" style="font-size: 25px"></textarea>
            </div>
        </div>
        <div id="notes" class="notes offset-md-0 col-md-10 offset-lg-1 col-lg-10 offset-0" style="overflow-y:scroll;height: 400px">
            <!--Ajax call to php file            -->
        </div>

    </div>

</div>
<!--footer-->
<div class="footer">
    <div class="container">
        <p><strong>Developed by karan Full stack Developer &copy;2019-20<?php $today=date("y");echo $today?></strong></p>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="index.js"></script>
<script src="loadnotes.js"></script>
</body>
</html>