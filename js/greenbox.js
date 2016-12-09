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
     * Close the mobile menu while clicking outside of it
     * src: http://stackoverflow.com/questions/23764863/how-to-close-an-open-collapsed-navbar-when-clicking-outside-of-the-navbar-elemenx
     */
    $(document).click(function (event) {
        window.console&&console.log('Clicked outside menubar, jquery function invoked');
        var clickover = $(event.target);
        // target the menubar class
        var $navbar = $(".navbar-collapse");
        // check if it has the added class "in" which means its opened
        var _opened = $navbar.hasClass("in");
        // If it is, hide the navbar
        if (_opened === true && !clickover.hasClass("navbar-toggle")) {
            $navbar.collapse('hide');
        }
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




/**
Code to validate a form with js, although I already do it in both HTML and PHP.
Originally had a basic solution but replaced it with this abstract one with help from
 http://stackoverflow.com/questions/15869897/javascript-foreach-input-in-form-for-name-and-value

 @formElement the form this is called upon
 @return false if some of the inputs are not filled in
*/
function validateForm(form) {
    console.log("validateForm called on " + form);
    // feed parameter with 'this' value at the onClick so we can reference the form from the element itself
    console.log("form " + form);
    // Get the forms control points to reference both their name and value in a loop
    var controls = form.elements;
    var notValid = [];
    console.log("checking " + controls + " and its value ");

    // Create the loop and add mistakes to the notValid array
    for(var i = 0; i < controls.length; i++) {
        // controls are added if they value doesn't exist
        if (controls[i].value == "") {
            notValid[i] = controls[i].name + ': ' + controls[i].value;
        }
    }
    // If no errors, return true and proceed, if errors, alert them all and return false.
    if (notValid.length == 0) {
        console.log("All fields are entered correctly");
        return true;
    } else {
        alert(notValid.join('\n'));
        return false;
    }

}

/** TODO: JSON Reviews with ajax
REVIEWS PAGE

http://stackoverflow.com/questions/1184624/convert-form-data-to-javascript-object-with-jquery
http://jsfiddle.net/sxGtM/3/
http://www.webslesson.info/2016/04/append-data-to-json-file-using-php.html
http://stackoverflow.com/questions/17488660/difference-between-serialize-and-serializeobject-jquery

*/
// Send data to a JSON file, a javascript object notation, that keeps information about all reviews. Could use MYSQL instead but wanted to test this out.
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$(function() {
    $('#review-form').submit(function() {
        $('#result').text(JSON.stringify($('#review-form').serializeObject()));
        return false;
    });
});

var jcontent = {
    "username": "jTest",
    "greenbox": "jBox",
    "review": "Long review text on the greenbox here. Try to make it get this information from a json file instaed of static javascript.",
    "rating": 5
}

// Review page related, learning json
document.getElementById("json-name").innerHTML = jcontent.username;
document.getElementById("json-box").innerHTML = jcontent.greenbox;
document.getElementById("json-rating").innerHTML = jcontent.review;
document.getElementById("json-review").innerHTML = jcontent.rating;
