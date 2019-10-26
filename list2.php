<blockquote class="blockquote text-center">
<?php
$sql = "select monuments.id_mon, monuments.name_mon, feedback.viewer_comment, feedback.viewer_name 
        from `monuments`
            left join
        `feedback` on monuments.id_mon = feedback.mon_id order by rand() limit 1";
$query = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($query)) { ?>
        <?php if (!empty($data["viewer_comment"])) { ?>
        <p class="mb-0"><?php echo $data["viewer_comment"]; ?> </p>
        <a href="display.php?id= <?php echo $data["id_mon"]; ?>">
        <footer class="blockquote-footer"> <?php echo $data["viewer_name"]; ?><cite title="Source Title"> on <?php echo $data ["name_mon"]; ?> </cite>
        </a>
<?php 
        }
} ?>
</blockquote>

<br />

<h2 align="center" style="font-family: Helvetica;">Monuments of the day</h2>
<div class="site-section">
    <div class="container">
        <div class="row">
            <?php
            $sql = "select * from `monuments` order by rand() limit 4";
            $query = mysqli_query($conn, $sql);
            $count = 0;
            while ($data = mysqli_fetch_array($query)) {
                if ($count == 4) {
                    echo '</div>
                          <br/>
                          <div class="row">';
                    $count = 0;
                }
                ?>
                <div class="col-md-6 col-lg-3">
                    <a href="display.php?id= <?php echo $data["id_mon"]; ?>" class="unit-1 text-center">
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
    <br />