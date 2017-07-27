<?php
# implements passenger getting a bus. 

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$busnumber = $post['bus-id'];
$seats = $post['seats'];

?>
<?php require('views/layout/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offet-2">
            <div class="white-board">
                <div class="text-center"><p class="lead">Fill in the form to book a seat.</p></div>
                <form action="process.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <input type="text" class="form-control form-custom-control" name="psg_name" placeholder="Your Name here.....">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-custom-control" name="psg_cnic" placeholder="Your Cnic here.....">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-custom-control" name="psg_phone" placeholder="Your Phone number here.....">
                    </div>
                    <input type="text" name="busid" hidden value="<?php echo $busnumber ?>">
                    <input type="text" name="seats" hidden value="<?php echo $seats ?>">
                    <input type="submit" name="submit" value="Go" class="btn btn-custom-primary">
                </form>
            </div>
        </div>
    </div>
</div>




<?php require('views/layout/footer.php'); ?>