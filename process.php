<?php require('views/layout/header.php'); ?>
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
        echo (string)$newseatnumber;
        $updating_newseats = $connection->query("UPDATE buses SET seats = '$newseatnumber' WHERE id='" .$busid."'");
        if(count($updating_newseats)){
            echo 'query ran';
        }
    } else {
        echo 'koi rolla hy';
    }
    if (count($query) > 0) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    $connection->close();
}
?>

<!-- content goes here -->
    <div class="container">
        <div class="col-sm-6 col-sm-offset-2">
            <ul class="passenger-list">
                <li class="list-element">Passenger Name</li>
                <li class="list-element">CNIC</li>
                <li class="list-element">PHONE</li>
                <li class="list-element">Seat Number</li>
            </ul>
        </div>
    </div>
<!-- content ends here -->
<?php require('views/layout/footer.php'); ?>