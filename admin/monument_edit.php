<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    header('Content-Type: text/html; charset=utf-8');

    // Check admin
    if ($_SESSION['level'] != 1 || $_SESSION['username'] != 'Admin') {
        header('location: logout.php');
    }

    if (isset($_GET['edit'])) {
        unset($_SESSION['history_mon_edit']);
        unset($_SESSION['title']);
        $_SESSION['title'] = "Edit Monument";
        $id = $_GET['edit'];
        if ($id) {

            $sql1 = "SELECT * FROM `monuments` WHERE `id_mon` = '{$id}'";
            $user = db_row($sql1);
        }
    }

    if (isset($_POST['Back'])) {
        unset($_SESSION['pass']);
        header('location: monuments.php');
    }

    if (isset($_POST['Save'])) {
        unset($_SESSION['pass']);
        unset($_SESSION['id_mon']);
        $_SESSION['id_mon'] = $_POST['id_mon'];

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
            $_SESSION['monument_image'] = "<h3 style='color: red;'>File is not an image.<h3>";
            $uploadOk = 0;
            goto end;
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['monument_image'] = "<h3 style='color: red;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<h3>";
            $uploadOk = 0;
            goto end;
        }
        if ($uploadOk == 1) {
            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            }
        }

        if (empty($_POST['history_mon'])) {
            $_SESSION['history_mon_edit'] = "Description is empty !";
            goto end;
        }

        $history_mon = db_escape($_POST['history_mon']);
        $name = db_escape($_POST['name_mon']);
        $zone = db_escape($_POST['zone_id']);
        $newname = db_escape($_FILES["fileToUpload"]["name"]);

        $sql = "UPDATE `monuments` 
            SET `name_mon` = '{$name}',
            `zone_id` = '{$zone}',
            `image` = '{$newname}',
            `history_mon` = '{$history_mon}',
            `is_public` = '{$_POST['is_public']}'
            WHERE `id_mon` = '{$_POST['id_mon']}'
          ";
        // execute query
        db_q($sql);
        $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Edit Monument_Id = " . $_SESSION['id_mon'] . " successfully!
                            </div>";
        header('location: monument_edit.php?edit=' . $_SESSION['id_mon'] . '');
    }
    end:
    ?>
    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">
            <h2>Edit Monument Form</h2>
            <?php echo $_SESSION['pass']; ?>

            <form action="monument_edit.php" method="post" enctype="multipart/form-data">
                <table class="table table-bordered table-hover">
                    <div class="form-group">
                        <tr>
                            <td><label for="id_mon">Monument ID</label></td>
                            <td>
                                <input type="number" name="id_mon" placeholder="<?php echo $user['id_mon']; ?>" value="<?php echo $user['id_mon']; ?>" max="<?php echo $user['id_mon']; ?>" min="<?php echo $user['id_mon']; ?>" required/>

                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="name_mon">Monument Name</label></td>
                            <td>
                                <input type="text" name="name_mon" placeholder="<?php echo $user['name_mon']; ?>" value="<?php echo $user['name_mon']; ?>" required/>
                                <?php echo $_SESSION['name_mon_edit']; ?>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="zone_id">Zone</label></td>
                            <td>
                                <select name="zone_id">
                                    <option value='<?php echo $user['zone_id']; ?>'>-- <?php echo $user['zone_id']; ?> --</option>
                                    <?php
                                    $sql = "select * from `zones` order by `id_zone` asc";
                                    $query = db_q($sql);
                                    foreach ($query as $data) {
                                        ?>
                                        <option value='<?php echo $data["id_zone"]; ?>'><?php echo $data["name_zone"]; ?></option>
    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="image">Image</label></td>
                            <td>
                                <input type="file" name="fileToUpload" id="fileToUpload"  placeholder="<?php echo $user['image']; ?>" value="<?php echo $user['image']; ?>" required>
                                <?php echo "<h3 style='color: green;'>" . $user['image'] . "<h3>"; ?>
    <?php echo $_SESSION['monument_image']; ?>
                            </td>
                        </tr>
                    </div>

                    <div class="form-group">
                        <tr>
                            <td><label for="history_mon">Monument History</label></td>
                            <td><textarea id="history_mon" cols="40" rows="4" name="history_mon" required><?php echo $user['history_mon']; ?></textarea>
    <?php echo $_SESSION['history_mon_edit']; ?>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td>Public</td>
                            <td>
                                <select name="is_public" required>
                                    <option value="<?php echo $user['is_public']; ?>">-- <?php echo $user['is_public']; ?> --</option>
                                    <option value="1" style="color: greenyellow;">Yes</option>
                                    <option value="0" style="color: red;">No</option>
                                </select>
                            </td>
                        </tr>
                    </div>        
                    <div class="controls">
                        <tr>
                            <td><input name="Save" type="submit" value="Save" /></td>
                            </form>
                        <form action="monument_edit.php" method="post">
                            <td><input name="Back" type="submit" value="Back" /></td>
                        </form>
                        </tr>
                    </div>
                </table>

        </div>
    </div>
    <div>
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
    echo 'You did not login';
}
