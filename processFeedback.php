<?php $title = "Taking this data to database";

include("top.php");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
        <?php
        if(isset($_POST['feedback-submit'])){ //check if form was submitted
            $fullname = $_POST['fullname']; //get input text
            $address = $_POST['address']; //get input text
            $gender = $_POST['gender']; //get input text
            $mail = $_POST['mail']; //get input text
            $phone = $_POST['phone']; //get input text
            $satisfied = (isset($_POST['satisfied']) ? true : false);
            $comment = $_POST['comment']; //get input text

            $allFields = array($fullname, $address, $gender, $mail, $phone, $satisfied, $comment);

            // check if each field in fields isset() or empty
            foreach($allFields AS $field)
            {
                if (isset($_POST[$field]) && !empty($_POST[$field]))
                {
                    echo "$field is set<br>";

                } else {
                    echo "You didn't fill in $field <br>";
                }
            }
        }
        ?>
        </div>
    </div>
</div>
<?php
include("bottom.php");
?>