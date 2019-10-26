<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    unset($_SESSION['pass']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "feedback";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($id) {

            $sql = "DELETE FROM `feedback` where `id_feedback` = '{$id}'";
            db_q($sql);
            echo "Delete success Feedback_ID = $id!";
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
// phan trang
    $result = "select count(`id_feedback`) as `total` from `feedback`";
    ?>
    <?php include_once('header.php'); ?>

    <div class="content">
        <span class="glyphicon glyphicon-list"style="font-size: 30px;"> Feedback</span>
        <br><br>
        <div id="box" >
            <p>
    <?php if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                    <a class="delall" data-toggle="tooltip" title="DELETE ALL RECORD" style="font-size: 50px; color: black;"><span class="glyphicon glyphicon-trash"></span></a>
                <?php } ?>
            </p>
        </div>
        <br>
        <table class="table table-hover table-bordered" id="tbl">      
            <thead>
                <tr>
                    <th>FB ID</th>
                    <th>Mon ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th style="width: 100px">Date</th>
                    <th>Public</th>
    <?php if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                        <th style="width: 50px;">Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody id="myTable">
    <?php foreach ($list as $row) { ?>

                    <?php if ($row['is_public'] == 1 || ($_SESSION['username'] == 'Admin' && $_SESSION['level'] == 1)) {
                        ?>
                        <tr id="<?php echo $row['id_feedback']; ?>">
                            <td><?php echo $row['id_feedback']; ?></td>
                            <td><?php echo $row['mon_id']; ?></td>
                            <td><?php echo $row['viewer_name']; ?></td>
                            <td><?php echo $row['viewer_phone']; ?></td>
                            <td><?php echo $row['viewer_email']; ?></td>
                            <td><?php echo $row['viewer_comment']; ?></td>           
                            <td><?php echo $row['createdate']; ?></td>
                            <td>
            <?php if ($row['is_public'] == 1) { ?><h4 style="color: #33cc00;">Yes</h4>
            <?php } else { ?><h4 style="color: #ff0000;">No</h4><?php } ?>
                            </td>
                            <?php }if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                            <td>
                                <a  href="feedback_edit.php?edit=<?php echo $row['id_feedback']; ?>"style="font-size: 20px; color: black;"><button name="edit" value="edit" type="submit"><span class="glyphicon glyphicon-edit"></span></button></a>
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
