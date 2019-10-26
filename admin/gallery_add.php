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
        header('location: gallery.php');
    }

    unset($_SESSION['gal_name_add']);
    unset($_SESSION['gal_description_add']);
    unset($_SESSION['gallery_image_add']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "Add Gallery";
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
            $_SESSION['gallery_image_add'] = "<h3 style='color: red;'>File is not an image.<h3>";
            $uploadOk = 0;
            goto end;
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['gallery_image_add'] = "<h3 style='color: red;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<h3>";
            $uploadOk = 0;
            goto end;
        }
        if ($uploadOk == 1) {
            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            }
        }

        if (empty($_POST['gal_description'])) {
            $_SESSION['gal_description_add'] = "<h3 style='color:red;'>Gal_description is empty !</h3>";
            goto end;
        }
        // Nếu tài khoản đăng kí đã tồn tại rồi trong cơ sở dữ liệu
        $sql = "SELECT COUNT(*) FROM `gallery` WHERE `mon_id`='{$_POST['mon_id']}' AND `gal_name` = '{$_POST['gal_name']}'";
        $count = (int) db_one($sql);
        if ($count) {
            $_SESSION['gal_name_add'] = "<h3 style='color: red;'>Error-gal_name `{$_POST['gal_name']}` already exists !</h3>";
            goto end;
        }

        $gal_description = db_escape($_POST['gal_description']);
        $gal_name = db_escape($_POST['gal_name']);
        $mon_id = db_escape($_POST['choice']);
        $gal_img = db_escape($_FILES["fileToUpload"]["name"]);
        $sql = "INSERT INTO `gallery` 
            SET `gal_name` = '{$gal_name}',
            `mon_id` = '{$mon_id}',
            `gal_img` = '{$gal_img}',
            `gal_description` = '{$gal_description}',
            `is_public` = '{$is_public}'
          ";
        // execute query
        db_q($sql);
        $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Add gallery successfully!
                            </div>";
        //header('location: gallery.php');
    }
    end:
    ?>

    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">

            <h1>Add Gallery</h1>
    <?php echo $_SESSION['pass']; ?>

            <form id="main-form" method="post" action="gallery_add.php" enctype="multipart/form-data">

                <table class="table table-hover table-bordered">

                    <tr>
                        <td width="200px">Choose Monument</td>
                        <td>
                            <select name="choice" id='choice' required>
                                <option value=''>-- Select Monument --</option>
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
                        <td width="200px">Gallery Name</td>
                        <td>
                            <input type="text" name="gal_name" required/>
    <?php echo $_SESSION['gal_name_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
    <?php echo $_SESSION['gallery_image_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Gallery Description</td>
                        <td>
                            <textarea id="gal_description" type="text" cols="40" rows="4" name="gal_description" placeholder="Description..."></textarea>
    <?php echo $_SESSION['gal_description_add']; ?>
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
                            <td><input name="Submit" type="submit" value="Submit" /></td>
                            </form>
                        <form method="post" action="gallery_add.php">
                            <td><input name="Back" type="submit" href="gallery.php" value="Back" /></td>
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
    echo '<h1>You did not login';
    echo "'<a href='login.php'>'Login'</a>'</h1>";
}
