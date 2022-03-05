<?php
session_start ();
if(!isset($_SESSION['user'])){
  ?>
  <script type="text/javascript">
    alert('login dulu');window.location='../login.php';
  </script>
  <?php
}else{
include "header.php";
?>
<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="p-5">
            <?php
              $col = 4;
              $koneksi = mysqli_connect("localhost","root","","sekolah");
             $qry = mysqli_query($koneksi, "SELECT * FROM galeri ");
             
             echo "<table align='center' cellpadding='20'><tr>"; 
             $cnt = 0;
             while ($w = mysqli_fetch_array($qry)) {
             if ($cnt >= $col) {
             echo "</tr><tr>";
             $cnt = 0;
             }
             $cnt++;
             echo "<td align=center valign=top><br />
             <a id='galeri' href='../guru/siswa/$w[foto]' width='200' height='200' title='$w[nama_foto]'>
             <img alt='galeri' src='../guru/siswa/$w[foto]' width='189' height='200' /></a><br />
             <b>$w[nama_foto]</b><br>";
             }
             echo "</tr></table>";
            ?>
             
          </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php
include "footer.php";
}
?>
<?php
session_start ();
if(!isset($_SESSION['user'])){
  ?>
  <script type="text/javascript">
    alert('login dulu');window.location='../login.php';
  </script>
  <?php
}else{
include "header.php";
?>
<style type="text/css">
   .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="p-5">
            <?php
              $col = 4;
              $koneksi = mysqli_connect("localhost","root","","sekolah");
             $qry = mysqli_query($koneksi, "SELECT * FROM galeri ");
             
             echo "<table align='center' cellpadding='20'><tr>"; 
             $cnt = 0;
             while ($w = mysqli_fetch_array($qry)) {
             if ($cnt >= $col) {
             echo "</tr><tr>";
             $cnt = 0;
             }
             $cnt++;
             echo "<td align=center valign=top><br />
             <a id='galeri' href='../guru/siswa/$w[foto]' width='200' height='200' title='$w[nama_foto]'>
             <img alt='galeri' src='../guru/siswa/$w[foto]' width='189' height='200' /></a><br />
             <b>$w[nama_foto]</b><br>";
             }
             echo "</tr></table>";
            ?>
             
          </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php
include "footer.php";
}
?>
