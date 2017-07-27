<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bus Reservation App</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,700i,800|Raleway:100,200,300,300i,400,400i,500,500i,600,700,700i,800,900" rel="stylesheet">
        <link href="assets/app.css?v=1.0.0" rel="stylesheet">
    </head>
    <body>
    <header class="header">
        <div class="container">
            <div class="menu menut-top">
            <form class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="destination">Where you want to go?</label>
                        <select name="destination" class="form-control form-custom-control">
                            <option value="Islamabad">Islamabad</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Rawalpindi">Rawalpindi</option>
                            <option value="Gujrat">Gujrat</option>
                            <option value="Dikhan">DI Khan</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6" style="padding-top:23px;">
                    <input type="submit" name="submit" class="btn btn-custom-primary btn-flat" value="Get a bus"/>
                </div>
            </form>
            </div>
        </div>
    </header>
    <div class="clearfix"></div>
