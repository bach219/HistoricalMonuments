<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>

<!--Hiển thị nội dung về di tích -->
<!--Show info of monument -->

<br />
<div class="innertube">
    <?php
    //$id = -1; //Khởi tạo $id = -1 trong trường hợp nếu ko có tham số id gắn trên url thì sẽ ko lấy được dữ liệu
    //Assign value -1 to $id so in case there is no id attached on url, data wont be shown 
    if (isset($_GET["id"])) { //Lấy id trên URL (đã được gắn khi click vào ảnh trong list.php?id=)
        //Get id from URL (which was attached when clicking images at list.php)
        $id = intval($_GET['id']);
    }
    // Lấy ra nội dung bài viết theo điều kiện id
    $sql = "select * from monuments where id_mon = $id";
    // Thực hiện truy vấn data thông qua hàm mysqli_query
    $query = mysqli_query($conn, $sql);
    ?>
    <div class="article">
        <?php
        while ($data = mysqli_fetch_array($query)) { ?>
            <h1><?php echo $data['name_mon']; ?></h1>
            <br />
        <p id="art_content"><?php echo $data['history_mon']; }?></p>       
    </div>
</div>


<!--Hiển thị comment/ Feedback về di tích-->
<!--Showing comment/ Feedback about monument from viewers -->

<?php
//Lấy dữ liệu tên, comment, ngày tạo từ bảng feedback với is_public=1, sắp xếp theo thứ tự ngày mới nhất và hiện tối đa 10 cmt
//Pull out name, comment, date from feedback table
$sql1 = "select viewer_name, viewer_comment, createdate from feedback 
        where is_public = 1 and mon_id = $id order by createdate desc limit 10";
$query1 = mysqli_query($conn, $sql1);
?>

<div class="container" style="width:900px">
    <h3 class="text-center">Comments</h3>
    <!-- Nếu số row của bảng vừa truy vấn > 0 thì in ra feedback của người xem -->
    <?php if (mysqli_num_rows($query1) > 0) {
        while ($row = mysqli_fetch_array($query1)) { ?>
            <div class="card border-info mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <p class="float-right"><?php echo $row["createdate"] ?></p>
                                <a class="float-left"><strong><?php echo $row["viewer_name"] ?></strong></a>
                            </p>
                            <div class="clearfix"></div>
                            <p><?php echo $row["viewer_comment"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--Nếu số row = 0 thì echo no cmt -->
        <?php }
} else {
    echo '<p class="text-center"> No comment.</p>';
} ?>

</div>

<!--Hiển thị box để người dùng cmt về di tích-->
<!--Feedback/ Comment box for viewer to type in their info and their opinion -->

<?php


//Nếu button được ấn


if (isset($_POST["btn_submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    //mysqli_real_escape_string để tránh tấn công SQL injection
    $viewer_name = mysqli_real_escape_string($conn, $_POST["name"]);
    $viewer_phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $viewer_email = mysqli_real_escape_string($conn, $_POST["email"]);
    $viewer_comment = mysqli_real_escape_string($conn, $_POST["comments"]);
    //mặc định của is_public là 1, có thể sửa thành 0 trong trang admin để không hiển thị feedback
    //$is_public = 1 by default, can change the value to 0 in admin dashboard if want to hid a certain feedback
    $is_public = 0;


    //Đẩy thông tin lấy được vào bảng Feedback
    //Insert info into feedback table
    $sql2 = "INSERT INTO feedback(mon_id, viewer_name, viewer_phone, viewer_email, viewer_comment,is_public, createdate) 
    VALUES ('$id', '$viewer_name', '$viewer_phone', '$viewer_email', '$viewer_comment','$is_public', now())";
    mysqli_query($conn, $sql2);
    //header('location: display.php?id='.$id.'');
}
?>

<div class="container">
    <div class="row justify-content-md-center" style="margin-top: 30px">
        <div class="col-lg-6 col-lg-offset-3 form-container">
            <h3>Feedback/ Comment</h3>
            <form role="form" method="post" id="reused_form" >
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
            </div>
        </div>
    </div>
</div>
</div>
<?php include "includes/footer.php" ?>