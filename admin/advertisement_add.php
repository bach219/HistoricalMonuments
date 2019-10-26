<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    if ($_SESSION['level'] != 1) {
        header('location: logout.php');
        ;
    }
    if (isset($_POST['Back'])) {
        unset($_SESSION['pass']);
        header('location: advertisement.php');
    }

    unset($_SESSION['vehicle_status']);
    unset($_SESSION['vehicle_name_add']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "advertisement_add";

    if (isset($_POST['Submit'])) {
        unset($_SESSION['pass']);
        //if (isset($_POST['radio_name']) && isset($_POST['number'])&& isset($_POST['price']) && isset($_POST['from'])&& isset($_POST['choice']) && isset($_POST['departure'])&& isset($_POST['arrival']) && isset($_POST['vehicle_status'])&& isset($_POST['is_public']) ) {
        if (empty($_POST['name'])) {
            $_SESSION['vehicle_name_add'] = "<h3 style='color: red;'>Vehicle name is empty</h3>";
            //echo "<h3 style='color: red;'>Vehicle name is empty</h3>";
            goto end;
        }
        if (empty($_POST['vehicle_status'])) {
            $_SESSION['vehicle_status'] = "<h3 style='color: red;'>Vehicle status is empty</h3>";
            goto end;
        }

        $sql = "SELECT COUNT(*) FROM `advertisement` WHERE `vehicle_name`='{$_POST['name']}' AND `travel_from` = '{$_POST['from']}' AND `arrival_time` = '{$_POST['arrival_time']}'";
        $count = (int) db_one($sql);
        if ($count) {
            $_SESSION['vehicle_name_add'] = "<h3 style='color: red;'>Error `{$_POST['name_mon']}`-`{$_POST['travel_from']}`-`{$_POST['arrival_time']}` already exists !</h3>";
            goto end;
        }


        $vehicle_name = db_escape($_POST['name']);
        $vehicle_number = db_escape($_POST['number']);
        $vehicle_price = db_escape($_POST['price']);
        $travel_from = db_escape($_POST['from']);
        $mon_id = db_escape($_POST['choice']);
        $departure_time = db_escape($_POST['departure']);
        $arrival_time = db_escape($_POST['arrival']);
        $vehicle_status = db_escape($_POST['vehicle_status']);
        $is_public = db_escape($_POST['is_public']);

        $sql = "INSERT INTO `advertisement` 
            SET `vehicle_name` = '{$vehicle_name}',
                `vehicle_number` = '{$vehicle_number}',
            `vehicle_price` = '{$vehicle_price}',
            `travel_from` = '{$travel_from}',
            `mon_id` = '{$mon_id}',
            `departure_time` = '{$departure_time}',
            `arrival_time` = '{$arrival_time}',
            `vehicle_status` = '{$vehicle_status}',
            `is_public` = '{$is_public}'
          ";
        //$id = mysqli_insert_id($link);
        // execute query
        db_q($sql);
        //header('location: advertisement_add.php');
        $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Add advertisement successfully!
                            </div>";
    }end:
    ?>

    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">

            <h1>Add Advertisement</h1>
            <?php echo $_SESSION['pass']; ?>

            <form method="post" action="advertisement_add.php" id="myForm">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td width="200px">Choose Monument</td>
                        <td>
                            <select name="choice" id='choice' required>
                                <option value=''>Select Monument</option>
                                <?php
                                $sql = "select * from `monuments` order by `name_mon` asc";
                                $query = db_q($sql);
                                foreach ($query as $data) {
                                    ?>
                                    <option value='<?php echo $data["id_mon"]; ?>'><?php echo $data["name_mon"]; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Vehicle Name</td>
                        <td>
                            <p>
                                <label class="radio-inline">
                                    <input type="radio" name="name" id="radio_name" value="Plane">
                                    Plane
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="name" id="radio_name" value="Train">
                                    Train
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="name" id="radio_name" value="Bus">
                                    Bus
                                </label>
                            </p>
                            <?php echo $_SESSION['vehicle_name_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Vehicle Number</td>
                        <td>
                            <input type="number" id="number" name="number" required>

                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Vehicle Price</td>
                        <td>
                            <input type="text" id="price" name="price" required>

                        </td>
                    </tr>

                    <tr>
                        <td width="200px">Travel From</td>
                        <td>
                            <input type="text" id="from" name="from" required>

                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Departure Time</td>
                        <td>
                            <input type="datetime-local" id="departure" name="departure" required />

                        </td>
                    </tr>

                    <tr>
                        <td width="200px">Arrival Time</td>
                        <td>
                            <input type="datetime-local" id="arrival" name="arrival" required />

                        </td>
                    </tr>

                    <tr>
                        <td width="200px">Status</td>
                        <td>
                            <p>
                                <label class="radio-inline">
                                    <input type="radio" name="vehicle_status" id="vehicle_status" value="Vacant">
                                    Vacant
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="vehicle_status" id="vehicle_status" value="Full">
                                    Full
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="vehicle_status" id="vehicle_status" value="Departed">
                                    Departed
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="vehicle_status" id="vehicle_status" value="Arrived">
                                    Arrived
                                </label>
                            </p>
                            <?php echo $_SESSION['vehicle_status']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Public</td>
                        <td>
                            <select name="is_public" id="is_public" required>
                                <option value="">-- Public --</option>
                                <?php if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                                    <option value="1" style="color: greenyellow;">Yes</option>
                                    <option value="0" style="color: red;">No</option>
                                <?php } else { ?> 
                                    <option value="0" style="color: red;">No</option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <div class="controls">
                        <tr>
                            <td><input id="Submit" name="Submit" type="submit" value="Submit" /></td>
                            </form>
                        <form method="post" action="advertisement_add.php">
                            <td><input name="Back" type="submit" value="Back" /></td>
                        </form>
                        </tr>
                    </div>
                </table>
            </form>

        </div>
    </div>
    </div>
    </body>

    </html>

    <?php
} else {
    echo '<h1>You did not <a href="login.php">Login</a></h1>';
}
