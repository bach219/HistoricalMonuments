<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>World Historical Monuments</title>

	<link rel="stylesheet" type="text/css" href="style/style.css">

	<script src="jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="style/bootstrap-4.3.1/js/bootstrap.min.js"></script>
	<script src="style/bootstrap-4.3.1/js/popper.min.js"></script>
	<link rel="stylesheet" href="style/bootstrap-4.3.1/css/bootstrap.min.css">


	<script src="admin/ckeditor/ckeditor.js"></script>
	<link href="style/lightbox/css/lightbox.css" rel="stylesheet">
	<script src="style/lightbox/js/lightbox.js"></script>

</head>

<body>
	<?php

	$sql = "select * from `zones` order by `id_zone` asc";
	$query = mysqli_query($conn, $sql);


	?>
	<header>
		<a href="index.php">

			<img class="d-block w-100 h-100" src="images/header.jpg" alt="header" />
		</a>
	</header>

	<nav class="navbar navbar-expand-lg navbar-dark bg-warning ">
		<a class="navbar-brand text-dark" href="index.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link text-dark" href="gallery.php">Gallery</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Zones
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php while ($data = mysqli_fetch_array($query)) { ?>
							<a class="dropdown-item" href="list.php?id= <?php echo $data["id_zone"]; ?>"><?php echo $data["name_zone"]; ?></a>
						<?php } ?>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="ad.php">Advertisment</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="contact.php">Contact Us</a>
				</li>
			</ul>
			
		</div>
	</nav>
