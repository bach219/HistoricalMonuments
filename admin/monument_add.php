<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';
    // Ki?m tra quy?n, n?u không có quy?n thì chuy?n nó v? trang logout
    if ($_SESSION['level'] != 1) {
        header('location: logout.php');
        ;
    }
    if (isset($_POST['Back'])) {
        unset($_SESSION['pass']);
        header('location: monuments.php');
    }
    unset($_SESSION['name_mon_add']);
    unset($_SESSION['history_mon_add']);
    unset($_SESSION['monument_image_add']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "Add Monument";
    if (isset($_POST['Submit'])) {
        unset($_SESSION['pass']);

        //-----------------------------------------------------upload image-----------------------------------------------------------------
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $_SESSION['monument_image_add'] = "<h3 style='color: red;'>File is not an image.<h3>";
            $uploadOk = 0;
            goto end;
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['monument_image_add'] = "<h3 style='color: red;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<h3>";
            $uploadOk = 0;
            goto end;
        }
        if ($uploadOk == 1) {
            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            }
        }


        if (empty($_POST['history_mon'])) {
            $_SESSION['history_mon_add'] = "<h3 style='color: red;'>Description is empty !</h3>";
            goto end;
        }


        $sql = "SELECT COUNT(*) FROM `monuments` WHERE `name_mon`='{$_POST['name_mon']}' AND `zone_id` = '{$_POST['zone_id']}'";
        $count = (int) db_one($sql);
        if ($count) {
            $_SESSION['name_mon_add'] = "<h3 style='color: red;'>Error - The monument `{$_POST['name_mon']}` already exists !</h3>";
            goto end;
        }

        $history_mon = db_escape($_POST['history_mon']);
        $name = db_escape($_POST['name_mon']);
        $zone = db_escape($_POST['zone_id']);
        $newname = db_escape($_FILES["fileToUpload"]["name"]);
        $sql = "INSERT INTO `monuments` 
            SET `name_mon` = '{$name}',
            `zone_id` = '{$zone}',
            `image` = '{$newname}',
            `history_mon` = '{$history_mon}',
            `is_public` = '{$is_public}'
          ";
        // execute query
        db_q($sql);
        $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Add monument successfully!
                            </div>";
        //header('location: monuments.php');
    }
    end:
    ?>
    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">

            <h1>Add Monument</h1>
    <?php echo $_SESSION['pass']; ?>

            <form id="main-form" method="post" action="monument_add.php" enctype="multipart/form-data">

                <table class="table table-hover table-bordered">
                    <tr>
                        <td width="200px">Name Monument</td>
                        <td>
                            <input type="text" id="name_mon" name="name_mon" required/>
    <?php echo $_SESSION['name_mon_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Zone</td>
                        <td>
                            <select name="zone_id">
                                <option value=''>-- Chose ZoneID --</option>
                                <?php
                                $sql = "select * from `zones` order by `id_zone` asc";
                                $query = db_q($sql);
                                foreach ($query as $data) {
                                    ?>
                                    <option value='<?php echo $data["id_zone"]; ?>'><?php echo $data["name_zone"]; ?></option>
                            <?php } ?>
                            </select>
    <?php echo $_SESSION['zone_mon_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
    <?php echo $_SESSION['monument_image_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Monument History</td>
                        <td>
                            <textarea id="history_mon" type="text" cols="40" rows="4" name="history_mon" placeholder="Description..."></textarea>
    <?php echo $_SESSION['history_mon_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Public</td>
                        <td>
                            <select name="is_public" required>
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
                            <td><input name="Submit" type="submit" value="Submit" /></td></form>
                        <form  method="post" action="monument_add.php">
                            <td><input name="Back" type="submit" value="Back" /></td>
                        </form>
                        </tr>
                    </div>
                </table>

        </div>
    </div>
    </div>
    </body>

    </html>

    <script type="text/javascript">
        config = {};
        config.entities_latin = false;
        config.language = "vi";
        CKEDITOR.replace('history_mon', config);
    </script>
    <?php
} else {
    echo '<h1>You did not login';
    echo "'<a href='login.php'>'Login'</a>'</h1>";
}
