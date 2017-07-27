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
    
    #busflag 
    
    //sanitizing $_POST to $post 
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    if(!$post['submit']){
        $queryreturn = $connection->query('SELECT * FROM buses');
    } else{
        $cityfilter =  $post['destination'];
        $queryreturn = $connection->query("SELECT * FROM buses WHERE destination='".$cityfilter."'");
    }
    //$queryreturn = $connection->query('SELECT * FROM buses');
    
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
                        <p class="departure-time">
                            <?php
                             date_default_timezone_set("Asia/Karachi");
                             $busdeparttime = date("H", strtotime($row['time'])); 
                             //echo $busdeparttime.'</br>';
                             $currenttime = date('H');
                             //echo $currenttime;
                             if((int)$busdeparttime > (int)$currenttime){
                                 echo 'Bus is not avaliable';
                                 $busflag = false;
                             } elseif((int)$busdeparttime < (int)$currenttime){
                                 $timeremaining = (int)$currenttime - (int)$busdeparttime;
                                 echo $timeremaining.' hours remaining';
                                 $busflag = true;
                             } else {
                                 echo 'Bus is about to set of for '.$row['destination'];
                             }
                            ?>
                        </p>
                        <p class="seats-avaliable"> to <?php echo $row['destination'] ?></p>
                        <p class="seats-avaliable"><?php echo $row['seats'] ?> Seats are remaining</p>
                        <?php if($busflag){ ?>
                            <form action="gettingbus.php" method="POST">
                                <input type="text" name="bus-id" hidden value="<?php echo $row['id'] ?>">
                                <input type="text" name="seats" hidden value="<?php echo $row['seats'] ?>">
                                <button type="submit" name="submit" class="btn btn-custom-primary btn-flat">Get a Seat</button>
                            </form>
                        <?php }else{ ?>
                            <button type="button" class="btn btn-custom-primary btn-flat" disabled>Get a Seat</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php  }
                } else {
            ?>
            <div class="col-sm-6 col-sm-offset-2">
                <p class="alert alert-info">There are no buses for <?php echo $cityfilter; ?> yet, Try again later</p>
            </div>
            <?php 
            } ?>
        </div>
        
    </div>
<!-- Content Ends Here -->
<?php require('layout/footer.php'); ?>