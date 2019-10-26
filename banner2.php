<script>
    $(document).ready(function() {
        
        $(".carousel-indicators").find("li").first().addClass("active");
        //Bootstrap 4 đòi hỏi carousel-item đầu tiên phải có class "active" thì mới chạy
        //Bootstrap 4 require the first carousel-item to have "active" class to be able to run
        $(".carousel-item").first().addClass("active");
    });
</script>

<?php

?>
<div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php 
            $sql = "SELECT * FROM banner where is_public = 1 ORDER BY banner_id ASC";
            $query = mysqli_query($conn, $sql);
            $count = 0; //biến count để tính số lần loop, từ đó truyền giá trị vào data-slide-to => quyết định số lượng carousel-indicators
                        //use $count variable to count how many time it loops, 
                        //then push that value in to data-slide-into, which decide number of carousel-indicators
            while ($row = mysqli_fetch_array($query)) { 
        ?>
            <li data-target="#dynamic_slide_show" data-slide-to="<?php echo $count ?>"></li>
        <?php $count = $count + 1; } 
        ?>
    </ol>
    <div class="carousel-inner">
        <?php 
        $sql1 = "SELECT * FROM banner where is_public = 1 ORDER BY banner_id ASC";
        $query1 = mysqli_query($conn, $sql1);
        while ($row1 = mysqli_fetch_array($query1)) { 
        ?>
        <div class="carousel-item">
            <a href="display.php?id=<?php echo $row1["mon_id"] ?>">
                <img class="d-block w-100" src="banner/<?php echo $row1["banner_image"] ?> " alt="<?php echo $row1["banner_title"] ?>" />
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h5><?php echo $row1["banner_title"] ?></h5>
            </div>
        </div>
        <?php } 
        ?>
    </div>


    <a class="carousel-control-prev" href="#dynamic_slide_show" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#dynamic_slide_show" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>