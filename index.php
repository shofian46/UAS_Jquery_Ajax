<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>UAS | Ajax Jquery</title>
</head>
<link rel="stylesheet" href="lib/style.css" />
<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="lib/jquery-ui-1.12.1/jquery-ui.min.css" />

<link rel="stylesheet" type="text/css" href="lib/data_tables/datatables.min.css" />

<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-success bg-ligh">
			<a class="navbar-brand" href="#">UAS AJAX JQUERY</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<?php $active = isset($_GET['url']) ? $_GET['url'] : ''; ?>
					<li class="nav-item <?php if ($active == 'biodata') {
											echo "active";
										} ?>">
						<a class="nav-link" href="index.php?url=biodata">Member</a>
					</li>
					<li class="nav-item <?php if ($active == 'buku') {
											echo "active";
										} ?>">
						<a class="nav-link" href="index.php?url=buku">Buku</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Peminjaman
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?url=peminjaman">Form Peminjaman</a>
							<a class="dropdown-item" href="index.php?url=peminjaman_list">List Peminjaman</a>
						</div>
					</li>

					<li class="nav-item <?php if ($active == 'pengembalian') {
											echo "active";
										} ?>">
						<a class="nav-link" href="index.php?url=pengembalian">Pengembalian </a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_rpt" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Laporan
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown_rpt">
							<a class="dropdown-item" href="index.php?url=rpt_pinjam">Report Peminjaman</a>
							<!-- <a class="dropdown-item" href="index.php?url=peminjaman_list">List Peminjaman</a> -->
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<br>

	<div class="row">
		<div class="container">
			<?php
			include('config_page.php');
			include('module.php');
			if (isset($app_page) && $app_page != '')
				include($app_page);
			?>
		</div>
	</div>


	<script src="lib/jquery-3.4.1.min.js"></script>
	<script src="lib/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="lib/swal/dist/sweetalert2.all.min.js"></script>
	<script src="lib/jquery-loading/dist/jquery.loading.min.js"></script>
	<script type="text/javascript" src="lib/data_tables/datatables.min.js"></script>
	<script src="lib/jspdf/jspdf.min.js"></script>
	<?php
	if (isset($app_js) && $app_js != '')
		include($app_js);
	?>

</body>

</html>