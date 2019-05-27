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
				<div class="logo"><a href="kurir.php">GBA Fast</a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="kurir.php">Home</a></li>
					<li><a href="kurir_datapaket.php">Kirim Paket</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
				
		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>GBA Fast</p>
						<h2>Data Paket</h2>
					</header>
				</div>
			</section>
				
		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p>Kirim Paket Dengan Resi Berikut?</p>
								<h2></h2>
								<div class="table-wrapper">
									<table class="alt">
									<?php
									if ((isset($_GET['id_paket'])) && (is_numeric($_GET['id_paket']))){
										$id = $_GET['id_paket'];
									}elseif ((isset($_POST['id_paket'])) && (is_numeric($_POST['id_paket']))){
										$id = $_POST['id_paket'];
									}else {
										echo '<p class="error"> Halaman ini Error</p>';
										exit();
									}
									require('koneksi.php');
									if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
										if($_POST['yakin']=='Ya'){
											$q ="UPDATE paket SET status='Terkirim',tanggal_terima=NOW() WHERE id_paket=$id LIMIT 1";
											$hasil = @mysqli_query ($conn, $q);
										
											if (mysqli_affected_rows($conn) == 1){
											echo '<script type="text/javascript">alert("Paket Berhasil Dikirim");</script> ';
											header("Location:kurir_datapaket.php");
											}else{
											echo '<script type="text/javascript">alert("Error sistem");</script> ';
											echo '<p>' . mysqli_error($conn) . '<br />Query: ' . $q . '</p>';
											}
										}else{
										echo '<script type="text/javascript">alert("Paket batal dikirim");</script> ';
										header("Location:kurir_datapaket.php");
										
										}
									}else{
									$q="SELECT CONCAT (resi) FROM paket WHERE id_paket=$id";
									$hasil=@mysqli_query ($conn, $q);
									if(mysqli_num_rows($hasil) == 1){
										$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
										echo "<h2> $baris[0] </h2>";
											//form hapus
											echo '<form action="kurir_kirimpaket.php" method="post">
												<div class="row uniform">
												<div class="3u 12u$(small)">
												</div>
												<div class="3u 12u$(small)">
													<input id="submit-yes" class="fit " 
													type="submit" name="yakin" value="Ya">
												</div>
												<div class="3u 12u$(small)">
													<input id="submit-no" class="fit" 
													type="submit" name="yakin" value="Tidak">
												</div>
												<br><input type="hidden" name="id_paket" value="' . $id . '"/>
												</div>
												</form>';
									}else{
										echo '<p class="error">Terjadi Kesalahan.!</p>';
										echo '<p>' . mysqli_error($conn) . '<br>Query: ' . $q . '</p>';
									}
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