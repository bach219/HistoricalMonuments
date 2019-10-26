<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';

    header('Content-Type: text/html; charset=utf-8');

    //check admin. If isn't Admin, go to logout
    if ($_SESSION['level'] != 1 || $_SESSION['username'] != 'Admin') {
        header('location: logout.php');
    }
    unset($_SESSION['pass_cu']);
    unset($_SESSION['repass_edit']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "Edit User";
    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];
        if ($id) {
            // L?y th�ng tin ngu?i d�ng
            $sql = "SELECT * FROM `users` WHERE `user_id` = '{$id}'";
            $user = db_row($sql);
        }
    }

    if (isset($_POST['Back'])) {
        unset($_SESSION['pass']);
        header('location: users.php');
    }
    // N?u ngu?i d�ng submit delete user
    if (isset($_POST['Save'])) {
        unset($_SESSION['pass']);
        unset($_SESSION['user_id']);
        $_SESSION['user_id'] = $_POST['user_id'];

        if ($_POST['newpass'] != $_POST['re-password']) {
            $_SESSION['repass_edit'] = "<h3 style='color: red'>Retyping new password is wrong</h3>";
            goto end;
        }

        $sql = "SELECT * FROM `users` WHERE `user_id` = '{$_POST['user_id']}'";
        $rs = db_row($sql);
        if (is_array($rs) && !empty($rs)) {
            // ...thì so sánh tiếp mật khẩu xem có khớp không
            if (password_verify($_POST['pass_cu'], $rs['password'])) {
                if (empty($_POST['newpass'])) {
                    $password = password_hash($_POST['pass_cu'], PASSWORD_DEFAULT);
                } else {
                    $password = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
                }

                $username = db_escape($_POST['username']);
                $email = db_escape($_POST['email']);
                $fullname = db_escape($_POST['fullname']);
                $level = $_POST['level'];

                $sql1 = "UPDATE `users` 
            SET `username` = '{$username}',
            `password` = '{$password}',
            `email` = '{$email}',
            `fullname` = '{$fullname}',
            `level` = '{$level}',    
             `date_added` = '{$_POST['date_added']}' 
            WHERE `user_id` = '{$_POST['user_id']}'
          ";
                // execute query

                $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Edit User '<strong>" . $_POST['username'] . "</strong>'successfully!
                            </div>";
                db_q($sql1);
                header('location: user_edit.php?edit=' . $_SESSION['user_id'] . '');
            }
            $_SESSION['pass_cu'] = "<h3 style='color: red'>Error-Password Current is wrong!</h3>";
            goto end;
        }
    }
    end:
    ?>
    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">
            <h2>Edit User Form</h2>
            <?php echo $_SESSION['pass']; ?>

            <form action="user_edit.php" method="post">
                <table class="table table-bordered table-hover">

                    <div class="form-group">
                        <tr>
                            <td><label for="user_id">User ID</label></td>
                            <td><input type="number" name="user_id" placeholder="<?php echo $user['user_id']; ?>" value="<?php echo $user['user_id']; ?>" max="<?php echo $user['user_id']; ?>" min="<?php echo $user['user_id']; ?>" required/>
                        </tr>
                    </div>
                    <?php if ($user['level'] != 1 || $user['username'] != 'Admin') { ?>
                        <div class="form-group">
                            <tr>
                                <td><label for="username">Username</label></td>
                                <td><input type="name" name="username" placeholder="<?php echo $user['username']; ?>" value="<?php echo $user['username']; ?>" required/>
                            </tr>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <tr>
                            <td><label for="pass_cu">Password Current</label></td>
                            <td><input type="password" name="pass_cu" placeholder="******" value="<?php echo $user['password']; ?>" required/>
                                <?php echo $_SESSION['pass_cu']; ?></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="password">New Password</label></td>
                            <td><input type="password" name="newpass" placeholder="******" />
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="re-password">Retyping Password</label></td>
                            <td><input type="password" name="re-password" placeholder="******" />
                                <?php echo $_SESSION['repass_edit']; ?></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td><input type="name" name="email" placeholder="<?php echo $user['email']; ?>" value="<?php echo $user['email']; ?>" required/>

                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td><label for="fullname">Fullname</label></td>
                            <td><input type="name" name="fullname" placeholder="<?php echo $user['fullname']; ?>" value="<?php echo $user['fullname']; ?>" required/>

                            </td>
                        </tr>
                    </div>
                    <?php if ($user['level'] != 1 || $user['username'] != 'Admin') { ?>
                        <div class="form-group">
                            <tr>
                                <td><label for="level">Level</label></td>
                                <td><select name="level">
                                        <option value="<?php echo $user['level']; ?>">-- <?php echo $user['level']; ?> --</option>
                                        <option value="1" style="color: #ff9933;">1.Admin</option>
                                        <option value="2" style="color: greenyellow;">2.Member</option>
                                    </select>
                                </td>
                            </tr>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <tr>
                            <td><label for="date_added">Add Date</label></td>
                            <td><input type="date" name="date_added" class="long" placeholder="<?php echo $user['date_added']; ?>" value="<?php echo $user['date_added']; ?>" required/>

                            </td>
                        </tr>
                    </div>
                    <div class="controls">
                        <tr>
                            <td><input name="Save" type="submit" value="Save" /></td>
                            </form>
                        <form action="user_edit.php" method="post">
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
    echo 'You did not <a href="logout.php">login</a>';
}
