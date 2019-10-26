<?php
session_start();
include './linkMySql.php';
if (isset($_SESSION['username']) && $_SESSION['username']) {
    /* if ($_SESSION['level'] != 1) {
      header('location: logout.php');;
      } */
    unset($_SESSION['title']);

    if (isset($_GET['check'])) {
        $i = 0;
        $id = $_GET['check'];
        if ($id == 1)
            $_SESSION['title'] = "North";
        if ($id == 2)
            $_SESSION['title'] = "South";
        if ($id == 3)
            $_SESSION['title'] = "East";
        if ($id == 4)
            $_SESSION['title'] = "West";
        include_once('header.php');
        if ($id) {

            $sql = "  SELECT monuments.id_mon AS `Monument_ID`,COUNT(feedback.id_feedback) AS `Feedback`, monuments.name_mon AS `Name_Monument`, monuments.image AS `Image`, monuments.is_public AS `Public`
                      FROM (`monuments`INNER JOIN `feedback` ON monuments.id_mon = feedback.mon_id)
                      WHERE monuments.zone_id = '{$id}'   
                      GROUP BY  `Monument_ID`   
                      ORDER BY  `Monument_ID`
                    ";
            $list = db_q($sql);

            $sql1 = "  SELECT monuments.id_mon AS `Monument_ID`, COUNT(gallery.gal_id), monuments.name_mon AS `Name_Monument`, monuments.image AS `Image`, monuments.is_public AS `Public`
                      FROM (`monuments`INNER JOIN `gallery` ON monuments.id_mon = gallery.mon_id)
                      WHERE monuments.zone_id = '{$id}'      
                      GROUP BY  `Monument_ID`   
                      ORDER BY  `Monument_ID`
                    ";
            $list1 = db_q($sql1);

            $sql2 = "  SELECT monuments.id_mon AS `Monument_ID`, COUNT(advertisement.id_ad), monuments.name_mon AS `Name_Monument`, monuments.image AS `Image`, monuments.is_public AS `Public`
                      FROM (`monuments`INNER JOIN `advertisement` ON monuments.id_mon = advertisement.mon_id)
                      WHERE monuments.zone_id = '{$id}'       
                      GROUP BY  `Monument_ID`   
                      ORDER BY  `Monument_ID`
                    ";
            $list2 = db_q($sql2);
        }
    }
    ?>



    <div class="content">
        <span class="glyphicon glyphicon-list" style="font-size: 30px;"> Zones</span>
        <br><br>
        <div class="col-md-3">
            <div class="thumbnail">
                <a href="zone.php?check=1" class="text-center">
                    <img src="../images/destination-12.jpg" alt="North" style="width:100%">
                    <div class="caption">
                        <p>1.North</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="thumbnail">
                <a href="zone.php?check=2" class="text-center">
                    <img src="../images/destination-2.jpg" alt="South" style="width:100%">
                    <div class="caption">
                        <p>2.South</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="thumbnail">
                <a href="zone.php?check=3" class="text-center">
                    <img src="../images/destination-6.jpg" alt="East" style="width:100%">
                    <div class="caption">
                        <p>3.East</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="thumbnail">
                <a href="zone.php?check=4" class="text-center">
                    <img src="../images/destination-9.jpg" alt="West" style="width:100%">
                    <div class="caption">
                        <p>4.West</p>
                    </div>
                </a>
            </div>
        </div>
        <br><br>

        <table class="table table-hover table-bordered" id="tbl">
            <thead>
                <tr>
                    <th style="width: 100px;">Monument ID</th>
                    <th>Monument Name</th>
                    <th>Images</th>
                    <th>Gallery</th>
                    <th>Advertisement</th>
                    <th>Feedback</th>
                </tr>
            </thead>

            <tbody id="myTable">
    <?php foreach ($list1 as $row) { ?>
                    <tr>
        <?php if ($row['Public'] == 1 || ($_SESSION['username'] == 'Admin' && $_SESSION['level'] == 1)) { ?>
                            <td><?php echo $row['Monument_ID']; ?></td>
                            <td><?php echo $row['Name_Monument']; ?></td>
                            <td><img src="../images/<?php echo $row['Image']; ?>" style="width:20%"></td>
                            <td><?php if ($list1[$i][1] == '') echo 0;
            else echo $list1[$i][1]; ?></td>
                            <td><?php if ($list2[$i][1] == '') echo 0;
            else echo $list2[$i][1]; ?></td>
                            <td><?php if ($list[$i][1] == '') echo 0;
            else echo $list[$i][1];
            $i++; ?></td>
                    <?php } ?>
                    </tr>
                <?php } ?>
    <?php include_once('page_body.php'); ?>

    <?php
} else {
    echo '<h1>You did not <a href="login.php">Login</a></h1>';
}
