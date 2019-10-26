<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    unset($_SESSION['pass']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "users";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($id) {
            $sql = "DELETE FROM `users` where `user_id` = '{$id}' ";
            db_q($sql);
            echo "Delete success User_ID = $id!";
            exit();
        }
    }
    if (isset($_GET['table'])) {
        $table = $_GET['table'];
        if ($table) {

            $sql = "DELETE FROM `{$table}` WHERE `user_id` <> 'Admin' AND `level` <> 1";
            db_q($sql);
            echo "Delete success all record";
            exit();
        }
    }
    $result = "select count(`user_id`) as `total` from `users`";
    ?>
    <?php include_once('header.php'); ?>

    <div class="content">
        <span class="glyphicon glyphicon-list" style="font-size: 30px;"> Users</span>
        <br><br>
        <div id="box" >
            <p>
    <?php if ($_SESSION['level'] == 1) { ?>
                    <a class="button" href="user_add.php" data-toggle="tooltip" title="ADD RECORD" style="font-size: 50px; color: black;"><span class="glyphicon glyphicon-plus"></span></a>
    <?php }if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                    <a class="delall" data-toggle="tooltip" title="DELETE ALL RECORD" style="font-size: 50px; color: black;"><span class="glyphicon glyphicon-trash"></span></a>
                <?php } ?>
            </p>
        </div>
        <br>
        <table  class="table table-hover" id="tbl">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Level</th>
    <?php if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                        <th style="width: 50px;">Action</th>
    <?php } ?>
                </tr>
            </thead>
            <tbody id="myTable">
                    <?php foreach ($list as $row) { ?>
                    <tr id="<?php echo $row['user_id']; ?>">
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td>
        <?php
        if ($row['username'] == 'Admin' && $row['level'] == '1') {
            echo '<div style="color: orange; font-size: 25px;">Admin</div>';
        } else if ($row['username'] != 'Admin' && $row['level'] == '1') {
            echo '<div style="color: #66ccff; font-size: 25px;">Assistant</div>';
        } else {
            echo '<div style="color: #66ff66; font-size: 25px;">Member</div>';
        }
        ?>
                        </td>

                        <?php if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                            <td>  
                                <?php if ($row['level'] != 1 || $row['username'] != 'Admin') { ?>
                                    <a href="user_edit.php?edit=<?php echo $row['user_id']; ?>" style="font-size: 20px; color: black;"><button name="edit" value="edit" type="submit"><span class="glyphicon glyphicon-edit"></span></button></a>
                                    <a class="remove" style="font-size: 20px; color: black;"><button name="delete" value="delete" type="submit"><span class="glyphicon glyphicon-trash"></span></button></a>
                                        <?php } ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php include_once('page_body.php'); ?>
                <?php
            } else {
                echo '<h1> You did not login </h1>';
                echo '<a href="login.php">Login</a>';
            }