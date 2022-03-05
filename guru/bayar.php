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
            <h1 class="m-0">Data Pembayaran</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php if(isset($_GET['r'])): ?>
                    <?php
                        $r = $_GET['r'];
                        if($r=='sukses'){
                            $class='success';
                        }else if($r=='updated'){
                            $class='info';   
                        }else if($r=='gagal'){
                            $class='danger';   
                        }else if($r=='added an account'){
                            $class='success';   
                        }else{
                            $class='hide';
                        }
                    ?>
                   <div role="alert" class="alert alert-<?php  echo $class?> ">
                        
                        <strong> <?php echo $r; ?>!</strong>    
                    </div>
                <?php endif; ?>
      <div class="card">
        <div class="card-body">
        <form action="" method="get" enctype="multipart/form-data">
        <div class="form-group">
        <label>Cari :</label>
              <input type="text" class="form-control" name="cari">
        </div>
        <input type="submit" class="btn-primary" value="Cari">
          </form>
          <?php 
              if(isset($_GET['cari'])){
                  $cari = $_GET['cari'];
                  //echo "<b>Hasil pencarian : ".$cari."</b>";
              }
          ?>
        </div>
        <div class ="card-body">
        <?php 
          $koneksi = mysqli_connect("localhost","root","","sekolah");
           if(isset($_GET['cari'])){
              $cari = $_GET['cari'];
              $data = mysqli_query($koneksi,"select * from siswa where nis like '%".$cari."%'"); 
          while($d = mysqli_fetch_array($data)){
      ?>
      <div class="card">
      <div class="card-body">
           <div class="form-group">
              <label> Nama siswa : </label>
              <label><?php echo $d['nama'];?></label>
          </div>
          <div class="form-group">
            <label> Kelas :  </label>
            <label><?php echo $d['kelas'];?></label>
          </div>
          <div class="form-group">
            <label> Tahun Ajaran :  </label>
            <label><?php echo $d['th_ajaran'];?></label>
          </div>
          <div class="form-group">
            <label> Biaya :  </label>
            <label><?php echo $d['biaya'];?></label>
          </div>
          </div>
          <table id="dataTables" class="table table-bordered table-striped" >
                              <thead>
                                  <tr>
                                      <th>NO.</th>
                                      <th>NIS</th>
                                      <th>Nama</th>
                                      <th>Bulan Pembayaran</th>
                                      <th>Jatuh Tempo</th>
                                      <th>Tanggal Bayar</th>
                                      <th>No bayar</th>
                                      <th>Jumlah</th>
                                      <th>Keterangan</th>
                                      <th>action</th>
                                  </tr>
                              </thead>
                          
                          <tbody>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "sekolah");
                            if ($conn->connect_errno) {
                              echo "Failed to connect to MySQL: " . $conn->connect_error;
                            }
                            $no = 1;
                            $data1 = "select spp.id,spp.nis, siswa.nama, spp.bulan,spp.jth_tempo,spp.tgl_bayar,spp.no_bayar,spp.jmlh,spp.keterangan from siswa inner join spp on siswa.nis = spp.nis where siswa.nis like '%".$cari."%'";
                            $res = $conn->query($data1);
                            while($row = $res->fetch_assoc()){
                              echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['nis'].'</td>
                                <td>'.$row['nama'].'</td>
                                <td>'.$row['bulan'].'</td>
                                <td>'.$row['jth_tempo'].'</td>
                                <td>'.$row['tgl_bayar'].'</td>
                                <td>'.$row['no_bayar'].'</td>
                                <td>'.$row['jmlh'].'</td>
                                <td>'.$row['keterangan'].'</td>
                                <td>
                                 <a href ="prosesbayar.php?nis='.$row['nis'].'&id='.$row['id'].'"><i class="btn  btn-primary ">Bayar</i></a>
                                 <a href ="cetakbayar.php?nis='.$row['nis'].'&id='.$row['id'].'"><i class="btn btn-danger ">Cetak</i></a>
                                </td>
                              </tr>
                              ';
                              $no++;
                            }
                            ?>
                          </tbody>
                        </table>
      <?php 
          } 
        }
      ?>
        </div>
      </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include "footer.php";
}
?>

