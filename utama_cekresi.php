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
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="utama.php">GBA Fast</a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="utama.php">Home</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/slide01.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Jasa Pengiriman Barang Terpercaya</p>
							<h2>GBA Fast</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide02.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Memberikan Pelayanan Terbaik Dalam</p>
							<h2>Pengiriman</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide03.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Pengiriman Hingga Pelosok Negeri</p>
							<h2>GBA FAST</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide04.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>GBA FAST</p>
							<h2>Bandung</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide05.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>GBA FAST</p>
							<h2>WELCOME</h2>
						</header>
					</div>
				</article>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style2">
			<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p>Cek Resi</p>
								<h2>GBA FAST</h2>
							</header>
							
							<form method="post" action="utama_cekresi.php">
									<div class="row uniform">
										<div class="3u 12u$(small)">
										</div>
										<div class="4u 12u$(small)">
											<input id="resi"  for="resi" placeholder="Masukkan Resi" name="resi" type="text" required
													value="<?php if (isset($_POST['resi'])) echo $_POST['resi']; ?>" />
										</div>
										<div class="2u$ 12u$(small)">
											<input type="submit" name="submit" id="submit" value="Search" class="fit" />
										</div>
									</div>
							</form>
							<header class="align-center">
								<p>INFO PAKET</p>
								<h2></h2>
								<div class="table-wrapper">
									<table class="alt">
							<?php
							require('koneksi.php');
							echo '<p class="text-center"> Jika form kosong maka resi yang anda cari belum terdaftar atau salah!';
							
							$resi=$_POST['resi'];
							$resi=mysqli_real_escape_string($conn, $resi);
							
							$q= "SELECT resi, status, pengirim, kota_asal, tanggal_kirim, penerima, kota_tujuan, tanggal_terima FROM paket WHERE resi='$resi'";
							$hasil=@mysqli_query ($conn, $q);
							
							if($hasil){
								echo'
												<thead>
													<tr>
														<th>Resi</th>
														<th>Status</th>
														<th>Pengirim</th>
														<th>Kota Asal</th>
														<th>Tanggal Kirim</th>
														<th>Penerima</th>
														<th>Kota Tujuan</th>
														<th>Tanggal Diterima</th>
													</tr>
												</thead>
												<tbody>';
												//tampilkan semua user
													while($baris=mysqli_fetch_array($hasil, MYSQLI_ASSOC)){
												echo'<tr>
														<td>' . $baris['resi'] . '</td>
														<td>' . $baris['status'] . '</td>
														<td>' . $baris['pengirim'] . '</td>
														<td>' . $baris['kota_asal'] . '</td>
														<td>' . $baris['tanggal_kirim'] . '</td>
														<td>' . $baris['penerima'] . '</td>
														<td>' . $baris['kota_tujuan'] . '</td>
														<td>' . $baris['tanggal_terima'] . '</td>
													</tr>
												</tbody>';}
											echo '</table>';
											mysqli_free_result($hasil);
										
										}else{
											echo '<p class="error">Terjadi Kesalahan.! </p>';
											echo '<p>' . mysqli_error($conn) . '<br><br>Query:' . $q . '</p>'; 
										}
										$q="SELECT COUNT (id_paket) FROM paket";
										$hasil=@mysqli_query($conn, $q);
										$baris=@mysqli_fetch_array($hasil, MYSQLI_NUM);
										$anggota=$baris[0];
										mysqli_close($conn);
							
							?>
								</div>
								
							</header>
							
						</div>
					</div>
				</div>
				
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Merupakan Jasa Pengiriman Dengan Pelayanan Terbaik</p>
						<h2>GBA FAST</h2>
					</header>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
					<header class="align-center">
						<p class="special">Merupakan Jasa Pengiriman Dengan Pelayanan Terbaik</p>
						<h2>Tentang GBA FASt</h2>
					</header>
					<div class="inner">
					<div class="grid-style">

						<div>
							<div class="box">
								<div class="image fit">
									<img src="images/pic02.jpg" alt="" />
								</div>
								<div class="content">
									<header class="align-center">
										<p>maecenas sapien feugiat ex purus</p>
										<h2>Lorem ipsum dolor</h2>
									</header>
									<p> Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis. Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum. Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.</p>
									<footer class="align-center">
										<a href="#" class="button alt">Learn More</a>
									</footer>
								</div>
							</div>
						</div>

						<div>
							<div class="box">
								<div class="image fit">
									<img src="images/pic03.jpg" alt="" />
								</div>
								<div class="content">
									<header class="align-center">
										<p>mattis elementum sapien pretium tellus</p>
										<h2>Vestibulum sit amet</h2>
									</header>
									<p> Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis. Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum. Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.</p>
									<footer class="align-center">
										<a href="#" class="button alt">Learn More</a>
									</footer>
								</div>
							</div>
						</div>

					</div>
				</div>
					
					<div class="gallery">
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic01.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic02.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic03.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic04.jpg" alt="" /></a>
							</div>
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