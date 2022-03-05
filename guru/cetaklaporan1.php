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
	<title>Data Sekolah</title>
	
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
	<h3><b><br/>LAPORAN SISWA</b></h3>
	<br/>

	<?php 
    $koneksi =  mysqli_connect("localhost","root","","sekolah");
	$siswa = $koneksi->query("SELECT * FROM siswa WHERE nis='$_GET[cari]' ");
	$sw = mysqli_fetch_assoc($siswa);

	 ?>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
        <th>NIS</th>
		<th>NAMA</th>
		<th>KELAS</th>
        <th>TAHUN AJARAN</th>
	</tr>
	<?php 
    $id = $_GET['cari'];
    $data = "SELECT * from siswa where kelas='$_GET[cari]'";
	$pembayaran = $koneksi -> query($data);
	$i=1;
	while($dta=mysqli_fetch_array($pembayaran)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['nis'] ?></td>
		<td align=""><?= $dta['nama'] ?></td>
		<td align=""><?= $dta['kelas'] ?></td>
		<td align="right"><?= $dta['th_ajaran'] ?></td>
    </tr>
	<?php $i++; ?>
	

<?php endwhile; ?>

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Kupang , <?= date('d/m/y') ?> <br/>
				kepala Sekolah,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
    <a  href="laporan.php"><button>Kembali</button></a>
</body>
</html>


<?php 
}
?>