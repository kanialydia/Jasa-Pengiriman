<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>GBA Fast</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="superadmin.php">GBA Fast</a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="superadmin.php">Home</a></li>
					<li><a href="superadmin_formkirim.php">Form Kirim Paket</a></li>
					<li><a href="superadmin_forminputkaryawan.php">Form Registrasi</a></li>
					<li><a href="superadmin_datapaket.php">Data Paket</a></li>
					<li><a href="superadmin_datapengguna.php">Data Karyawan</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
				
		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>GBA Fast</p>
						<h2>Data Karyawan</h2>
					</header>
				</div>
			</section>
				
		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p>Data Seluruh Karyawan</p>
								<h2></h2>
								<div class="table-wrapper">
									<table class="alt">
									<?php
									require('koneksi.php');
									$data="SELECT * FROM pengguna";
									$hasil=@mysqli_query ($conn, $data);
									if($hasil){
										echo '
										<thead>
											<tr>
												<th>Edit</th>
												<th>username</th>
												<th>Level</th>
												<th>Status</th>
												<th>Lihat Password</th>
											</tr>
										</thead>
										<tbody>';
										while($baris=mysqli_fetch_array($hasil, MYSQLI_ASSOC))
											echo '
											<tr>
												<td><a href="#" class="button special fit small icon fa-edit">Edit</a></td>
												<td>' . $baris['username'] . '</td>
												<td>' . $baris['level'] . '</td>
												<td>' . $baris['status'] . '</td>
												<td><a href="#" class="button special fit small icon fa-search">Lihat Password</a></td>
												</tr>';
											mysqli_free_result($hasil);
									}else{
										echo '<p class="error">Terjadi Kesalahan.!</p>';
										echo '<p>' . mysqli_error($conn) . '<br>Query: ' . $data . '</p>';
									}
									mysqli_close($conn);
									?>
									</tbody>
									</table>
								</div>
								
							</header>
						</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>