<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';
    // Ki?m tra quy?n, n?u không có quy?n thì chuy?n nó v? trang logout
    if ($_SESSION['level'] != 1) {
        header('location: logout.php');
        ;
    }
    // Bi?n ch?a l?i
    if (isset($_POST['Back'])) {
        unset($_SESSION['pass']);
        header('location: users.php');
    }
    unset($_SESSION['name_user_add']);
    unset($_SESSION['repass_user_add']);
    unset($_SESSION['email_user_add']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "Add User";
    // N?u ngu?i dùng submit form
    if (isset($_POST['Save'])) {
        unset($_SESSION['pass']);

        // Nếu tài khoản đăng kí đã tồn tại rồi trong cơ sở dữ liệu
        $sql = "SELECT COUNT(*) FROM `users` WHERE `username`='{$_POST['username']}' AND `level` = '{$_POST['level']}'";
        $count = (int) db_one($sql);
        if ($count) {
            $_SESSION['name_user_add'] = "<h3 style='color: red;'>Error-username `{$_POST['username']}` already exists !</h3>";
            goto end;
        }

        $sql = "SELECT COUNT(*) FROM `users` WHERE `email`='{$_POST['email']}'";
        $count = (int) db_one($sql);
        if ($count) {
            $_SESSION['email_user_add'] = "<h3 style='color: red;'>Error-email `{$_POST['email']}` already exists !</h3>";
            goto end;
        }

        if ($_POST['password'] != $_POST['re-password']) {
            $_SESSION['repass_user_add'] = "<h3 style='color: red;'>Re-Password is wrong !</h3>";
            goto end;
        }
        //$password = md5($_POST['password']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $username = db_escape($_POST['username']);
        $email = db_escape($_POST['email']);
        $fullname = db_escape($_POST['fullname']);
        $level = $_POST['level'];

        if ($_POST['password'] == $_POST['re-password']) {
            $sql = "INSERT INTO `users` 
            SET `username` = '{$username}',
            `password` = '{$password}',
            `email` = '{$email}',
            `fullname` = '{$fullname}',
            `level` = '{$level}',    
             `date_added` = '{$_POST['date_added']}'
          ";
            // execute query

            $_SESSION['pass'] = "<div class='alert alert-success alert-dismissible fade in'>
                                <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Add User '<strong>" . $username . "</strong>' successfully! 
                            </div>";
            db_q($sql);
            //header('location: users.php');
        }
    }
    end:
    ?>

    <?php include_once('header.php'); ?>

    <div class="container">
        <div class="content">
            <h1>Add User</h1>
            <?php echo $_SESSION['pass']; ?>

            <form method="post" action="user_add.php">

                <table class="table table-bordered table-hover">
                    <tr>
                        <td width="200px"><label for="username">Username</label></td>
                        <td>
                            <input type="name" name="username" required/>
                            <?php echo $_SESSION['name_user_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" required/>

                        </td>
                    </tr>
                    <tr>
                        <td>Retyping password</td>
                        <td>
                            <input type="password" name="re-password" required/>
                            <?php echo $_SESSION['repass_user_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="email" required/>
                            <?php echo $_SESSION['email_user_add']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Full name</td>
                        <td>
                            <input type="name" name="fullname" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>
                            <select name="level" required>
                                <option value="">-- Level --</option>
                                <?php if ($_SESSION['level'] == 1 && $_SESSION['username'] == 'Admin') { ?>
                                    <option value="1" style="color: #ff9933;">1.Admin</option>
                                    <option value="2" style="color: greenyellow;">2.Member</option>
                                <?php } else { ?> 
                                    <option value="0" style="color: red;">2.Member</option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Add Date</td>
                        <td>
                            <input type="date" name="date_added" required/>

                        </td>
                    </tr>

                    <div class="controls">
                        <tr>
                            <td><input name="Save" type="submit" value="Save"></td></form>
                        <form method="post" action="user_add.php">
                            <td><input name="Back" type="submit" value="Back"></td>
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
