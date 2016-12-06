$( document ).ready(function() {
    /**
     * This Jquery function will check the scrolling and add the class scrolled
     * which css change the background from no opacity to black. It will remove the
     * black once the scroll is close enough to the top again.
     */
    function checkScroll() {
        var startY = $('.navbar').height() * 3; // Changes based on navbars size * 3

        if ($(window).scrollTop() > startY) {
            $('.navbar').addClass("scrolled"); // The class to be added for css changes
            $('.glyphicon-th-large').addClass("scrolled"); // The class to be added for css changes
        } else {
            $('.navbar').removeClass("scrolled"); // Removing it again
            $('.glyphicon-th-large').removeClass("scrolled"); // Removing it again
        }
    }
    // Making sure the navbar is present before calling previous method
    if ($('.navbar').length > 0) {
        $(window).on("scroll load resize", function () {
            checkScroll();
        });
    }

    // document.referrer returns a string of the previous document that loaded this page. Here I just check if it's some of the pages to open the login page
    if(document.referrer == "http://localhost/greenbox/processSubscription.php" || document.referrer == "http://localhost/greenbox/products.php"){
        window.console&&console.log('refferer works');
        $('#login-modal-trigger').click();
    }

    /**
     * login-modal-trigger is usually an anchor, this changes it default action to open the link
     * and instead uses it's already defined functions.
     */
    $("#login-modal-trigger").click(function (e) {
        e.preventDefault();
    });
    /**
     * For working the tabs in the modal
     */
    $("#log-reg-tabs").tab();
    // Change between the activated tabs
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href") // activated tab
    });

    /**
     * Code used for working the accordion on the FAQ page
     */
    $('#faq-section').find('.faq-title').click(function(){
        //Expand or collapse this panel
        $(this).next().slideToggle('slow');
    });

    /**
     * Google Maps functionality currently not working. Will be displayed in the footer
     * @type {string}
     */
    // My personal API for maps


    function initMap() {

        var location = new google.maps.LatLng(52.251900, -7.140879);

        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: location,
            zoom: 16,
            panControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(mapCanvas, mapOptions);

        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

    }
    google.maps.event.addDomListener(window, 'load', initMap);

});

/**
 * JAVASCRIPT WITHOUT JQUERY
 */

/**
 * When the user scrolls n pixels down, the newsletter displays
 */
window.onscroll = function () {
    headerScroll()
};

var newsletter = document.getElementById("newsletter-scroll-up");
function headerScroll() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        newsletter.style.height = "50px";

        console.log('scrolled 200px. newsletter height = ' + newsletter.style.height);
    }
}
// Used to actually close the newsletter on clicking the x button
function closeNewsletter() {
    newsletter.style.display = "none";
}

// Google MAPS https://bootstrapious.com/p/google-maps-and-bootstrap-tutorial




