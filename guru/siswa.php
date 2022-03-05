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
            <h1 class="m-0">Data Siswa</h1>
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
        <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS">
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa">
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                  </div>
                  <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" class="form-control" id="th_ajaran" name="th_ajaran" placeholder="Tahun Ajaran">
                  </div>
                  <div class="form-group">
                    <label>Biaya</label>
                    <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya">
                  </div>
                  <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="foto siswa">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
            <div class="card-footer">
                  <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Submit</button>
            </div>
            <?php 
                 if(isset($_POST['simpan'])){
                    if(tambahsiswa ($_POST) > 0){
                        echo " 
                             <script>
                                document.location.href = 'siswa.php?r=sukses';
                            </script>";
                              $connect =  mysqli_connect("localhost","root","","sekolah");
                              $tempo = date('Y-m-d');
                               $ds = mysqli_fetch_array(mysqli_query($connect, "SELECT nis FROM siswa ORDER BY nis DESC LIMIT 1"));
                                $id = $ds['nis'];
                                $uang = $_POST['biaya'];
                                $startdate3=strtotime("January 2022");
                                // echo $startdateTahunAjaran;
                                $startdate2 = strtotime("<?php $tempo;?>");
                                for($i=0; $i < 12; $i++) {
                                    $bulanSpp = date('F Y', strtotime("+$i month", $startdate3));
                                    $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($tempo)));
                                  
                                    $toSpp = mysqli_query($connect, "INSERT INTO spp(nis,bulan,jth_tempo,jmlh) VALUES('$id','$bulanSpp','$jatuhtempo','$uang')");
                                }
                            }else{
                              
                                echo " 
                                    <script>
                                        document.location.href = 'siswa.php?r=gagal';
                                     </script>";
                                }
                    }
	        ?>
        </div>
              </form>
        </div>
        <div class="card-body">
                      <table id="dataTables" class="table table-bordered table-striped" >
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>NIS</th>
                                      <th>Nama</th>
                                      <th>Kelas</th>
                                      <th>Tahun Ajaran</th>
                                      <th>Biaya</th>
                                      <th>Foto</th>
                                      <th>Pilihan</th>
                                  </tr>
                              </thead>
                          
                          <tbody>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "sekolah");
                            if ($conn->connect_errno) {
                              echo "Failed to connect to MySQL: " . $conn->connect_error;
                            }
                            
                            $no = 1;
                            $res = $conn->query("select * from siswa");
                            while($row = $res->fetch_assoc()){
                              echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['nis'].'</td>
                                <td>'.$row['nama'].'</td>
                                <td>'.$row['kelas'].'</td>
                                <td>'.$row['th_ajaran'].'</td>
                                <td>'.$row['biaya'].'</td>
                                <td><img src="siswa/'.$row['foto'].'" width="70" height="90"></td>
                                <td>
                                 <a href ="editsiswa.php?nis='.$row['nis'].'"><i class="btn  btn-primary">edit</i></a>
                                 <a href ="hapussiswa.php?nis='.$row['nis'].'"><i class="btn  btn-danger">hapus</i></a>
                                </td>
                              </tr>
                              ';
                              $no++;
                            }
                            ?>
                          </tbody>
                        </table>
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

