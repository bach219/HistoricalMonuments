<?php
function make_query($conn)
{
    $query = "SELECT * FROM banner WHERE is_public = 1 ORDER BY banner_id ASC";
    $result = mysqli_query($conn, $query);
    return $result;
}

function make_slide_indicators($conn)
{
    $output = '';
    $count = 0;
    $result = make_query($conn);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '" class="active"></li>
   ';
        } else {
            $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '"></li>
   ';
        }
        $count = $count + 1;
    }
    return $output;
}

function make_slides($conn)
{
    $output = '';
    $count = 0;
    $result = make_query($conn);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '<div class="carousel-item active">';
        } else {
            $output .= '<div class="carousel-item">';
        }
        $output .= '
    <a href="display.php?id=' . $row["mon_id"] . ' ">
    <img class="d-block w-100" src="banner/' . $row["banner_image"] . '" alt="' . $row["banner_title"] . '" />
    </a>
    <div class="carousel-caption d-none d-md-block">
    <h5>' . $row["banner_title"] . '</h5>
    </div>
  </div>
  ';
        $count = $count + 1;
    }
    return $output;
}

?>
<div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php echo make_slide_indicators($conn); ?>
    </ol>
    <div class="carousel-inner">
        <?php echo make_slides($conn); ?>
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