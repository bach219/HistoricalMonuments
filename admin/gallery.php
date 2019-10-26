<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    unset($_SESSION['pass']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "gallery";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($id) {

            $sql = "DELETE FROM `gallery` where `gal_id` = '{$id}'";
            db_q($sql);
            echo "Delete success Gallery_ID = $id!";
            exit();
        }
    }
    if (isset($_GET['table'])) {
        $table = $_GET['table'];
        if ($table) {

            $sql = "DELETE FROM `{$table}` WHERE `is_public` = 0";
            db_q($sql);
            echo "Delete success all record";
            exit();
        }
    }
    $result = "select count(`gal_id`) as `total` from `gallery`";
    ?>
    <?php include_once('header.php'); ?>

    <div class="content">
        <span class="glyphicon glyphicon-list" style="font-size: 30px;"> Gallery</span>
        <br><br>
        <div id="box" >
            <p>
                <?php if ($_SESSION['level'] == 1) { ?>
                    <a class="button" href="gallery_add.php" data-toggle="tooltip" title="ADD RECORD" style="font-size: 50px; color: black;"><span class="glyphicon glyphicon-plus"></span></a>
                <?php }if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                    <a class="delall" data-toggle="tooltip" title="DELETE ALL RECORD" style="font-size: 50px; color: black;"><span class="glyphicon glyphicon-trash"></span></a>
                <?php } ?>
            </p>
        </div>
        <br>
        <table class="table table-hover table-bordered" id="tbl">
    </div>
    <thead>
        <tr>
            <th>Gallery ID</th>
            <th>Monument ID</th>
            <th>Name</th>
            <th>Images</th>
            <th>Description</th>
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
                <tr id="<?php echo $row['gal_id']; ?>">
                    <td><?php echo $row['gal_id']; ?></td>
                    <td><?php echo $row['mon_id']; ?></td>
                    <td><?php echo $row['gal_name']; ?></td>
                    <td><img src="../images/<?php echo $row['gal_img']; ?>" class="img-responsive" style="width:40%"></td>
                    <td><?php echo $row['gal_description']; ?></td>
                    <td>
                        <?php if ($row['is_public'] == 1) { ?><h4 style="color: #33cc00;">Yes</h4>
                        <?php } else { ?><h4 style="color: #ff0000;">No</h4><?php } ?>
                    </td>
                <?php }if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                    <td>
                        <a href="gallery_edit.php?edit=<?php echo $row['gal_id']; ?>" style="font-size: 20px; color: black;"><button name="edit" value="edit" type="submit"><span class="glyphicon glyphicon-edit"></span></button></a>
                        <a class="remove" style="font-size: 20px; color: black;"><button name="delete" value="delete" type="submit"><span class="glyphicon glyphicon-trash"></span></button></a>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
        <?php include_once('page_body.php'); ?>
        <?php
    } else {
        echo '<h1> You did not <a href="login.php">Login</a></h1>';
    }
