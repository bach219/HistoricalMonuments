<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    header('Content-Type: text/html; charset=utf-8');

    // check admin
    if ($_SESSION['level'] != 1 || $_SESSION['username'] != 'Admin') {
        header('location: logout.php');
    }

    unset($_SESSION['banner_image']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "Edit Banner";
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        if ($id) {
            $sql1 = "SELECT * FROM `banner` WHERE `banner_id` = '{$id}'";
            $user = db_row($sql1);
        }
    }

    $is_public = "";
    if ($user['is_public'] == 1) {
        $is_public = "checked='checked'";
    }

    if (isset($_POST['Back'])) {
        unset($_SESSION['pass']);
        header('location: banner.php');
    }

    if (isset($_POST['Save'])) {
        unset($_SESSION['pass']);
        unset($_SESSION['banner_id']);
        $_SESSION['banner_id'] = $_POST['banner_id'];

        //-----------------------------------------------------upload image-----------------------------------------------------------------
        $target_dir = "../banner/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $_SESSION['banner_image'] = "<h3 style='color: red;'>File is not an image.<h3>";
            $uploadOk = 0;
            goto end;
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['banner_image'] = "<h3 style='color: red;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<h3>";
            $uploadOk = 0;
            goto end;
        }
        if ($uploadOk == 1) {
            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            }
        }

        $is_public = 0;
        if (isset($_POST["is_public"])) {
            $is_public = $_POST["is_public"];
        }

        $mon_id = db_escape($_POST['mon_id']);
        $banner_title = db_escape($_POST['banner_title']);
        $is_public = db_escape($_POST['is_public']);
        $banner_image = db_escape($_FILES["fileToUpload"]["name"]);
        $sql = "UPDATE `banner` 
            SET `banner_title` = '{$banner_title}',
            `mon_id` = '{$mon_id}',
            `banner_image` = '{$banner_image}',
            `is_public` = '{$is_public}'
             WHERE `banner_id`  = '{$_POST['banner_id']}' 
          ";
        // execute query
        db_q($sql);
        $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Edit Banner_Id = " . $_SESSION['banner_id'] . " successfully!
                            </div>";
        header('location: banner_edit.php?edit=' . $_SESSION['banner_id'] . '');
    }
    end:
    ?>
    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">
            <h2>Edit Banner Form</h2>
            <?php echo $_SESSION['pass']; ?>

            <form action="banner_edit.php" method="post" enctype="multipart/form-data">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td width="200px"><label for="banner_id">Banner ID</label></td>
                        <td>
                            <input type="number" name="banner_id" placeholder="<?php echo $user['banner_id']; ?>" value="<?php echo $user['banner_id']; ?>" max="<?php echo $user['banner_id']; ?>" min="<?php echo $user['banner_id']; ?>" required />

                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Monument ID</td>
                        <td>
                            <select name="mon_id" required>
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
                        <td>Image</td>
                        <td>                    
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                            <?php echo "<h3 style='color: green;'>" . $user['banner_image'] . "<h3>"; ?>
    <?php echo $_SESSION['banner_image']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Banner Title</td>
                        <td>
                            <input type="text" id="banner_title" name="banner_title"  placeholder="<?php echo $user['banner_title']; ?>" value="<?php echo $user['banner_title']; ?>" required/>

                        </td>
                    </tr>
                    <tr>
                        <td>Public</td>
                        <td>
                            <input type="checkbox" id="is_public" name="is_public" value="1"  <?php echo $is_public ?> />
                        </td>
                    </tr>
                    <div class="controls">
                        <tr>
                            <td><input id="Save" name="Save" type="submit" value="Save" /></td>
                            </form>
                        <form action="banner_edit.php" method="post">
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

    <?php
} else {
    echo '<h1>You did not <a href="login.php">login</a></h1>';
}
