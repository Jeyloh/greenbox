$(function () {
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
$("#menu-toggle").click(function (e) {
    // Prevent the link to go to the URL
    e.preventDefault();
    // menuDusplayed are referenced in sidebar.css
    $("#main-content-wrapper").toggleClass("menuDisplayed");

});

// On clicking #login-modal-trigger
$("#login-modal-trigger").click(function (e) {
    e.preventDefault();
});
// Tabs function in the Login/Register modal
$(function () {
    console.log("inside anon function to activate #log-reg-tabs")
    $("#log-reg-tabs").tab();
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).attr("href") // activated tab
});

// Javascript (not jquery) to scroll up newsletter on 150px scroll
window.onscroll = function () {
    headerScroll()
};

var newsletter = document.getElementById("newsletter-scroll-up");
function headerScroll() {
    if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
        newsletter.style.height = "50px";

        console.log('scrolled 100px. newsletter height = ' + newsletter.style.height);
    }
}
function closeNewsletter() {
    newsletter.style.display = "none";
}


$(document).ready(function() {

    $('#faq-section').find('.faq-title').click(function(){
        //Expand or collapse this panel
        $(this).next().slideToggle('slow');
    });
});

// Google MAPS https://bootstrapious.com/p/google-maps-and-bootstrap-tutorial

var GmapAPI = "AIzaSyD8xFGLqm2yn96v0FWWbHmgLJSJaKuyjWM";

$(function () {

    function initMap() {

        var location = new google.maps.LatLng(50.0875726, 14.4189987);

        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: location,
            zoom: 16,
            panControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);

    }

    google.maps.event.addDomListener(window, 'load', initMap);
});


// document.referrer returns a string of the previous document that loaded this page. Here I just check if it's some of the pages to open the login page
$(function(){
    if(document.referrer == "processSubscription.php" || document.referrer == "processLogin.php"){
        $('#login-modal-trigger').click();
    }
});
