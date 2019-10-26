<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    header('Content-Type: text/html; charset=utf-8');

    if ($_SESSION['level'] != 1 || $_SESSION['username'] != 'Admin') {
        header('location: logout.php');
    }

    unset($_SESSION['title']);
    $_SESSION['title'] = "Edit Contact";
    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];
        if ($id) {

            $sql1 = "SELECT * FROM `contact` WHERE `id_contact` = '{$id}'";
            $user = db_row($sql1);
        }
    }

    if (isset($_POST['Back'])) {
        unset($_SESSION['pass']);
        header('location: contact.php');
    }

    if (isset($_POST['Save'])) {
        unset($_SESSION['pass']);
        unset($_SESSION['id_contact']);
        $_SESSION['id_contact'] = $_POST['id_contact'];

        $contact_email = db_escape($_POST['contact_email']);
        $contact_phone = db_escape($_POST['contact_phone']);
        $contact_name = db_escape($_POST['contact_name']);

        $sql = "UPDATE `contact` 
            SET `contact_name` = '{$contact_name}',
            `contact_phone` = '{$contact_phone}',
            `contact_email` = '{$contact_email}',
            `is_public` = '{$_POST['is_public']}'
            WHERE `id_contact` = '{$_POST['id_contact']}'
          ";
        // execute query
        db_q($sql);
        $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Edit Contact_Id = " . $_SESSION['id_contact'] . " successfully!
                            </div>";
        header('location: contact_edit.php?edit=' . $_SESSION['id_contact'] . '');
    }
    end:
    ?>

    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">
            <h2>Edit Contact Form</h2>
            <?php echo $_SESSION['pass']; ?>
            <form action="contact_edit.php" method="post">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td width="200px"><label for="id_contact">Contact ID</label></td>
                        <td>
                            <input type="number" name="id_contact" placeholder="<?php echo $user['id_contact']; ?>" value="<?php echo $user['id_contact']; ?>" max="<?php echo $user['id_contact']; ?>" min="<?php echo $user['id_contact']; ?>" required/>

                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Contact Name</td>
                        <td>
                            <?php echo $user['contact_name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Contact phone</td>
                        <td>
                            <input type="number" name="contact_phone" placeholder="<?php echo $user['contact_phone']; ?>" value="<?php echo $user['contact_phone']; ?>" required/>

                        </td>
                    </tr>
                    <tr>
                        <td>Contact Email</td>
                        <td>
                            <input type="email" name="contact_email" placeholder="<?php echo $user['contact_email']; ?>" value="<?php echo $user['contact_email']; ?>" required />

                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Message</td>
                        <td>
                            <?php echo $user['contact_message']; ?>

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
                        <form action="contact_edit.php" method="post">
                            <td><input name="Back" type="submit" value="Back" /></td>
                        </form>
                        </tr>
                    </div>
                </table>
            </form>
        </div>
    </div>
    </div>
    </body>

    </html>
    <script type="text/javascript">
        config = {};
        config.entities_latin = false;
        config.language = "vi";
        CKEDITOR.replace('contact_reply', config);
    </script>
    <?php
} else {
    echo 'You did not <a href="logout.php">login</a>';
}
