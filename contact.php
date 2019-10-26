<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>

<?php

if (isset($_POST["btn_submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $contact_name = mysqli_real_escape_string($conn, $_POST["name"]);
    $contact_phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $contact_email = mysqli_real_escape_string($conn, $_POST["email"]);
    $contact_message = mysqli_real_escape_string($conn, $_POST["message"]);

    //Đẩy thông tin lấy được vào bảng Contact
    $sql = "INSERT INTO contact (contact_name, contact_phone, contact_email, contact_message) 
    VALUES ('$contact_name', '$contact_phone', '$contact_email', '$contact_message')";
    mysqli_query($conn, $sql);

    echo '
    <div id="success_message" style="width:100%; height:100%; ">
    <h3>Your message submited successfully!</h3>
    </div>
    ';
}
?>

<div class="container">
    <div class="imagebg"></div>
    <div class="row " style="margin-top: 50px">
        <div class="col-md-6 form-container">
            <h2>Contact Us</h2>
            <form role="form" method="post" id="reused_form">
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
                        <label for="message"> Your message:</label>
                        <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Your message" maxlength="6000" rows="7" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" name="btn_submit" class="btn btn-lg btn-warning btn-block">Sent </button>
                    </div>
                </div>
            </form>
        </div>
        <!--Nhúng mã bản đồ-->
        <!--embedded map-->
        <div class="col-md-6 form-container">
        <h2>Our Location</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1107.369585891778!2d105.84869946297728!3d21.003358918113722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac428c3336e5%3A0xb7d4993d5b02357e!2sAptech+Computer+Education!5e0!3m2!1svi!2s!4v1557944824348!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    </div>
</div>

<br />

<?php include "includes/footer.php" ?>