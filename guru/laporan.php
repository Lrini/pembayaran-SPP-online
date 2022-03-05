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
include "function.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan siswa</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
          <form action="" method="get" enctype="multipart/form-data">
            <div class="form-group">
              <label>Cari kelas:</label>
                <input type="text" class="form-control" name="cari">
            </div>
            <input type="submit" class="btn-primary" value="Cari">
          </form>
          <?php 
              if(isset($_GET['cari'])){
                  $cari = $_GET['cari'];
                  echo '<br><a href ="cetaklaporan1.php?cari='.$cari.'"><i class="btn btn-primary btn-sm">Cetak</i></a>';
              }
          ?>
        </div>
        <?php 
          $koneksi = mysqli_connect("localhost","root","","sekolah");
           if(isset($_GET['cari'])){
              $cari = $_GET['cari'];
              $data = mysqli_query($koneksi,"select * from siswa where nis like '%".$cari."%'"); 
      ?>
        <table id="dataTables" class="table table-bordered table-striped" >
                              <thead>
                                  <tr>
                                      <th>NO </th>
                                      <th>NIS</th>
                                      <th>Nama</th>
                                      <th>Kelas</th>
                                      <th>Tahun Ajaran</th>
                                     
                                     
                                  </tr>
                              </thead>
                          
                          <tbody>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "sekolah");
                            if ($conn->connect_errno) {
                              echo "Failed to connect to MySQL: " . $conn->connect_error;
                            }
                            
                            $no = 1;
                            $res = $conn->query("select * from siswa where kelas like '%".$cari."%'");
                            while($row = $res->fetch_assoc()){
                              echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['nis'].'</td>
                                <td>'.$row['nama'].'</td>
                                <td>'.$row['kelas'].'</td>
                                <td>'.$row['th_ajaran'].'</td>
                               
                                
                              </tr>
                              ';
                              $no++;
                            }
                            ?>
                          </tbody>
                        </table>
      <?php
           }
      ?>
          </div>
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
