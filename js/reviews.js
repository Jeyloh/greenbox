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
};

// Review page related, learning json
document.getElementById("json-name").innerHTML = jcontent.username;
document.getElementById("json-box").innerHTML = jcontent.greenbox;
document.getElementById("json-rating").innerHTML = jcontent.review;
document.getElementById("json-review").innerHTML = jcontent.rating;
