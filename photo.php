<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<?php

$id = -1;
if (isset($_GET["id"])) {
    $id = intval($_GET['id']);
}
$sql = "select * from `gallery` where mon_id = $id AND is_public = 1";
//Lấy ra thông tin của những di tích thuộc zone có (zone_id) = (id trên URL)
$query = mysqli_query($conn, $sql);
$count = 0;
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
                    <a class="example-image-link" href="images/<?php echo $data["gal_img"]; ?>" data-lightbox="img-<?php echo $data["mon_id"]; ?>" data-title="<?php echo $data["gal_name"]; ?>">
                        <img class="img-fluid" src="images/<?php echo $data["gal_img"]; ?>" alt="" />
                    </a>
                </div>
                <?php $count++;
            } ?>
        </div>
    </div>
</div>
<br/>
<?php include "includes/footer.php" ?>