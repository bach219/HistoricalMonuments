<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>

<?php 
$sql = "select * from `monuments` order by `name_mon` asc";
$query = mysqli_query($conn, $sql);


if (isset($_POST["btn_submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $mon_id = $_POST["choice"];
    $viewer_name = $_POST["name"];
    $viewer_phone = $_POST["phone"];
    $viewer_email = $_POST["email"];
    $viewer_comment = $_POST["comments"];


    $sql = "INSERT INTO feedback(mon_id, viewer_name, viewer_phone, viewer_email, viewer_comment) 
    VALUES ('$mon_id', '$viewer_name', '$viewer_phone', '$viewer_email', '$viewer_comment')";
    mysqli_query($conn, $sql);
    
    echo '
    <div id="success_message" style="width:100%; height:100%; ">
    <h3>Posted your feedback successfully!</h3>
    </div>
    ';
}
?>

<div class="container">
    <div class="imagebg">
    <div class="row " style="margin-top: 50px">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2>Feedback</h2>
            <p> Please provide your feedback below: </p>
            <form role="form" method="post" id="reused_form">
                <br />
                <label for="choice">Choose the monument you want to comment on:</label>
                <div class="form-group">
                    <!-- Dropdown -->
                    <select name="choice" id='choice' style='width: 550px' class="form-control">
                    <option value='0'>Select Monument</option>
                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <option value='<?php echo $data["id_mon"]; ?>'><?php echo $data["name_mon"]; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <br />
                <div id="result"></div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name"> Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email"> Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="phone"> Phone:</label>
                        <input type="text" class="form-control bfh-phone" data-format="+84 (ddd) ddd-dddd" id="phone" name="phone">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="comments"> Comments:</label>
                        <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" name="btn_submit" class="btn btn-lg btn-warning btn-block">Post </button>
                    </div>
                </div>
            </form>
            <div id="error_message" style="width:100%; height:100%; display:none; ">
                <h3>Error</h3> Sorry there was an error sending your form.
            </div>
        </div>
    </div>
</div>
</div>


<?php include "includes/footer.php" ?>