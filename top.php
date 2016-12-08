<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Optional theme -
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
          crossorigin="anonymous">->

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


    <!-- Personal css files -->
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/greenbox.css">
    <link rel="stylesheet" href="css/headerscroll.css">
    <!-- Social media bars and icons -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- FontAwesome provides stylish icons and fonts: http://fontawesome.io/examples/ -->
    <link rel="stylesheet" href="css/font-awesome.css">

</head>
<body>
<!-- Fixed Navigation Bar  -->
<nav class="navbar navbar-default navbar-fixed-top" id="fixed-navbar">
    <div class="container-fluid" id="mobile-background">

        <!-- Logo -->
        <div class="navbar-header">
            <a href="#" class="navbar-brand"><img id="logo" src="resources/greenbox-logo.jpg"></a>
        </div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar" style="border:none">
            <span class="glyphicon glyphicon-th-large" style="font-size:36px;"></span>
        </button>


        <!-- Collapsable Menu Items -->
        <div class="collapse navbar-collapse" id="mainNavBar">

            <!-- Left Hand Side -->
            <ul class="nav navbar-nav" id="nav-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Our Boxes!</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="faq.php">FAQ</a></li>
            </ul>
            <!-- Right Hand Side -->
            <ul class="nav navbar-nav navbar-right" id="right-nav">
                <!-- A modal link to open the login-modal -->
                <?php
                session_start();
                include('connect.php');
                include('functions.php');
                if (isLoggedIn()) {
                    if ($_SESSION['admin'] == true) {
                        echo('<li><a href="adminpage.php" class="blue-background">Admin HUB</a></li>');
                    } else {
                        echo('<li><a href="userpage.php" class="blue-background">User Home</a></li>');
                    }
                }
                // Check if the user is logged in and set logout or login as appropriate
                if (isLoggedIn()) {
                    echo('<li><a href="logout.php" id="logout-btn" class="grayhover orange-background">Log Out</a></li>');
                } else {
                    echo('<li><a href="#" id="login-modal-trigger" class="green-background" data-target="#login-modal" data-toggle="modal">Login/Register</a></li>');
                }
                ?>

            </ul>
            <ul class="nav navbar-nav">

            </ul>
        </div>
        <h1 class="white" id="header-text"><!-- Add Header here instead?--></h1>
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
                <ul id="tab-bar" class="nav nav-tabs">
                    <li class="active"><a href="#login-tab" data-toggle="tab">Login</a></li>
                    <li class=""><a href="#register-tab" data-toggle="tab">Register</a></li>
                </ul>
                <div id="tab-bar-content" class="tab-content">
                    <!-- The Login tab proceeding to processLogin.php-->
                    <div class="tab-pane fade active in" id="login-tab">
                        <form class="form-signin" method="POST" action="processLogin.php">
                            <h2 class="form-signin-heading">Please sign in</h2>
                            <label for="inputEmail" class="sr-only">Email/Username</label>
                            <input type="text" id="inputEmail" name="loginusername" class="form-control"
                                   placeholder="Email address" required autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" name="loginpassword" class="form-control"
                                   placeholder="Password" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        </form>
                    </div>
                    <!-- The Register tab proceeding to processRegister.php -->
                    <div class="tab-pane fade in" id="register-tab">
                        <form class="form-register" name="form-register" method="POST" onsubmit="return validateForm()" action="processRegister.php">
                            <h2 class="form-signin-heading">Register here</h2>
                            <br><br>
                            <label>User Information</label>
                            <input type="text" name="registerusername" class="form-control" placeholder="Username"
                                   required autofocus>
                            <input type="password" name="registerpassword" class="form-control" placeholder="Password"
                                   required>
                            <input type="password" name="confirmpassword" class="form-control"
                                   placeholder="Confirm Password" required>
                            <br><br>
                            <label>Personal Information</label>
                            <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                            <input type="text" name="lastname" class="form-control" placeholder="Surname" required>
                            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                            <input type="text" name="email" class="form-control" placeholder="E-mail" required>
                            <br><br>
                            <label>Shipping Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                            <select class="form-control" id="country" name="country">
                                <option value="Country" name="country" disabled="disabled" selected>Country</option>
                                <option value="AF">Norway</option>
                                <option value="AX">Ireland</option>
                                <option value="AL">USA</option>
                                <option value="DZ">Spain</option>
                            </select>
                            <input type="text" name="zip" class="form-control" placeholder="Zip">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="admin" value="admin"> Are you Admin?
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- The displayed login/registered data -->
            <div class="modal-body">
                <!-- Login form, HIDE/DISPLAY on tabs toggle -->
                <div class="row">
                    <div class="col-lg-8 col-centered">


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

<!--<div id="newsletter-scroll-up">
    <div id="nl-content" >
        Subscribe to our newsletter:
        <input type="text" id="newsletter-input" name="newsletter" placeholder="Enter email" autofocus>
        <button type="submit" class="btn btn-success btn-sm">Subscribe</button>
        <button type="button" class="close" onclick="closeNewsletter()">&times;</button>
    </div>
</div> -->

<!-- The Main Container set to fluid to fill out the whole page
Also a wrapper containing sidebar-wrapper and page-content-wrapper -->
<div class="container-fluid" id="main-content-wrapper">

    <div class="jumbotron text-center" id="banner">
        <br><br><br><br><br><br>
        <h1>- Greenbox -</h1>
    </div>






        <!-- TEMPLATE ENDS HERE
                Next line would typically be using a div class="row" 
                Then you need to specify div class="col-md-NUM/12 -->



