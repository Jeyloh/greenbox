<!DOCTYPE html>
<html>
<head>
    <title>Greenbox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Fixed Navigation Bar  -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <!-- Logo -->
        <div class="navbar-header">
            <!-- Collapse mainNavBar button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                <span class="glyphicon glyphicon-th"></span>
            </button>
            <a href="#" class="navbar-brand"><kbd>GREENBOX</kbd></a>
        </div>

        <!-- Collapsable Menu Items -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <!-- Left Hand Side -->
            <ul class="nav navbar-nav">
                <li><a href="index.html">Home</a></li>
                <li class="active"><a href="newbostonTutorial.php">TNB Tutorial</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="reviews.html">Reviews</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Profile<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Order Box</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </li>
            </ul>
            <!-- NavBar PHP code to check if user is admin and add appropriate menu items,
            then add either login/register or logout if the user is logged in or not -->
            <?php
                session_start();
                include('php/connect.php');
                include('php/functions.php');
                if(isAdmin()) {
                    echo('<li><a href="php/adminpage.php">Admin HUB</a></li>');
                    echo('<li><a href="#">Add Box</a></li>');
                } else {
                    echo('<li><a href="php/userpage.php">User Home</a></li>');
                    echo('<li><a href="#">Subscribe</a></li>');
                }
                // Add a navbar to the right side
                echo('<ul class="nav navbar-nav navbar-right">');
                // Check if the user is logged in and set logout or login as appropriate
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo('<li><a href="logout.php">Log Out</a></li>');
                } else {
                    echo('<li><a href="login.php">Login</a></li>');
                    echo('<li><a href="register.php">Register</a></li>');
                }
            ?>

            </ul>
        </div>
    </div>
</nav>


<div class="container" style="margin-top:80px">

    <h2>Wells</h2>
    <div class="well">Basic well</div>
    <div class="well well-sm">Basic Well</div>
    <h2>Alert</h2>
    <div class="alert alert-success">This is an alert in the color of success!</div>
    <div class="alert alert-info fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>Don't forget some birthday! I'm in the color of info!
    </div>
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>I'm danger baby, danger! Please don't close me
    </div>


    <img src="resources/art.jpg" class="img-responsive img-rounded">

    <div class="embed-responsive embed-responsive-16by9">
        <iframe class=""embed-responsive-item" src="http://www.youtube.com/embed/ClHu3XQBnGU">
        </iframe>
    </div>
    <h2>Striped Table</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Points</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Jørgen</th>
            <th>22</th>
            <th>200/250</th>
        </tr>
        <tr>
            <th>Jørgen</th>
            <th>22</th>
            <th>200/250</th>
        </tr>
        <tr>
            <th>Jørgen</th>
            <th>22</th>
            <th>200/250</th>
        </tr>
        </tbody>
    </table>


    <div class="jumbotron text-center">
        <dl>
            <dt>TO DO</dt>
            <dd>Take the trash</dd>
            <dd>Eat a cat</dd>
            <br>
            <dt>Not to do..</dt>
            <dd>Eat</dd>
            <dd>Sleep</dd>
            <dd>Rave</dd>
            <dd><kbd>Repeat</kbd></dd>
        </dl>
    </div>

    <div class="row">
        <div class="col-md-4">
            <blockquote>
                <h1>A wise man once said</h1>
                <p>This is Erasmus baby!</p>
                <p>The French Girls, yeyeyeye, always inviting</p>
                <p>Is this wid?</p>
                <footer>Lukas</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <h3>Column 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-md-4">
            <h3>Column 3</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</body>
</html>