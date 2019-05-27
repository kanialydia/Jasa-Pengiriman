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
						<h2>Form Registrasi</h2>
					</header>
				</div>
			</section>
				
		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p>Masukkan Data</p>
								<h2></h2>
								<?php
				include "koneksi.php";
				//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$arrayError = array();//inisialisasi array error
					//kondisi apakah telah memasukkan username
				
					
					
					if(empty($_POST['username'])){
						$arrayError[]='<script type="text/javascript">alert("Username tidak boleh kosong");</script> ';
					}
					else{$username = trim($_POST['username']);
					}
					
					if(!empty($_POST['password1'])){
						if($_POST['password1'] != $_POST['password2']){
							$arrayError[]='<script type="text/javascript">alert("Password yang anda masukkan tidak sama");</script> ';
						}
						else{$password = trim($_POST['password1']);
					}}
					else{$arrayError[]='<script type="text/javascript">alert("password tidak boleh kosong");</script>' ;
					}	
					
					if(empty($_POST['level'])){
						$arrayError[]='<script type="text/javascript">alert("Level Karyawan tidak boleh kosong");</script> ';
					}
					else{$level = trim($_POST['level']);
					}
					
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('koneksi.php');//koneksi ke database.
						//melakukan query
						$q = "INSERT INTO pengguna (id_pengguna,username,password,level,status)
						VALUES('','$username','$password','$level','aktif')";
						$hasil = @mysqli_query ($conn, $q);//menjalankan query
						if($hasil){//jika berhasil
							header("Location:superadmin_datapengguna.php");
						}
						else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Gagal Menambahkan Pengguna");</script> ';
							//Debug:
							echo '<p>'. mysqli_error($conn).'<br><br>Query: ' .$q. '</p>';
						}
						mysqli_close($conn);//menutup koneksi
						exit();
					}
					else{
						foreach ($arrayError as $psn) {//menampilkan error
							echo"<h11>$psn</h11><br>\n";
						}
						echo '</p><h2>Silahkan coba lagi.</h2>';
					}
				}
				?>
								<form method="post" action="superadmin_forminputkaryawan.php">
									<div class="row uniform">
										<div class="6u 12u$(small)">
											<input class="form-control" type="text" name="username" for="username" id="username" 
											value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" placeholder="username" />
										</div>
										<div class="6u 12u$(small)">
											<input class="form-control" type="password" name="password1" for="password1" id="password1" 
											value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>" placeholder="password" />
										</div>
									</div>
									<div class="row uniform">
									<div class="6u 12u$(small)">
											<div class="select-wrapper">
												<select name="level" id="kota_asal">
													<option value="">- Level -</option>
													<option value="Adming">Admin<?php if (isset($_POST['leve']) AND ($_POST['level'] == 'Admin'))
												echo 'selected="selected"';?></option>
													<option value="Kurir">Kurir<?php if (isset($_POST['level']) AND ($_POST['level'] == 'Kurir'))
												echo 'selected="selected"';?></option>
												</select>
											</div>
									</div>
									<div class="6u 12u$(small)">
											<input class="form-control" type="password" name="password2" for="password2" id="password2" 
											value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>" placeholder="Konfirmasi password" />
									</div>
									</div>
									<div class="row uniform">
										<div class="12u$ 12u$(small)">
											<input type="submit" name="submit" id="submit" value="Submit" class="fit" />
										</div>
									</div>
							</form>
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