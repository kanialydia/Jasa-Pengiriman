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
				<div class="logo"><a href="admin.php">GBA Fast</a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
				<li><a href="admin.php">Home</a></li>
					<li><a href="admin_formkirim.php">Form Kirim Paket</a></li>
					<li><a href="admin_datapaket.php">Data Paket</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
				
		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>GBA Fast</p>
						<h2>Form Kirim Paket</h2>
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
					$q="SELECT max(resi) as maxKode FROM paket";
					$hasil = @mysqli_query ($conn, $q);
					$data = mysqli_fetch_array($hasil);
					$resi=$data['maxKode'];
					$noUrut=(int) substr($resi, 7, 7);
					$noUrut++;
					$char = "GBAFAST";
					$resi= $char . sprintf("%07s", $noUrut);
					echo'<div class="col-lg-12">';
					echo'<div class="well well-lg">';
					echo '<h2>No. Resi Anda : ';
					echo $resi;
					echo '</h2>';
					echo '<ul class="actions fit small">
									<li><a href="superadmin.php" class="button special fit small">OK!</a></li>
							</ul>';
					echo'</div>';
					echo'</div>';
					
					
					if(empty($_POST['pengirim'])){
						$arrayError[]='<script type="text/javascript">alert("Nama pengirim tidak boleh kosong");</script> ';
					}
					else{$pengirim = trim($_POST['pengirim']);
					}
					
					if(empty($_POST['penerima'])){
						$arrayError[]='<script type="text/javascript">alert("Nama penerima tidak boleh kosong");</script>';
					}
					else{$penerima = trim($_POST['penerima']);
					}
					
					if(empty($_POST['alamat_pengirim'])){
						$arrayError[]='<script type="text/javascript">alert("Alamat pengirim tidak boleh kosong");</script> ';
					}
					else{$alamat_pengirim = trim($_POST['alamat_pengirim']);
					}
					
					if(empty($_POST['alamat_penerima'])){
						$arrayError[]='<script type="text/javascript">alert("Alamat penerima tidak boleh kosong");</script>';
					}
					else{$alamat_penerima = trim($_POST['alamat_penerima']);
					}
					
					if(empty($_POST['kota_asal'])){
						$arrayError[]='<script type="text/javascript">alert("Kota asal tidak boleh kosong");</script> ';
					}
					else{$kota_asal = trim($_POST['kota_asal']);
					}
					
					if(empty($_POST['kota_tujuan'])){
						$arrayError[]='<script type="text/javascript">alert("Kota tujuan tidak boleh kosong");</script> ';
					}
					else{$kota_tujuan = trim($_POST['kota_tujuan']);
					}
					
					if(empty($_POST['jumlah'])){
						$arrayError[]='<script type="text/javascript">alert("Kota tujuan tidak boleh kosong");</script>';
					}
					else{$jumlah = trim($_POST['jumlah']);
					}
					
					if(empty($_POST['barang'])){
						$arrayError[]='<script type="text/javascript">alert("Jumlah barang tidak boleh kosong");</script>';
					}
					else{$barang = trim($_POST['barang']);
					}
					
					if(empty($_POST['berat'])){
						$arrayError[]='<script type="text/javascript">alert("Berat barang tidak boleh kosong");</script>';
					}
					else{$berat = trim($_POST['berat']);
					}
			
					if(empty($_POST['fee'])){
						$arrayError[]='<script type="text/javascript">alert("Berat barang tidak boleh kosong");</script> ';
					}
					else{$fee = trim($_POST['fee']);
					}
					
					if(empty($_POST['deskripsi'])){
						$deskripsi = trim($_POST['deskripsi']);
					}
					else{$deskripsi = trim($_POST['deskripsi']);
					}
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('koneksi.php');//koneksi ke database.
						//melakukan query
						$q = "INSERT INTO paket (id_paket,resi,pengirim,penerima,
						alamat_pengirim,alamat_penerima,
						kota_asal,kota_tujuan,tanggal_kirim,tanggal_terima,barang,deskripsi,
						berat,jumlah,fee,status)
						VALUES('','$resi','$pengirim','$penerima','$alamat_pengirim',
						'$alamat_penerima','$kota_asal','$kota_tujuan',NOW(),'','$barang',
						'$deskripsi','$berat','$jumlah','$fee','Proses')";
						$hasil = @mysqli_query ($conn, $q);//menjalankan query
						if($hasil){//jika berhasil
							echo'<script type="text/javascript">alert("Paket berhasil diproses");</script> ';
							header("Location:admin_datapaket.php");
						}
						else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Paket belum terkirim karena error sistem");</script> ';
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
								<form method="post" action="admin_formkirim.php">
									<div class="row uniform">
										<div class="6u 12u$(small)">
											<input class="form-control" type="text" name="pengirim" for="pengirim" id="pengirim" 
											value="<?php if (isset($_POST['pengirim'])) echo $_POST['pengirim']; ?>" placeholder="Pengirim" />
										</div>
										<div class="6u 12u$(small)">
											<input class="form-control" type="text" name="penerima" for="penerima" id="penerima" 
											value="<?php if (isset($_POST['penerima'])) echo $_POST['penerima']; ?>" placeholder="Penerima" />
										</div>
									</div>
									<div class="row uniform">
									<div class="6u 12u$(small)">
											<div class="select-wrapper">
												<select name="kota_asal" id="kota_asal">
													<option value="">- Kota Asal -</option>
													<option value="Bandung">Bandung<?php if (isset($_POST['kota_asal']) AND ($_POST['kota_asal'] == 'Bandung'))
												echo 'selected="selected"';?></option>
													<option value="Semarang">Semarang<?php if (isset($_POST['kota_asal']) AND ($_POST['kota_asal'] == 'Semarang'))
												echo 'selected="selected"';?></option>
													<option value="Jakarta">Jakarta<?php if (isset($_POST['kota_asal']) AND ($_POST['kota_asal'] == 'Jakarta'))
												echo 'selected="selected"';?></option>
													<option value="Surabaya">Surabaya<?php if (isset($_POST['kota_asal']) AND ($_POST['kota_asal'] == 'Surabaya'))
												echo 'selected="selected"';?></option>
												</select>
											</div>
									</div>
									<div class="6u 12u$(small)">
											<div class="select-wrapper">
												<select name="kota_tujuan" id="kota_tujuan">
													<option value="">- Kota Tujuan -</option>
													<option value="Bandung">Bandung<?php if (isset($_POST['kota_tujuan']) AND ($_POST['kota_tujuan'] == 'Bandung'))
												echo 'selected="selected"';?></option>
													<option value="Semarang">Semarang<?php if (isset($_POST['kota_tujuan']) AND ($_POST['kota_tujuan'] == 'Semarang'))
												echo 'selected="selected"';?></option>
													<option value="Jakarta">Jakarta<?php if (isset($_POST['kota_tujuan']) AND ($_POST['kota_tujuan'] == 'Jakarta'))
												echo 'selected="selected"';?></option>
													<option value="Surabaya">Surabaya<?php if (isset($_POST['kota_tujuan']) AND ($_POST['kota_tujuan'] == 'Surabaya'))
												echo 'selected="selected"';?></option>
												</select>
											</div>
									</div>
									</div>
									<div class="row uniform">
										<div class="6u 12u$(small)">
											<input class="form-control" type="text" name="alamat_pengirim" for="alamat_pengirim" id="alamat_pengirim" 
											value="<?php if (isset($_POST['alamat_pengirim'])) echo $_POST['alamat_pengirim']; ?>" placeholder="Alamat Pengirim" />
										</div>
										<div class="6u 12u$(small)">
											<input class="form-control" type="text" name="alamat_penerima" for="alamat_penerima" id="alamat_penerima" 
											value="<?php if (isset($_POST['alamat_penerima'])) echo $_POST['alamat_penerima']; ?>" placeholder="Alamat Penerima" />
										</div>
									</div>
									<div class="row uniform">
										<div class="6u 12u$(small)">
											<input class="form-control" type="text" name="barang" for="barang" id="barang" 
											value="<?php if (isset($_POST['barang'])) echo $_POST['barang']; ?>" placeholder="Barang" />
										</div>
										<div class="6u 12u$(small)">
											<input class="form-control" type="text" name="fee" for="fee" id="fee" 
											value="<?php if (isset($_POST['fee'])) echo $_POST['fee']; ?>" placeholder="Biaya Kirim" />
										</div>
									</div>
									<div class="row uniform">
										<div class="3u 12u$(small)">
											<input class="form-control" type="text" name="berat" for="berat" id="berat" 
											value="<?php if (isset($_POST['berat'])) echo $_POST['berat']; ?>" placeholder="Berat" />
										</div>
										<div class="3u 12u$(small)">
										<input class="form-control" type="text" name="jumlah" for="jumlah" id="jumlah" 
											value="<?php if (isset($_POST['jumlah'])) echo $_POST['jumlah']; ?>" placeholder="Qty" />
										</div>
										<div class="6u 12u$(small)">
											<input class="form-control" type="text" name="deskripsi" for="deskripsi" id="deskripsi"  
											value="<?php if (isset($_POST['deskripsi'])) echo $_POST['deskripsi']; ?>" placeholder="Deskripsi Barang" />
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