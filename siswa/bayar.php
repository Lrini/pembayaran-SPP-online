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
        <div class="card">
          <div class="card-body">
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
                                  </tr>
                              </thead>
                          
                          <tbody>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "sekolah");
                            if ($conn->connect_errno) {
                              echo "Failed to connect to MySQL: " . $conn->connect_error;
                            }
                            $no = 1;
                            $data1 = "select spp.id,spp.nis, siswa.nama, spp.bulan,spp.jth_tempo,spp.tgl_bayar,spp.no_bayar,spp.jmlh,spp.keterangan from siswa inner join spp on siswa.nis = spp.nis where siswa.nis like '%".$_SESSION['nim']."%'";
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
                              </tr>
                              ';
                              $no++;
                            }
                            ?>
                          </tbody>
                        </table>
                        
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
