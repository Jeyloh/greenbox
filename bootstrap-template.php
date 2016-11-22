<!DOCTYPE html>
<html>
<head>
    <title>Greenbox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
          crossorigin="anonymous">



    <!-- Personal css files -->
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/greenbox.css">

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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="products.html">Our Boxes!</a></li>
                <li><a href="newbostonTutorial.php">TNB Tutorial</a></li>
                <li><a href="login.php">Old Login</a></li>
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
            <!-- Right Hand Side -->
            <ul class="nav navbar-nav navbar-right" id="right-nav">
                <!-- A modal link to open the login-modal -->
                <li><a href="#" class="btn btn-success" id="login-modal-trigger" data-target="#login-modal" data-toggle="modal">Login/Register</a></li>
                <li><a href="#" class="btn btn-info" id="menu-toggle">Toggle Menu</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
            <!-- NavBar PHP code to check if user is admin and add appropriate menu items,
            then add either login/register or logout if the user is logged in or not -->
            <?php
                session_start();
                include('connect.php');
                include('functions.php');
                if(isLoggedIn()) {
                    // TODO: Add these items to the navbar on the right side!
                    if($_SESSION['admin'] == true) {
                        echo('<li><a href="adminpage.php">Admin HUB</a></li>');
                        echo('<li><a href="#">Add Box</a></li>');
                    } 
                    else {
                        echo('<li><a href="userpage.php">User Home</a></li>');
                        echo('<li><a href="#">Subscribe</a></li>');
                    }
                }

                        
                // Check if the user is logged in and set logout or login as appropriate
                if(isLoggedIn()) {
                    echo('<li><a href="logout.php" class="btn btn-danger" id="login-modal-trigger" data-target="#login-modal" data-toggle="modal">Log Out</a></li>');
                } 
                else {
                    echo('<li><a href="#" class="btn btn-success" id="login-modal-trigger" data-target="#login-modal" data-toggle="modal">Login/Register</a></li>');
                }
            ?>
            </ul>
        </div>
    </div>
</nav>


<!-- Create a Modal for logging in or registering. Includes 2 tabs with different php calls -->
<div id="login-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal Header containing the tabs -->
            <div class="modal-header" id="log-reg-tabs">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- Tabs for displaying either Login or Register data -->
                <ul>
                    <li><a href="#login-tab">Login</a></li>
                    <li><a href="#register-tab">Register</a></li>

                </ul>
                <div id="login-tab">
                    <form class="form-signin" action="processLogin.php">
                        <h2 class="form-signin-heading">Please sign in</h2>
                        <label for="inputEmail" class="sr-only">Email/Username</label>
                        <input type="text" id="inputEmail" name="loginusername" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" name="loginpassword" class="form-control" placeholder="Password" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </form>
                </div>
                <div id="register-tab">
                    <form class="form-signin" action="processLogin.php">
                        <h2 class="form-signin-heading">Register here</h2>
                        <input type=text name=registerusername size=30 placeholder="Username"><br>
                        <input type=password name=registerpassword size=30 placeholder="Password"><br>
                        <input type=password name=confirmpassword size=30 placeholder="Confirm Password"><br>
                        <input type=text name=firstname size=30 placeholder="First Name"><br>
                        <input type=text name=lastname size=30 placeholder="Surname"><br>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                    </form>
                </div>
            </div>

            <!-- The displayed login/registered data -->
            <div class="modal-body">
                    <!-- Login form, HIDE/DISPLAY on tabs toggle -->
                <div class="row">
                    <div class="col-lg-8 col-centered" >


                    </div>
                </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- MAIN CONTENT FOR CURRENT PAGE HERE -->
<div class="container-fluid" id="wrapper" style="margin-top:50px">
    <!-- Responsive Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li><a href="#">Settings</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
        </ul>
    </div>





</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Jquery hosted by Google, added additionally to Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript from Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Multiple JQuery scripts -->
<script>
    // On clicking #menu-toggle
    $("#menu-toggle").click( function (e) {
        // Prevent the link to go to the URL
        e.preventDefault();
        // menuDusplayed are referenced in sidebar.css
        $("#wrapper").toggleClass("menuDisplayed");

    });

    // On clicking #menu-toggle
    $("#login-modal-trigger").click( function (e) {
        // Prevent the link to go to the URL
        e.preventDefault();
    });

    // Tabs function in the Login/Register modal
    $( function() {
        console.log("inside anon function to activate #log-reg-tabs")
        $( "#log-reg-tabs" ).tab();
    });

    $(document).ready(function(){
        activeTab('login-tab');
    });

    function activeTab(tab){
        $('#log-reg-tabs a[href="#' + tab + '"]').tab('show');
    };

</script>
</body>
</html>