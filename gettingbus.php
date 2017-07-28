<?php
# implements passenger getting a bus. 

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$busnumber = $post['bus-id'];
$seats = $post['seats'];
$does_have_select = false;
$error = false;
?>
<?php require('views/layout/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offet-2">
            <div class="white-board">
                <div class="text-center"><p class="lead">Fill in the form to book a seat.</p></div>
                <form action="process.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <input type="text" id="name" class="form-control form-custom-control" name="psg_name" placeholder="Your Name here.....">
                        <?php if(isset($_GET['error-name'])): ?>
                          <p class="text text-danger"><?php echo $_GET['error-name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" id="cnic" class="form-control form-custom-control" name="psg_cnic" placeholder="Your Cnic here.....">
                        <?php if(isset($_GET['error-cnic'])): ?>
                          <p class="text text-danger"><?php echo $_GET['error-cnic'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone" class="form-control form-custom-control" name="psg_phone" placeholder="Your Phone number here.....">
                        <?php if(isset($_GET['error-phone'])): ?>
                          <p class="text text-danger"><?php echo $_GET['error-phone'] ?></p>
                        <?php endif; ?>
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