<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<?php

//$id = -1; //Khởi tạo $id = -1 trong trường hợp nếu ko có tham số id gắn trên url thì sẽ ko lấy được dữ liệu 
          //Assign value -1 to $id so in case there is no id attached on url, data wont be shown
if (isset($_GET["id"])) { //Lấy id trên URL (đã được gắn khi click vào ảnh trong zones2.php?id=)
                         //Get id from URL (which was attached when clicking images at zones2.php)
    $id = intval($_GET['id']);
}

$sql = "select * from `monuments` where zone_id = $id AND is_public = 1";
//Lấy ra thông tin của những di tích thuộc zone có (zone_id) = (id trên URL)
$query = mysqli_query($conn, $sql);
$count=0;
?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <?php while ($data = mysqli_fetch_array($query)) {
                if ($count == 4) {
                    echo '</div>
                          <br/>
                          <div class="row">';
                    $count = 0;
                }
                ?>
                <div class="col-md-6 col-lg-3">
                    <a href="display.php?id=<?php echo $data["id_mon"]; ?>" class="unit-1 text-center">
                        <img src="images/<?php echo $data["image"]; ?>" alt="Image" class="img-fluid">
                        <div class="unit-1-text">
                            <h3 class="unit-1-heading"><?php echo $data["name_mon"]; ?></h3>
                        </div>
                    </a>
                </div>
        <?php $count++;} ?>  
    </div>
</div>
<br/>
<?php include "includes/footer.php" ?>