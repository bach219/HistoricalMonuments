<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<?php

$sql = "select * from `monuments` WHERE is_public = 1 order by `name_mon`";
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
                    <a href="photo.php?id= <?php echo $data["id_mon"]; ?>" class="unit-1 text-center">
                        <img src="images/<?php echo $data["image"]; ?>" alt="Image" class="img-fluid">
                        <div class="unit-1-text">
                            <h3 class="unit-1-heading"><?php echo $data["name_mon"]; ?></h3>
                        </div>
                    </a>
                </div>
                <?php $count++;
            } ?>
        </div>
    </div>
    <br/>
    <?php include "includes/footer.php" ?>