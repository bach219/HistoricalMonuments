<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    header('Content-Type: text/html; charset=utf-8');

    // check admin
    if ($_SESSION['level'] != 1 || $_SESSION['username'] != 'Admin') {
        header('location: logout.php');
    }

    unset($_SESSION['title']);
    $_SESSION['title'] = "Edit Feedback";
    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];
        if ($id) {

            $sql1 = "SELECT * FROM `feedback` WHERE `id_feedback` = '{$id}'";
            $user = db_row($sql1);
        }
    }


    if (isset($_POST['Back'])) {
        unset($_SESSION['pass']);
        header('location: feedback.php');
    }

    if (isset($_POST['Save'])) {
        unset($_SESSION['pass']);
        unset($_SESSION['id_feedback']);
        $_SESSION['id_feedback'] = $_POST['id_feedback'];
        $is_public = 0;
        $is_public = db_escape($_POST['is_public']);
        $viewer_email = db_escape($_POST['viewer_email']);
        $viewer_phone = db_escape($_POST['viewer_phone']);
        $sql = "UPDATE `feedback` 
            SET `is_public` = '{$is_public}',
                `viewer_email` = '{$viewer_email}',
                `viewer_phone` = '{$viewer_phone}'    
            WHERE `id_feedback` = '{$_POST['id_feedback']}'
          ";
        // execute query
        db_q($sql);
        $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <strong>Success!</strong> Edit Feedback_Id = " . $_SESSION['id_feedback'] . " successfully!
                            </div>";
        header('location: feedback_edit.php?edit=' . $_SESSION['id_feedback'] . '');
    }
    end:
    ?>
    <?php include_once('header.php'); ?>
    <div class="container">
        <div class="content">
            <h2>Edit Feedback Form</h2>
            <?php echo $_SESSION['pass']; ?>
            <form action="feedback_edit.php" method="post">
                <table class="table table-bordered table-hover">

                    <tr>
                        <td width="200px"><label for="id_feedback">Feedback ID</label></td>
                        <td>
                            <input type="number" name="id_feedback" placeholder="<?php echo $user['id_feedback']; ?>" value="<?php echo $user['id_feedback']; ?>" max="<?php echo $user['id_feedback']; ?>" min="<?php echo $user['id_feedback']; ?>" required/>

                        </td>
                    </tr>

                    <tr>
                        <td width="200px">Monument ID</td>
                        <td>
                            <?php echo $user['mon_id']; ?></td>
                    </tr>
                    <tr>
                        <td width="200px">Viewer Name</td>
                        <td>
                            <?php echo $user['viewer_name']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td>Viewer Phone</td>
                        <td>
                            <input type="number" name="viewer_phone" placeholder="<?php echo $user['viewer_phone']; ?>" value="<?php echo $user['viewer_phone']; ?>" required/>                          

                        </td>
                    </tr>
                    <tr>
                        <td>Viewer Email</td>
                        <td>
                            <input type="email" name="viewer_email" placeholder="<?php echo $user['viewer_email']; ?>" value="<?php echo $user['viewer_email']; ?>" required/>                            

                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Viewer Comment</td>
                        <td>
                            <?php echo $user['viewer_comment']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td>Public</td>
                        <td>
                            <input type="checkbox" id="is_public" name="is_public" value="1" <?php if ($user['is_public'] == 1) { ?> checked <?php } ?>/>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px">Create Date</td>
                        <td>
                            <?php echo $user['createdate']; ?>

                        </td>
                    </tr>
                    <div class="controls">
                        <tr>
                            <td><input name="Save" type="submit" value="Save" /></td>
                            </form>
                        <form action="feedback_edit.php" method="post">
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
    echo 'You did not <a href="login.php">login</a>';
}
