<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Login GBA Fast</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
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
				
		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>GBA Fast</p>
						<h2>Please Login</h2>
					</header>
				</div>
			</section>
				<?php
				//Bagian ini berfungsi untuk memproses submisi form login!
				//memeriksa apakah form login sudah terisi:
				if (isset($_POST['login'])){
					include "koneksi.php";

					$cek_data=mysqli_query($conn, "SELECT * FROM pengguna WHERE
					username ='".$_POST['username']."' AND password = '".$_POST['password']."' ");
					$data = mysqli_fetch_array($cek_data);
					$level = $data['level'];
					if (mysqli_num_rows($cek_data) > 0){
					if($level == 'Super Admin'){
						header("Location:superadmin.php");
					}elseif($level == 'Admin'){
						header("Location:admin.php");
					}elseif($level == 'Kurir'){
						header('Location:kurir.php');
					}
				}else{
					echo '<script type="text/javascript">alert("Pastikan username dan password anda benar");</script> ';
					}
				}
				?>
		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p>Login</p>
								<h2></h2>
							</header>
							
							<form method="post" action="login.php">
									<div class="row uniform">
										<div class="3u 12u$(small)">
										</div>
										<div class="6u 12u$(small)">
											<input class="form-control" type="text" name="username" for="username" id="username" required
											value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" placeholder="Username" />
										</div>
									</div>
									<div class="row uniform">
										<div class="3u 12u$(small)">
										</div>
										<div class="6u 12u$(small)">
											<input class="form-control" type="password" name="password" id="password" required
											value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" placeholder="Password" />
										</div>
									</div>
									
									<div class="row uniform">
										<div class="5u 12u$(small)">
										</div>
										<div class="2u$ 12u$(small)">
											<input type="submit" name="login" id="submit" value="Login" class="fit" />
										</div>
									</div>
							</form>
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