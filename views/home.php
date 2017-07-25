<?php
#main content page.
require('layout/header.php'); ?>

<!-- Content Goes Here -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="bus-board">
                    <h1 class="title-board"><strong>BUS NAME</strong></h1>
                    <div class="plank">
                        <p class="seats-avaliable">20 Seats are remaining</p>
                        <button type="button" class="btn btn-primary btn-flat">Get a Seat</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="bus-board">
                    <div class="plank">
                        <p class="bus-name">Some Bus Name</p>
                        <p class="seats-avaliable">20 Seats are remaining</p>
                        <button type="button" class="btn btn-primary btn-flat">Get a Seat</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="bus-board">
                    <div class="plank">
                        <p class="bus-name">Some Bus Name</p>
                        <p class="seats-avaliable">20 Seats are remaining</p>
                        <button type="button" class="btn btn-primary btn-flat">Get a Seat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Content Ends Here -->
<?php require('layout/footer.php'); ?>