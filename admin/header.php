<?php
if (isset($_SESSION['username']) && $_SESSION['username']) {
    $row = db_one($result);
    $sql = "SELECT * FROM $_SESSION[title] ";
    $list = db_q($sql);
    ?>

    <!DOCTYPE html>
    <html>

        <head>
            <title><?php echo $_SESSION[title]; ?></title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="style.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <script src="javascript/jquery-3.4.1.min.js" type="text/javascript"></script>
            <script src="bootstrap-3.4.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="bootstrap-3.4.1/css/bootstrap.min.css">
            <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

            <link href="DataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
            <link href="DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css"/>

            <script src="DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="DataTables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>

            <script type="text/javascript" src="javascript/Chart.min.js"></script>
            <script src="javascript/sweetalert.min.js"></script>

        </head>

        <body>

            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="dashboard.php" style="color: #ffcc99;">Historic Monument</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="../index.php" target="_blank" style="color: #ffffcc;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <div>
                                <li><?php
                                    if ($_SESSION['username'] == 'Admin' && $_SESSION['level'] == '1') {
                                        echo '<div style="color: orange;" class="glyphicon glyphicon-user">' . $_SESSION['username'] . '</div>';
                                    } else if ($_SESSION['username'] != 'Admin' && $_SESSION['level'] == '1') {
                                        echo '<div style="color: #66ccff;" class="glyphicon glyphicon-user">' . $_SESSION['username'] . '</div>';
                                    } else {
                                        echo '<div style="color: #66ff66;" class="glyphicon glyphicon-user">' . $_SESSION['username'] . '</div>';
                                    }
                                    ?>

                                </li>
                                <li><a href="logout.php" style="color: whitesmoke;"><span class="glyphicon glyphicon-log-out" ></span>Logout</a></li>
                            </div>
                        </ul>
                    </div>

                </div>
            </nav>

            <div class="sidebar" id = "sidebar">
                <ul class="list-unstyled components" style="font-size: 18px;">
                    <form action="header.php" method="post">

                        <li class="active">
                            <div class="boxside" >
                                <a href="#myZone" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;"><span class="glyphicon glyphicon-sort-by-attributes"></span> Zone</a>
                                <ul class="collapse list-unstyled" id="myZone">
                                    <li>
                                        <div class="boxside" >
                                            <a href="zone.php?check=1" style="text-decoration: none;"><span class="glyphicon glyphicon-triangle-right"></span> 1.North</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="boxside" >
                                            <a href="zone.php?check=2" style="text-decoration: none;"><span class="glyphicon glyphicon-triangle-right"></span> 2.South</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="boxside" >
                                            <a href="zone.php?check=3" style="text-decoration: none;"><span class="glyphicon glyphicon-triangle-right"></span> 3.East</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="boxside" >
                                            <a href="zone.php?check=4" style="text-decoration: none;"><span class="glyphicon glyphicon-triangle-right"></span> 4.West</a>
                                        </div>
                                    </li>
                                </ul>
                                <div>
                                    </li>
                                    <li>
                                        <div class="boxside" >
                                            <a href="users.php" style="text-decoration: none;"><span class="glyphicon glyphicon-user"></span> User</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="boxside" >
                                            <a href="monuments.php" style="text-decoration: none;"><span class="glyphicon glyphicon-globe"></span> Monument</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="boxside">
                                            <a href="advertisement.php" style="text-decoration: none;"><span class="glyphicon glyphicon-blackboard"></span> Advertisement</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="boxside">
                                            <a href="banner.php" style="text-decoration: none;"><span class="glyphicon glyphicon-picture"></span> Banner</a>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="boxside">
                                            <a href="gallery.php" style="text-decoration: none;"><span class="glyphicon glyphicon-film"></span> Gallery</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="boxside">
                                            <a href="feedback.php" style="text-decoration: none;"><span class="glyphicon glyphicon-list-alt"></span> Feedback</a>
                                        </div>
                                    </li>
                                    <li>

                                        <?php if ($_SESSION['level'] == '1') { ?>
                                            <div class="boxside">
                                                <a href="contact.php" style="text-decoration: none;"><span class="glyphicon glyphicon-earphone"></span> Contact</a>
                                            </div>
                                        <?php } ?>
                                    </li>
                                    </form>
                                    </ul>
                                </div>
                                <div class = "wrapper">

                                    <?php
                                } else {
                                    echo 'You did not <a href="login.php">login</a>';
                                }
