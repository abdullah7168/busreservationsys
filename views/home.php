<?php
#main content page.
require('layout/header.php'); ?>
<?php 
#database quries goes here
 $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $queryreturn = $connection->query('SELECT * FROM buses');
    if ($queryreturn->num_rows > 0) {
        // output data of each row
     
 ?>
<!-- Content Goes Here -->
    <div class="container">
        <div class="row">
            <?php while($row = $queryreturn->fetch_assoc()) { ?>
            <div class="col-sm-4">
                <div class="bus-board">
                    <h1 class="title-board"><strong><?php echo $row['busname'] ?></strong></h1>
                    <div class="plank">
                        <p class="departure-time"><?php 
                                                        $busdeparttime =  $row['time'];
                                                        $time = date("h");
                                                        $timeremaining = (int)$busdeparttime - (int)$time;
                                                        echo $timeremaining. ' hours remaining';
                                                        
                                                    ?>
                        </p>
                        <p class="seats-avaliable"><?php echo $row['seats'] ?> Seats are remaining</p>
                        <button type="button" class="btn btn-custom-primary btn-flat">Get a Seat</button>
                    </div>
                </div>
            </div>
            <?php  }
                } else {
                    echo "0 results";
                } ?>
        </div>
        
    </div>
<!-- Content Ends Here -->
<?php require('layout/footer.php'); ?>