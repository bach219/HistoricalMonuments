<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    // //create utf-8
    header('Content-Type: text/html; charset=utf-8');

    // check the access right
    if ($_SESSION['level'] != 1 || $_SESSION['username'] != 'Admin') {
        header('location: logout.php');
    }
    if (isset($_POST['Back'])) {
        header('location: advertisement.php');
    }
    unset($_SESSION['id_ad']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "advertisement_edit";

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $_SESSION['id_ad'] = $id;
        if ($id) {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            }
            $sql = "SELECT * FROM `advertisement` WHERE `id_ad` = '{$id}'";
            $user = db_row($sql);
        }
    }

    if (isset($_POST['id']) && isset($_POST['radio_name']) && isset($_POST['number']) && isset($_POST['price']) && isset($_POST['from']) && isset($_POST['choice']) && isset($_POST['departure']) && isset($_POST['arrival']) && isset($_POST['vehicle_status']) && isset($_POST['is_public'])) {

        $vehicle_name = db_escape($_POST['radio_name']);
        $vehicle_number = db_escape($_POST['number']);
        $vehicle_price = db_escape($_POST['price']);
        $travel_from = db_escape($_POST['from']);
        $mon_id = db_escape($_POST['choice']);
        $departure = db_escape($_POST['departure']);
        $arrival = db_escape($_POST['arrival']);
        $vehicle_status = db_escape($_POST['vehicle_status']);
        $is_public = db_escape($_POST['is_public']);

        $sql = "UPDATE `advertisement` 
            SET `vehicle_name` = '{$vehicle_name}',
                `vehicle_number` = '{$vehicle_number}',
            `vehicle_price` = '{$vehicle_price}',
            `travel_from` = '{$travel_from}',
            `mon_id` = '{$mon_id}',
            `departure_time` = '{$departure}',
            `arrival_time` = '{$arrival}',
            `vehicle_status` = '{$vehicle_status}',
            `is_public` = '{$is_public}'                       
            WHERE `id_ad` = '{$_POST['id']}'
          ";
        // execute query
        db_q($sql);
        //header('location: advertisement_edit.php?edit='.$_SESSION['id_ad'].'');
        echo "Edit success Advertisement_ID = {$_POST['id']}";
        exit();
        //$sql = "SELECT * FROM `advertisement` WHERE `id_ad` = '{$_SESSION['id_ad']}'";
        //$user = db_row($sql);
    }end:
    ?>
    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">
            <h2>Edit Advertisement Form</h2>

            <br>
            <form action="advertisement_edit.php" method="post">
                <table class="table table-hover table-bordered" >
                    <tr>
                        <td><label for="id_ad">Advertisement ID</label></td>
                        <td>
                            <?php echo $user['id_ad']; ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="200px">Choose Monument</td>
                        <td>
                            <select name="choice">
                                <option value='<?php echo $user['mon_id']; ?>'><?php echo $user['mon_id']; ?></option>
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
                        <td>Vehicle Name</td>
                        <td>
                            <p>
                                <label class="radio-inline">
                                    <input type="radio" name="name" id="Plane" value="Plane" <?php if ($user['vehicle_name'] == 'Plane') { ?> checked <?php } ?>>
                                    Plane
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="name" id="Train" value="Train" <?php if ($user['vehicle_name'] == 'Train') { ?> checked <?php } ?>>
                                    Train
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="name" id="Bus" value="Bus"   <?php if ($user['vehicle_name'] == 'Bus') { ?> checked <?php } ?>>
                                    Bus
                                </label>
                            </p>

                        </td>
                    </tr>
                    <tr>
                        <td>Vehicle Number</td>
                        <td>
                            <input type="number" id="number" name="number" placeholder="<?php echo $user['vehicle_number']; ?>" value="<?php echo $user['vehicle_number']; ?>" data-validation="number" data-validation-error-msg="You did not enter a valid number"/>

                        </td>
                    </tr>
                    <tr>
                        <td>Vehicle Price</td>
                        <td>
                            <input type="text" id="price" name="price" placeholder="<?php echo $user['vehicle_price']; ?>" value="<?php echo $user['vehicle_price']; ?>" data-validation="number" data-validation-allowing="float" 
                                   data-validation-decimal-separator="," data-validation-error-msg="You did not enter a valid number"/>


                        </td>
                    </tr>

                    <tr>
                        <td>Travel From</td>
                        <td>
                            <input type="text" id="from" name="from" placeholder="<?php echo $user['travel_from']; ?>" value="<?php echo $user['travel_from']; ?>" data-validation="required"/>


                        </td>
                    </tr>

                    <tr>
                        <td>Departure Time</td>
                        <td>
                            <input type="datetime" id="departure" name="departure" placeholder="<?php echo $user['departure_time']; ?>" value="<?php echo $user['departure_time']; ?>" data-validation="datetime-local" data-validation-error-msg="You did not enter a valid departure"/>


                        </td>
                    </tr>

                    <tr>
                        <td>Arrival Time</td>
                        <td>
                            <input type="datetime" id="arrival" name="arrival" placeholder="<?php echo $user['arrival_time']; ?>" value="<?php echo $user['arrival_time']; ?>" data-validation="datetime-local" data-validation-error-msg="You did not enter a valid arrival"/>


                        </td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            <p>
                                <label class="radio-inline">
                                    <input type="radio" name="vehicle_status" id="vehicle_status" value="Vacant" <?php if ($user['vehicle_status'] == 'Vacant') { ?> checked <?php } ?>>
                                    Vacant
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="vehicle_status" id="vehicle_status" value="Full" <?php if ($user['vehicle_status'] == 'Full') { ?> checked <?php } ?>>
                                    Full
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="vehicle_status" id="vehicle_status" value="Departed" <?php if ($user['vehicle_status'] == 'Departed') { ?> checked <?php } ?>>
                                    Departed
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="vehicle_status" id="vehicle_status" value="Arrived" <?php if ($user['vehicle_status'] == 'Arrived') { ?> checked <?php } ?>>
                                    Arrived
                                </label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>Public</td>
                        <td>
                            <select name="is_public" id="is_public" data-validation="number" data-validation-error-msg="You did not enter a valid public">
                                <option value="<?php echo $user['is_public']; ?>">-- <?php echo $user['is_public']; ?> --</option>
                                <option value="1" style="color: greenyellow;">Yes</option>
                                <option value="0" style="color: red;">No</option>
                            </select>
                        </td>
                    </tr>
                    <div class="controls">
                        <tr>
                            <td><a class="edit" style="font-size: 25px; color: black;"><span class="glyphicon glyphicon-check"></span></a></td>
                            <td><a style="font-size: 25px; color: black;" href="advertisement.php"><span class="glyphicon glyphicon-backward"></span></a></td>
                        </tr>
                    </div>
                </table>

            </form>
        </div>

        <script type="text/javascript">
            $(".edit").click(function () {
                var id = <?php echo $_SESSION['id_ad']; ?>;
                var choice = $("#choice").val();
                var radio_name = $("input[name*='name']:checked").val();
                var number = $("#number").val();
                var price = $("#price").val();
                var from = $("#from").val();
                var departure = $("#departure").val();
                var arrival = $("#arrival").val();
                var vehicle_status = $("input[name*='vehicle_status']:checked").val();
                var is_public = $("#is_public").val();

                //if(confirm('Are you sure to delete <?php echo $_SESSION['title']; ?>_id = '+id+' ?')){
                $.ajax({
                    url: '<?php echo $_SESSION['title']; ?>.php',
                    type: 'post',
                    data: {id: id,
                        choice: choice,
                        radio_name: radio_name,
                        number: number,
                        price: price,
                        from: from,
                        departure: departure,
                        arrival: arrival,
                        vehicle_status: vehicle_status,
                        is_public: is_public},
                    error: function () {
                        alert('Something is wrong');
                    },
                    success: function (data) {
                        swal({
                            title: "Edit successfully!",
                            text: "Advertisement_ID = " + id + " is edited!",
                            icon: "success",
                            button: "OK",
                        });
                        //toastr.options.timeOut = 100000;//10s
                        //toastr["success"](data);
                        //alert("Record removed successfully");  
                    }
                });
                //}
            });
        </script>         

        <?php
    } else {
        echo 'You did not <a href="login.php">login</a>';
    }
