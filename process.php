<?php
$does_have_select = false;
 require('views/layout/header.php'); ?>
<?php

require('Config.php');

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

 // Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



if($_POST['submit']){
    $psg_name = $_POST['psg_name'];
    $psg_cnic = $_POST['psg_cnic'];
    $psg_phone = $_POST['psg_phone'];
    $busid = $_POST['busid'];
    $seats = $_POST['seats'];
    $error = false;
    if(!preg_match('/^[A-z]+$/',$psg_name)){
         header('Location: gettingbus.php? error-name= Empty or Invalid Name');
         
    }
    if(!preg_match('/^[0-9]+$/',$psg_cnic)){
        header('Location: gettingbus.php? error-cnic= Empty or Invalid Cnic, Only numbers are allowed.');
    }
    if(!preg_match('/^[0-9]+$/',$psg_phone)){
        header('Location: gettingbus.php? error-phone= Empty or Invalid Phone number.');
    }

     ?>
     <!-- content goes here -->
    <div class="container">
        <div class="col-sm-6 col-sm-offset-2">
            <ul class="passenger-list">
                <li class="list-element">Passenger Name: <?php echo $psg_name ?></li>
                <li class="list-element">CNIC: <?php echo $psg_cnic ?></li>
                <li class="list-element">PHONE: <?php echo $psg_phone ?></li>
                <li class="list-element">Your seat Number is  <span class="seats"><?php echo $seats ?></span></li>
            </ul>
        </div>
    </div>
   <!-- content ends here -->
     
     
     
     <?php           
                
    $query = $connection->query("INSERT INTO passengers (cnic,phone,seat_number,passenger_name,bus_id) VALUES (
        '$psg_cnic',
        '$psg_phone',
        '$seats',
        '$psg_name',
         '$busid'
        )");
    
    $getbusdata = $connection->query("SELECT seats FROM buses WHERE id ='" .$busid."'");

    if ($getbusdata->num_rows > 0) {
        $row = $getbusdata->fetch_assoc();
        $previousseatnumber = $row['seats'];
        $newseatnumber = (int)$previousseatnumber - 1;
        $updating_newseats = $connection->query("UPDATE buses SET seats = '$newseatnumber' WHERE id='" .$busid."'");
        if(count($updating_newseats)){
            // test unit for update query.
        }
    } else {
        echo 'koi rolla hy';
    }
    if (count($query) > 0) {
       // echo "New record created successfully"; test case for query
    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    $connection->close();
}
?>


<?php require('views/layout/footer.php'); ?>