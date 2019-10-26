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
        header('location: banner.php');
    }

    unset($_SESSION['pass']);
    unset($_SESSION['banner_image_add']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "Add Banner";

    if (isset($_POST['Submit'])) {

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
        $sql = "INSERT INTO `banner` 
            SET `banner_title` = '{$banner_title}',
            `mon_id` = '{$mon_id}',
            `banner_image` = '{$banner_image}',
            `is_public` = '{$is_public}'
          ";
        // execute query
        db_q($sql);

        $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Add banner successfully!
                            </div>";
        //header('location: banner.php');
        //$_SESSION['pass'] = "Add banner successfully!";
    }
    end:
    ?>

    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">

            <h1>Add Banner</h1>
            <?php echo $_SESSION['pass']; ?>
            <form id="main-form" method="post" action="banner_add.php" enctype="multipart/form-data">

                <table class="table table-hover table-bordered">
                    <tr>
                        <td width="200px">Monument ID</td>
                        <td>
                            <select name="mon_id" required>
                                <option value=''>-- Chose ZoneID --</option>
                                <?php
                                $sql = "select * from `monuments` order by `name_mon` asc";
                                $query = db_q($sql);
                                foreach ($query as $data) {
                                    ?>
                                    <option value='<?php echo $data["id_mon"]; ?>'><?php echo $data["name_mon"]; ?></option>
                                <?php } ?>
                            </select>
                            <?php echo $_SESSION['mon_id_ban_add']; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Image</td>
                        <td>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <?php echo $_SESSION['banner_image_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Banner Title</td>
                        <td>
                            <input type="text" id="banner_title" name="banner_title" placeholder="Title..." required/>
                            <?php echo $_SESSION['banner_title_add']; ?>
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
                            <td><input id="Submit" name="Submit" type="submit" value="Submit" /></td>
                            </form>
                        <form method="post" action="banner_add.php">
                            <td><input name="Back" type="submit" value="Back" /></td>
                        </form>
                        </tr>
                    </div>
                </table>


        </div>
    </div>
    </div>
    </div>
    </body>

    </html>

    <?php
} else {
    echo '<h1>You did not login';
    echo "'<a href='login.php'>'Login'</a>'</h1>";
}
