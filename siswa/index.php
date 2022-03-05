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
      <center> <h2>UPTD PAUD Holistik Integratif Negeri 1 Alor kecil</h2> </center>
      <h4>Visi :</h4>
   <p class="left">Terwujudnya UPTD PAUD Holistik Integratif Negeri 1 Alor kecil untuk mempersiapkan generasi beriman,berilmu,berkarakter dan berbudaya<p>
   
   <h3>Misi</h3>
   <p class="left">* Menanamkan keyakinan Terhadap Tuhan Yang Maha Esa <br>
    *Mengembangkan dan Menerapkan pembelajaran aktif,kreatif,inovatif,efektif dan menyenangkan <br>
*Mengembangkan IPTEK sesuai dengan karakter serta potensi yang dimiliki <br>
* Menanamkan disiplin,etika,moral, dan nilai-nilai dasar kemasyarakatan<br>
* Mengembangkan kemampuan untuk mengenal lingkungan melalui apresiasi seni/keanekaragaman budaya dan sosial<p>
   
   <h3>Tujuan</h3>
   <p class="left">* Meningkatkan bakat dan minat anak UPTD PAUD Holistik Integratif Negeri 1 Alor Kecil <br>
* Menjadikan anak yang mampu berpikir,berkomunikasi,bertindak produktif dan kreatif melalui bahasa,musik dan karya<br>
* Menciptakan iklim belajar yang kondusif bagi penyelenggara pendidikan fan pengasuh anak<br>
* Menjalin kerja sama dengan pihak lain dalam rangka meningkatkan pendidikan di UPTD PAUD Holistik dan integratif Negeri 1 Alor Kecil<p>
   
   <h3>Alamat</h3>
   <p class="left">KALABAHI - KOKAR, Alor Kecil, Kec. Alor Barat Laut, Kab. Alor Prov. Nusa Tenggara Timur.<p>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php
include "footer.php";
}
?>
