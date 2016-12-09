<!--
    This page is more or less created only to hit some marks for the course Web Applications as I already
    to the same task multiple places. I chose to take all the data from this form remove the required tags
    so I could use validateForm() on

-->
<?php $title = "Feedback";

include("top.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-10">

            <form id="form-feedback" name="form-feedback" method="POST" onclick="return validateForm(this)" action="processFeedback.php">
                <h2 class="form-feedback-heading">Add your feedback to the developer here</h2>
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" class="form-control" placeholder="Full Name" autofocus>
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address">
                <label for="gender">Gender</label><br>
                M<input type="radio" name="gender" value="M" /><span></span>
                F<input type="radio" name="gender" value="F" /><span></span><br>
                <label for="mail">Mail</label>
                <input type="mail" name="mail" class="form-control" placeholder="mail">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone">
                <label><input type="checkbox" name="satisfied" value="satisfied"> Are you satisfied with the page?</label><br>
                <label for="comment">Other Comments?</label>
                <textarea name="other" class="form-control" id="comment" placeholder="Other comments?"
                          rows="4"></textarea>
                <input class="btn btn-lg btn-primary btn-block" type="submit" name="feedback-submit" value="Submit Feedback"></input>
            </form>
        </div>
    </div>
</div>


<?php include("bottom.php"); ?>