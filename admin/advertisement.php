<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    unset($_SESSION['pass']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "advertisement";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($id) {

            $sql = "DELETE FROM `advertisement` where `id_ad` = '{$id}'";
            db_q($sql);
            echo "Delete success Ad_ID = $id!";
            exit();
        }
    }
    if (isset($_GET['table'])) {
        $table = $_GET['table'];
        if ($table) {

            $sql = "DELETE FROM `{$table}`";
            db_q($sql);
            echo "Delete success all record";
            exit();
        }
    }

    $result = "select count(`id_ad`) as `total` from `advertisement`";
    ?>

    <?php include_once('header.php'); ?>


    <div class="content"> 

        <span class="glyphicon glyphicon-list" style="font-size: 30px;" > Advertisement</span>
        <br><br>
        <div id="box" >
            <p>
    <?php if ($_SESSION['level'] == 1) { ?>
                    <a class="button" href="advertisement_add.php" data-toggle="tooltip" title="ADD RECORD" style="font-size: 50px; color: black;"><span class="glyphicon glyphicon-plus"></span></a>
                <?php }if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                    <a class="delall" data-toggle="tooltip" title="DELETE ALL RECORD" style="font-size: 50px; color: black;"><span class="glyphicon glyphicon-trash"></span></a>
                <?php } ?>  
            </p>
        </div>
        <br>    
        <table  class="table table-hover table-bordered" id="tbl" >
            <thead>
                <tr>
                    <th>Ad ID</th>
                    <th>Mon ID</th>
                    <th>Vehicle Name</th>
                    <th>Vehicle Number</th>
                    <th>Vehicle Price</th>
                    <th>Travel From</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Status</th>
                    <th>Public</th>
    <?php if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                        <th style="width: 50px;">Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody id="myTable">
    <?php
    foreach ($list as $row) {
        if ($row['is_public'] == 1 || ($_SESSION['username'] == 'Admin' && $_SESSION['level'] == 1)) {
            ?>
                        <tr id="<?php echo $row['id_ad']; ?>">
                            <td><?php echo $row['id_ad']; ?></td>
                            <td><?php echo $row['mon_id']; ?></td>
                            <td><?php echo $row['vehicle_name']; ?></td>
                            <td><?php echo $row['vehicle_number']; ?></td>
                            <td><?php echo $row['vehicle_price']; ?></td>
                            <td><?php echo $row['travel_from']; ?></td>
                            <td><?php echo $row['departure_time']; ?></td>
                            <td><?php echo $row['arrival_time']; ?></td>
                            <td >
            <?php if ($row['vehicle_status'] == 'Vacant') { ?><h4 style="color: #66ff66;">Vacant</h4>
                                <?php } else if ($row['vehicle_status'] == 'Full') { ?><h4 style="color: #ff6600;">Full</h4>
                                <?php } else if ($row['vehicle_status'] == 'Departed') { ?><h4 style="color: #ff0033;">Departed</h4>
                                <?php } else { ?><h4 style="color: #66ccff;">Arrived</h4><?php } ?>
                            </td>
                            <td>
            <?php if ($row['is_public'] == 1) { ?><h4 style="color: #33cc00;">Yes</h4>
                                <?php } else { ?><h4 style="color: #ff0000;">No</h4><?php } ?>
                            </td>
                            <?php } if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                            <td>   
                                <a  href="advertisement_edit.php?edit=<?php echo $row['id_ad']; ?>" style="font-size: 20px; color: black;"><button name="edit" value="edit" type="submit"><span class="glyphicon glyphicon-edit"></span></button></a>
                                <a class="remove" style="font-size: 20px; color: black;"><button name="edit" value="edit" type="submit"><span class="glyphicon glyphicon-trash"></span></button></a>
                            </td>
        <?php } ?>   
                    </tr>  
                    <?php } ?>

                <?php include_once('page_body.php'); ?>

                <?php
            } else {
                echo '<h1> You did not <a href="login.php">Login</a> </h1>';
            }