<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']) {
    include './linkMySql.php';
    
    unset($_SESSION['json']);
    unset($_SESSION['json1']);
    unset($_SESSION['json2']);
    unset($_SESSION['json3']);
    unset($_SESSION['title']);
    $_SESSION['title'] = "Dashboard";
// echo $_SESSION['json'] ;

    $sql = "  SELECT COUNT(monuments.id_mon) AS `Name`, COUNT(feedback.id_feedback) AS `Feedback`
                      FROM `feedback`
                      INNER JOIN `monuments` ON monuments.id_mon = feedback.mon_id    
                      GROUP BY  monuments.zone_id  
                      ORDER BY monuments.zone_id   
                    ";

    $sql1 = "  SELECT COUNT(monuments.id_mon) AS `Monument`
                      FROM `monuments`    
                      GROUP BY  monuments.zone_id  
                      ORDER BY monuments.zone_id   
                    ";
    $sql2 = "  SELECT COUNT(advertisement.id_ad) AS `Advertisement`
                      FROM `advertisement`
                      INNER JOIN `monuments` ON monuments.id_mon = advertisement.mon_id    
                      GROUP BY  monuments.zone_id  
                      ORDER BY monuments.zone_id   
                    ";
    $sql3 = "  SELECT COUNT(gallery.gal_id) AS `Gallery`
                      FROM `gallery`
                      INNER JOIN `monuments` ON monuments.id_mon = gallery.mon_id    
                      GROUP BY  monuments.zone_id  
                      ORDER BY monuments.zone_id   
                    ";

    $data = db_q($sql);
    $_SESSION['json'] = json_encode($data);
    $data1 = db_q($sql1);
    $_SESSION['json1'] = json_encode($data1);
    $data2 = db_q($sql2);
    $_SESSION['json2'] = json_encode($data2);
    $data3 = db_q($sql3);
    $_SESSION['json3'] = json_encode($data3);
    ?>
    <?php include_once('header.php'); ?>

    <div class="content">
        <h1>Welcome to Admin page,<php echo $_SESSION['json']; ?> <strong style="color: 
            <?php
            if ($_SESSION['username'] == 'Admin' && $_SESSION['level'] == '1') {
                echo 'orange';
            } else if ($_SESSION['username'] != 'Admin' && $_SESSION['level'] == '1') {
                echo '#66ccff';
            } else {
                echo '#66ff66';
            }
            ?>
                                           ; font-size: 30px;"><?php echo $_SESSION['username']; ?>!</strong></h1>
        <canvas id="myChart" width="100%" height="40px" ></canvas>
        <div class="alert alert-warning" style="text-align:center; font-size:20px">
            <strong style="text-align:center; font-size:20px">Analysis Zone Table</strong>
        </div>       
    </div>

    </body>
    </html>


    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var data = JSON.parse('<?php echo $_SESSION['json']; ?>');
        var data1 = JSON.parse('<?php echo $_SESSION['json1']; ?>');
        var data2 = JSON.parse('<?php echo $_SESSION['json2']; ?>');
        var data3 = JSON.parse('<?php echo $_SESSION['json3']; ?>');

        var Feedback = [];
        var Monument = [];
        var Advertisement = [];
        var Gallery = [];

        for (var i in data) {
            Feedback.push(data[i].Feedback);
        }
        for (var i in data1) {
            Monument.push(data1[i].Monument);
        }
        for (var i in data2) {
            Advertisement.push(data2[i].Advertisement);
        }
        for (var i in data3) {
            Gallery.push(data3[i].Gallery);
        }
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['North', 'South', 'East', 'West'],
                datasets: [
                    {label: 'Number of Monuments',
                        data: Monument,
                        backgroundColor: 'rgba(255, 114, 35, 0.2)',
                        borderColor: 'orange',
                        borderWidth: 1},

                    {label: 'Number of Gallery',
                        data: Gallery,
                        backgroundColor: 'rgba(255, 224, 61, 0.2)',
                        borderColor: 'rgb(255, 0, 255)',
                        borderWidth: 1},

                    {label: 'Number of Feedbacks',
                        data: Feedback,
                        backgroundColor: 'rgba(255, 232, 204, 0.2)',
                        borderColor: 'rgba(255, 99, 71, 0.5)',
                        borderWidth: 1},

                    {label: 'Number of Advertisements',
                        data: Advertisement,
                        backgroundColor: 'rgba(255, 147, 61, 0.2)',
                        borderColor: 'hsl(0, 100%, 30%)',
                        borderWidth: 1}
                ]
            },

            /*
             {label: 'Number of Monuments',
             data: Monument,
             backgroundColor: [
             'rgba(245, 161, 71, 0.2)',
             'rgba(245, 161, 71, 0.2)',
             'rgba(245, 161, 71, 0.2)',
             'rgba(245, 161, 71, 0.2)'
             ],
             borderColor: [
             'rgba(255, 206, 86, 1)',
             'rgba(255, 206, 86, 1)',
             'rgba(255, 206, 86, 1)',
             'rgba(255, 206, 86, 1)',
             ],
             borderWidth: 1},
             
             {label: 'Number of Gallery',
             data: Gallery,
             backgroundColor: [
             'rgb(80, 238, 47, 0.2)',
             'rgb(80, 238, 47, 0.2)',
             'rgb(80, 238, 47, 0.2)',
             'rgb(80, 238, 47, 0.2)'
             ],
             borderColor: [
             'rgba(143, 188, 143, 1)',
             'rgba(143, 188, 143, 1)',
             'rgba(143, 188, 143, 1)',
             'rgba(143, 188, 143, 1)',
             ],
             borderWidth: 1},
             
             {label: 'Number of Feedbacks',
             data: Feedback,
             backgroundColor: [
             'rgb(255, 55, 255, 0.2)',
             'rgb(255, 55, 255, 0.2)',
             'rgb(255, 55, 255, 0.2)',
             'rgb(255, 55, 255, 0.2)'
             ],
             borderColor: [
             'rgba(75, 192, 192, 1)',
             'rgba(75, 192, 192, 1)',
             'rgba(75, 192, 192, 1)',
             'rgba(75, 192, 192, 1)',
             ],
             borderWidth: 1},
             
             {label: 'Number of Advertisements',
             data: Advertisement,
             backgroundColor: [
             'rgb(255, 247, 125, 0.2)',
             'rgb(255, 247, 125, 0.2)',
             'rgb(255, 247, 125, 0.2)',
             'rgb(255, 247, 125, 0.2)'
             ],
             borderColor: [
             'rgba(255, 123, 102, 1)',
             'rgba(255, 123, 102, 1)',
             'rgba(255, 123, 102, 1)',
             'rgba(255, 123, 102, 1)',
             ],
             borderWidth: 1}
             ]
             },
             */
            options: {
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                }
            }
        });
    </script>
<?php
} else {
    echo '<h1>You did not <a href="login.php">login</a></h1>';
}