<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">


	<title>User list page - Bootdey.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./page/css/popup.css">
	<style type="text/css">
		body {
			margin-top: 20px;
		}


		/* USER LIST TABLE */
		.user-list tbody td>img {
			position: relative;
			max-width: 50px;
			float: left;
			margin-right: 15px;
		}

		.user-list tbody td .user-link {
			display: block;
			font-size: 1.25em;
			padding-top: 3px;
			margin-left: 60px;
		}

		.user-list tbody td .user-subhead {
			font-size: 0.875em;
			font-style: italic;
		}

		/* TABLES */
		.table {
			border-collapse: separate;
		}

		.table-hover>tbody>tr:hover>td,
		.table-hover>tbody>tr:hover>th {
			background-color: #eee;
		}

		.table thead>tr>th {
			border-bottom: 1px solid #C2C2C2;
			padding-bottom: 0;
		}

		.table tbody>tr>td {
			font-size: 0.875em;
			background: #f5f5f5;
			border-top: 10px solid #fff;
			vertical-align: middle;
			padding: 12px 8px;
		}

		.table tbody>tr>td:first-child,
		.table thead>tr>th:first-child {
			padding-left: 20px;
		}

		.table thead>tr>th span {
			border-bottom: 2px solid #C2C2C2;
			display: inline-block;
			padding: 0 5px;
			padding-bottom: 5px;
			font-weight: normal;
		}

		.table thead>tr>th>a span {
			color: #344644;
		}

		.table thead>tr>th>a span:after {
			content: "\f0dc";
			font-family: FontAwesome;
			font-style: normal;
			font-weight: normal;
			text-decoration: inherit;
			margin-left: 5px;
			font-size: 0.75em;
		}

		.table thead>tr>th>a.asc span:after {
			content: "\f0dd";
		}

		.table thead>tr>th>a.desc span:after {
			content: "\f0de";
		}

		.table thead>tr>th>a:hover span {
			text-decoration: none;
			color: #2bb6a3;
			border-color: #2bb6a3;
		}

		.table.table-hover tbody>tr>td {
			-webkit-transition: background-color 0.15s ease-in-out 0s;
			transition: background-color 0.15s ease-in-out 0s;
		}

		.table tbody tr td .call-type {
			display: block;
			font-size: 0.75em;
			text-align: center;
		}

		.table tbody tr td .first-line {
			line-height: 1.5;
			font-weight: 400;
			font-size: 1.125em;
		}

		.table tbody tr td .first-line span {
			font-size: 0.875em;
			color: #969696;
			font-weight: 300;
		}

		.table tbody tr td .second-line {
			font-size: 0.875em;
			line-height: 1.2;
		}

		.table a.table-link {
			margin: 0 5px;
			font-size: 1.125em;
		}

		.table a.table-link:hover {
			text-decoration: none;
			color: #2aa493;
		}

		.table a.table-link.danger {
			color: #fe635f;
		}

		.table a.table-link.danger:hover {
			color: #dd504c;
		}

		.table-products tbody>tr>td {
			background: none;
			border: none;
			border-bottom: 1px solid #ebebeb;
			-webkit-transition: background-color 0.15s ease-in-out 0s;
			transition: background-color 0.15s ease-in-out 0s;
			position: relative;
		}

		.table-products tbody>tr:hover>td {
			text-decoration: none;
			background-color: #f6f6f6;
		}

		.table-products .name {
			display: block;
			font-weight: 600;
			padding-bottom: 7px;
		}

		.table-products .price {
			display: block;
			text-decoration: none;
			width: 50%;
			float: left;
			font-size: 0.875em;
		}

		.table-products .price>i {
			color: #8dc859;
		}

		.table-products .warranty {
			display: block;
			text-decoration: none;
			width: 50%;
			float: left;
			font-size: 0.875em;
		}

		.table-products .warranty>i {
			color: #f1c40f;
		}

		.table tbody>tr.table-line-fb>td {
			background-color: #9daccb;
			color: #262525;
		}

		.table tbody>tr.table-line-twitter>td {
			background-color: #9fccff;
			color: #262525;
		}

		.table tbody>tr.table-line-plus>td {
			background-color: #eea59c;
			color: #262525;
		}

		.table-stats .status-social-icon {
			font-size: 1.9em;
			vertical-align: bottom;
		}

		.table-stats .table-line-fb .status-social-icon {
			color: #556484;
		}

		.table-stats .table-line-twitter .status-social-icon {
			color: #5885b8;
		}

		.table-stats .table-line-plus .status-social-icon {
			color: #a75d54;
		}

		.image:hover {
			cursor: crosshair;
		}
	</style>
</head>

<body>
	<div class="popup-image">
		<span class="glyphicon glyphicon-remove-circle close-button"></span>
		<img src="img/<?php echo $data['img']; ?>" class="image" width='500' alt="">
	</div>
	<h2>
		<center>Daftar Inventaris</center>
	</h2>
	<hr>
	<!-- tabel start -->
	<a href="?p=tambah_barang" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
	<form class="navbar-form navbar-right" role="search" method="get">
		<div class="form-group">
			<input type="hidden" name="p" value="list_barang">
			<input type="text" class="form-control" placeholder="Cari barang" name="cari">
		</div>
		<button type="submit" class="btn btn-default">Cari</button>
	</form>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="main-box clearfix">
					<div class="table-responsive">
						<table class="table user-list">
							<thead>
								<tr>
									<th><span>Gambar</span></th>
									<th><span>Kode Inventaris</span></th>
									<th class="text-center"><span>Nama Barang</span></th>
									<th><span>Kondisi</span></th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php
								@$cari = $_GET['cari'];
								$q_cari = "";
								if (!empty($cari)) {
									$q_cari .= "and nama like '%" . $cari . "%'";
								}
								$pembagian = 5;
								$page = isset($_GET['halaman']) ? (INT) $_GET['halaman'] : 1;
								$mulai = $page > 1 ? $page * $pembagian - $pembagian : 0;

								$sql = "SELECT *, inventaris.keterangan as ket FROM inventaris LEFT JOIN ruang ON ruang.id_ruang = inventaris.id_ruang WHERE 1=1 $q_cari LIMIT $mulai, $pembagian";
								$query = mysqli_query($koneksi, $sql);
								$cek = mysqli_num_rows($query);
								// echo ($cek);
								
								// mencari total halaman
								$sql_total = "SELECT * FROM inventaris";
								$q_total = mysqli_query($koneksi, $sql_total);
								$total = mysqli_num_rows($q_total);

								$jumlahHalaman = ceil($total / $pembagian);


								if ($cek > 0) {
									$no = $mulai + 1;
									while ($data = mysqli_fetch_array($query)) {
										$tgl = $data['tanggal_register'];
										?>
										<tr>
											<td><img src="img/<?php echo $data['img']; ?>" class="image popup-trigger"
													width='100' alt="">
											</td>
											<!-- <td><p><?php echo $data['img']; ?></p></td> -->
											<td>
												<?= $data['kode_inventaris'] ?>
											</td>
											<td>
												<?= $data['nama'] ?>
											</td>
											<td>
												<?= $data['kondisi'] ?>
											</td>
											<!-- <td><?= $data['jumlah'] ?></td>
				<td><?= $data['nama_ruang'] ?></td>
				<td><?= date("d-m-y", strtotime($tgl)) ?></td>
				<td><?= $data['ket'] ?></td> -->
											<td style="width: 20%;">
												<a href="?p=lihat_isi&id_inventaris=<?= $data['id_inventaris'] ?>"
													class="table-link">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
													</span>
												</a>
												<a href="?p=edit_barang&id_inventaris=<?= $data['id_inventaris'] ?>"
													class="table-link">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
												<a onclick="return confirm('Apakah anda yakin untuk menghapusnya?')"
													href="page/hapus_barang.php?id_inventaris=<?= $data['id_inventaris'] ?>"
													class="table-link danger">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
													</span>
												</a>
											</td>
										</tr>
										<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
					<ul class="pagination pull-right">
						<li><a href="?p=list_barang&halaman=<?= $page - 1 ?>"><i class="fa fa-chevron-left"></i></a>
						</li>
						<?php
						for ($i = 1; $i <= $jumlahHalaman; $i++) {
							?>
							<li class="<?= ($i == @$_GET['halaman'] ? 'active' : '') ?>">
								<a href="?p=list_barang&halaman=<?= $i ?>">
									<?= $i ?>
								</a>
							</li>
							<?php
						}
						?>
						<li><a href="?p=list_barang&halaman=<?= $page + 1 ?>"><i class="fa fa-chevron-right"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript">

	</script>

	<script>
		document.querySelectorAll('.popup-trigger').forEach(trigger => {
			trigger.onclick = () => {
				document.querySelector('.popup-image').style.display = 'block';
				document.querySelector('.popup-image img').src = trigger.getAttribute('src');
			};
		});

		document.querySelector('.popup-image span').onclick = () => {
			document.querySelector('.popup-image').style.display = 'none';
		};

		function openPopup() {
			document.querySelector('.popup-image').style.display = 'flex';
			document.body.classList.add('popup-opened');
		}

		function closePopup() {
			document.querySelector('.popup-image').style.display = 'none';
			document.body.classList.remove('popup-opened');
		}
	</script>
</body>

</html>