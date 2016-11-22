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
    <link rel="stylesheet" href="css/headerscroll.css">
    <!-- Social media bars and icons -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- FontAwesome provides stylish icons and fonts: http://fontawesome.io/examples/ -->
    <link rel="stylesheet" href="css/font-awesome.css">

</head>
<body>
<!-- Fixed Navigation Bar  -->
<nav class="navbar navbar-default navbar-fixed-top" id="fixed-navbar">
    <div class="container-fluid">

        <!-- Logo -->
        <div class="navbar-header">

            <a href="#" class="navbar-brand"><img src="resources/images/greenhouse-logo.png"></a>
        </div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
            <span class="glyphicon glyphicon-th white"></span>
        </button>


        <!-- Collapsable Menu Items -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <!-- Left Hand Side -->
            <ul class="nav navbar-nav" id="nav-list">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="products.php">Our Boxes!</a></li>
                <li><a href="newbostonTutorial.php">TNB Tutorial</a></li>
                <li><a href="login.php">Old Login</a></li>
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
                    echo('<li><a href="logout.php" id="logout-btn">Log Out</a></li>');
                }
                else {
                    echo('<li><a href="#" id="login-modal-trigger" data-target="#login-modal" data-toggle="modal">Login/Register</a></li>');
                }
            ?>
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
                    <!-- The Register tab proceeding to processRegister.php -->
                    <div class="tab-pane fade in" id="register-tab">
                        <form class="form-register" method="POST" action="processRegister.php">
                            <h2 class="form-signin-heading">Register here</h2>
                            <br><br>
                            <label>User Information</label>
                            <input type="text" name=registerusername class="form-control" placeholder="Username" required autofocus>
                            <input type="password" name=registerpassword class="form-control" placeholder="Password" required>
                            <input type="password" name=confirmpassword class="form-control" placeholder="Confirm Password" required>
                            <br><br>
                            <label>Personal Information</label>
                            <input type="text" name=firstname class="form-control" placeholder="First Name" required>
                            <input type="text" name=lastname class="form-control" placeholder="Surname" required>
                            <input type="text" name=phone class="form-control" placeholder="Phone" required>
                            <input type="text" name=email class="form-control" placeholder="E-mail" required>
                            <br><br>
                            <label>Shipping Address</label>
                            <input type="text" name=address class="form-control" placeholder="Address">
                            <select class="form-control" id="country">
                                <option value="Country" disabled="disabled" selected>Country</option>
                                <option value="AF">Norway</option>
                                <option value="AX">Ireland</option>
                                <option value="AL">USA</option>
                                <option value="DZ">Spain</option>
                            </select>
                            <input type="text" name=zip class="form-control" placeholder="Address">
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

<!-- The Main Container set to fluid to fill out the whole page
Also a wrapper containing sidebar-wrapper and page-content-wrapper -->
<div class="container-fluid" id="main-content-wrapper">

    <div class="jumbotron text-center" id="banner">
        <br><br><br><br><br><br><h1>- Greenbox -</h1>

    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!-- Main Content Column -->
                    <div class="col-lg-8">
                        <h1>Main Content layout</h1>
                        <p>
                            What is Lorem Ipsum?
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                            Why do we use it?
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="jumbotron text-center">
                                    <dl>
                                        <h3>Our Vision</h3>
                                        Where does it come from?
                                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <h2>Alert</h2>
                                <div class="alert alert-success">This is an alert in the color of success!</div>
                                <div class="alert alert-info fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>Don't forget some birthday! I'm in the color of info!
                                </div>
                                <div class="alert alert-danger fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>I'm danger baby, danger! Please don't close me
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="resources/art.jpg" class="img-responsive img-rounded">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="resources/art.jpg" class="img-responsive img-rounded">
                            </div>
                            <div class="col-md-8">
                                <blockquote>
                                    <h1>4 A wise man once said</h1>
                                    <p>This is Erasmus baby!</p>
                                    <p>The French Girls, yeyeyeye, always inviting</p>
                                    <p>Is this wid?</p>
                                    <footer>Lukas</footer>
                                </blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <h3>col-md-6</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                            </div>
                            <div class="col-md-4">
                                <img src="resources/art.jpg" class="img-responsive img-rounded">

                            </div>
                        </div>
                    </div>
                    <!-- Right Side Column -->
                    <div class="col-lg-4">
                        <h1>Advertise layout</h1>
                        <div class="col-lg-12 col-centered" id="social-media-div">
                            <a class="btn btn-block btn-social btn-facebook">
                                <span class="fa fa-facebook"></span> Follow us on Facebook!
                            </a>
                            <a class="btn btn-block btn-social btn-google">
                                <span class="fa fa-google"></span> Google us!
                            </a>
                            <a class="btn btn-block btn-social btn-instagram">
                                <span class="fa fa-instagram"></span> Follow us on Instagram!
                            </a>

                        </div>
                    </div>
                </div>
            </div>
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
    $( function() {
        /**
         * Listen to scroll to change header opacity class
         */
        function checkScroll() {
            var startY = $('.navbar').height() * 3; //The point where the navbar changes in px

            if ($(window).scrollTop() > startY) {
                $('.navbar').addClass("scrolled");
            } else {
                $('.navbar').removeClass("scrolled");
            }
        }

        if ($('.navbar').length > 0) {
            $(window).on("scroll load resize", function () {
                checkScroll();
            });
        }
    });

    // On clicking #menu-toggle
    $("#menu-toggle").click( function (e) {
        // Prevent the link to go to the URL
        e.preventDefault();
        // menuDusplayed are referenced in sidebar.css
        $("#main-content-wrapper").toggleClass("menuDisplayed");

    });

    // On clicking #login-modal-trigger
    $("#login-modal-trigger").click( function (e) {
        e.preventDefault();
    });
    // Tabs function in the Login/Register modal
    $( function() {
        console.log("inside anon function to activate #log-reg-tabs")
        $( "#log-reg-tabs" ).tab();
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href") // activated tab
    });


</script>
</body>
</html>