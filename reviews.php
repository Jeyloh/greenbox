<?php $title = "Reviews";

if(isset($_POST["submit"]))  
{  
    if(file_exists('reviews.json'))  
    {  
        $current_data = file_get_contents('reviews.json');  
        $array_data = json_decode($current_data, true);  
        $extra = array(  
             'username' => $_POST['username'],  
             'box' => $_POST["box"],  
             'review'=> $_POST["review"],  
             'rating'=> $_POST["rating"]
        );  
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        ifile_put_contents('reviews.json', $final_data);
    }  
    else  
    {  
        echo 'JSON File not exits';  
    }
} 

include("top.php"); 

?>

<!--
    TODO: Show Javascript by taking review from user and adding it to a loop
        Add the data to the review-section dynamically and also add it to vegpack table in a new column.
-->

            <div class="container">
                <div class="row">
                    <div class="col-lg-2 add-review "> 
                        <form id="review-form" class="form-group" enctype='application/json' method="POST" action=""> <!-- Send to json -->
                            <label for="username-review">Username</label>
                            <input type="text" class="form-control" id="username-review" name='username' value=''>

                            <label for="package-review">Package</label>
                            <input type="text" class="form-control" id="package-review" name='box' value=''>

                            <label for="comment-review">Review</label>
                            <textarea name="review" class="form-control" id="comment-review" placeholder=""
                                      rows="8"></textarea>

                            <label for="rating-review">Rate it!</label>
                            <div class="rating">
                                1<input type="radio" name="rating" value="1" /><span></span>
                                2<input type="radio" name="rating" value="2" /><span></span>
                                3<input type="radio" name="rating" value="3" /><span></span>
                                4<input type="radio" name="rating" value="4" /><span></span>
                                5<input type="radio" name="rating" value="5" checked/><span></span>
                            </div>

                            <input type="submit" name="submit" value="Add Greenbox" onclick="appendReview(username-review,package-review,rating-review, comment-review)" class="btn btn-success">
                        </form>
                    </div>
                    <div class="col-lg-10 review-section">
                        <div id="result"> </div>

                        <h2>Display reviews here</h2>
                        <section>
                            <h1 id="json-name"></h1>
                            <h4 id="json-box"></h4>
                            <p id="json-rating"></p>
                            <span id="json-review"></span>
                        </section>
                        <section>
                            <h1>package name</h1>
                            <h4>reviewer</h4>
                            <span>Review description</span>
                        </section><section>
                            <h1>package name</h1>
                            <h4>reviewer</h4>
                            <span>Review description</span>
                        </section>

                    </div>

                </div>
            </div>
        </div>
    </div>

<script>
    // Using AJAX to send a live request to invokeAjax.php
    function appendReview(user, box, review, rating) {
        $.ajax({
            url: 'reviews.json', //or php file that asserts this code to the json file?
            data: {_user: user, _box: box, _review: review, _rating: rating},
            type: 'post',
            success: function () {
                // Reference the current row and remove it
                $('.row'+pid).remove();
                alert("Package with ID " + pid + " is removed from DB")
            }
        });
    }

</script>

<?php include("bottom.php"); ?>