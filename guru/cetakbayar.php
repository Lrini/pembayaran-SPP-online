<?php
session_start ();
if(!isset($_SESSION['user'])){
  ?>
  <script type="text/javascript">
    alert('login dulu');window.location='../login.php';
  </script>
  <?php
}else{
include "function.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slip Pembayaran SPP</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h3><b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
	<br/>
	<hr/>
	<?php 
    $koneksi =  mysqli_connect("localhost","root","","sekolah");
	$siswa = $koneksi->query("SELECT * FROM siswa WHERE nis='$_GET[nis]' ");
	$sw = mysqli_fetch_assoc($siswa);

	 ?>
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td> <?= $sw['nama'] ?></td>
		</tr>
		<tr>
			<td>Nisn </td>
			<td>:</td>
			<td> <?= $sw['nis'] ?></td>
		</tr>
		<tr>
			<td>Kelas </td>
			<td>:</td>
			<td> <?= $sw['kelas'] ?></td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
        <th>NIS</th>
		<th>NO. BAYAR</th>
		<th>PEMBAYARAN BULAN</th>
        <th>TANGGAL PEMBAYARAN</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
    $id = $_GET['id'];
    $data = "SELECT siswa.nis,spp.no_bayar,spp.bulan,spp.tgl_bayar,spp.jmlh,spp.keterangan FROM siswa INNER JOIN spp ON siswa.nis = spp.nis where spp.id='$_GET[id]'";
	$pembayaran = $koneksi -> query($data);
	$i=1;
	while($dta=mysqli_fetch_array($pembayaran)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['nis'] ?></td>
		<td align=""><?= $dta['no_bayar'] ?></td>
		<td align=""><?= $dta['bulan'] ?></td>
		<td align="right"><?= $dta['tgl_bayar'] ?></td>
		<td align="center"><?= $dta['jmlh'] ?></td>
        <td align="center"><?= $dta['keterangan'] ?></td>
    </tr>
	<?php $i++; ?>
	

<?php endwhile; ?>

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Bandung , <?= date('d/m/y') ?> <br/>
				Operator,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
    <a  href="bayar.php"><button>Kembali</button></a>
</body>
</html>


<?php 
}
?>