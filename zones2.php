<?php

$sql = "select * from `zones` order by `id_zone` asc";
$query = mysqli_query($conn, $sql);
?>
<br />
<blockquote class="blockquote text-center">
    <p class="mb-0">"Monuments are for the living, not the dead."</p>
    <footer class="blockquote-footer"> Frank Wedekind <cite title="Source Title">Spring's Awakening</cite>
</blockquote>
<h2 align="center" style="font-family: Helvetica;">Exploring By Region </h2>
<div class="site-section">
    <div class="container">
        <div class="row">
            <?php while ($data = mysqli_fetch_array($query)) { ?>
                <div class="col-md-6 col-lg-3">
                    <a href="list.php?id= <?php echo $data["id_zone"]; ?>" class="unit-1 text-center">
                        <img src="images/<?php echo $data["img_zone"]; ?>" alt="Image" class="img-fluid">
                        <div class="unit-1-text">
                            <h3 class="unit-1-heading"><?php echo $data["name_zone"]; ?></h3>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>