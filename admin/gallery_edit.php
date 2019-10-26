<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    header('Content-Type: text/html; charset=utf-8');
//check admin
    if ($_SESSION['level'] != 1 || $_SESSION['username'] != 'Admin') {
        header('location: logout.php');
    }

    unset($_SESSION['title']);
    $_SESSION['title'] = "Edit Gallery";

    if (isset($_GET['edit'])) {

        unset($_SESSION['title']);
        $_SESSION['title'] = "Edit Gallery";
        $id = $_GET['edit'];
        if ($id) {

            $sql1 = "SELECT * FROM `gallery` WHERE `gal_id` = '{$id}'";
            $user = db_row($sql1);
        }
    }

    if (isset($_POST['Back'])) {
        header('location: gallery.php');
    }

    if (isset($_POST['Save'])) {
        unset($_SESSION['gal_id']);
        $_SESSION['gal_id'] = $_POST['gal_id'];

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
            $_SESSION['gallery_image'] = "<h3 style='color: red;'>File is not an image.<h3>";
            $uploadOk = 0;
            goto end;
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['gallery_image'] = "<h3 style='color: red;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<h3>";
            $uploadOk = 0;
            goto end;
        }
        if ($uploadOk == 1) {
            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            }
        }


        $gal_description = db_escape($_POST['gal_description']);
        $gal_name = db_escape($_POST['gal_name']);
        $mon_id = db_escape($_POST['mon_id']);
        $gal_img = db_escape($_FILES["fileToUpload"]["name"]);
        $sql = "UPDATE `gallery` 
            SET `gal_name` = '{$gal_name}',
            `mon_id` = '{$mon_id}',
            `gal_img` = '{$gal_img}',
            `gal_description` = '{$gal_description}',
            `is_public` = '{$_POST['is_public']}'
            WHERE `gal_id` = '{$_POST['gal_id']}'
          ";
        // execute query
        db_q($sql);
        $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Edit Gallery_Id = " . $_SESSION['gal_id'] . " successfully!
                            </div>";
        header('location: gallery_edit.php?edit=' . $_SESSION['gal_id'] . '');
    }
    end:
    ?>
    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">
            <h2>Edit Gallery Form</h2>
            <?php echo $_SESSION['pass']; ?>

            <form action="gallery_edit.php" method="post" enctype="multipart/form-data">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td><label for="gal_id">Gallery ID:</label></td>
                        <td><input type="number" name="gal_id" placeholder="<?php echo $user['gal_id']; ?>" value="<?php echo $user['gal_id']; ?>" max="<?php echo $user['gal_id']; ?>" min="<?php echo $user['gal_id']; ?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Monument ID</td>
                        <td>
                            <select name="mon_id" required>
                                <option value='<?php echo $user['mon_id']; ?>'>-- <?php echo $user['mon_id']; ?> --</option>
                                <?php
                                $sql = "select * from `monuments` order by `name_mon` asc";
                                $query = db_q($sql);
                                foreach ($query as $data) {
                                    ?>
                                    <option value='<?php echo $data["id_mon"]; ?>'><?php echo $data["name_mon"]; ?></option>
                                <?php } ?>
                            </select>
                            <?php echo $_SESSION['mon_id_gal_edit']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Name</td>
                        <td>
                            <input type="text" name="gal_name" placeholder="<?php echo $user['gal_name']; ?>" value="<?php echo $user['gal_name']; ?>" required/>
                            <?php echo $_SESSION['gal_name_edit']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                            <?php echo "<h3 style='color: green;'>" . $user['gal_img'] . "<h3>"; ?>
                            <?php echo $_SESSION['gallery_image']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Gallery Description</td>
                        <td>
                            <textarea id="gal_description" type="text" cols="40" rows="4" name="gal_description" placeholder="Description..." required><?php echo $user['gal_description']; ?></textarea>
                            <?php echo $_SESSION['gal_description_edit']; ?>
                        </td>
                    </tr>
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
                    <div class="controls">
                        <tr>
                            <td><input name="Save" type="submit" value="Save" /></td>
                            </form>
                        <form action="gallery_edit.php" method="post">
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
        CKEDITOR.replace('gal_description', config);
    </script>
    <?php
} else {
    echo 'You did not <a href="login.php">login</a>';
}
