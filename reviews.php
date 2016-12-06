<?php $title = "Reviews";
include("top.php"); ?>

<!--
    TODO: Show Javascript by taking review from user and adding it to a loop
        Add the data to the review-section dynamically and also add it to vegpack table in a new column.
->

    <div class="container relative">
                <div class="row relative">
                    <div class="col-lg-2 add-review "> <!-- Could use bootstrap affix istead http://stackoverflow.com/questions/21868610/make-column-fixed-position-in-bootstrap -->
                        <form>
                            <div class="form-group">
                                <p>Username (get from session) </p>
                                <!-- Add user reviews to vegetablepackage -->
                                <label for="package-review">Greenbox</label>
                                <input type="text" name="packageReview" class="form-control" id="package-review"
                                       placeholder="Greenbox" required>
                            </div>
                            <div class="form-group">
                                <label for="review">Review</label>
                                <textarea name="review" class="form-control" id="review" placeholder="Review"
                                          rows="8"></textarea>
                            </div>

                            <div class="form-group">
                                <p>add rating system</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Greenbox</button>
                        </form>

                    </div>
                    <div class="col-lg-10 review-section">
                        <h2>Display reviews here</h2>
                        <section>
                            <h1>package name</h1>
                            <h4>reviewer</h4>
                            <span>Review description</span>
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



<?php include("bottom.php"); ?>