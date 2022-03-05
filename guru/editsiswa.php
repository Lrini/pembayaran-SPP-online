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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
        <?php
                $koneksi = new mysqli("localhost", "root", "", "sekolah");
                $id = $_GET['nis'];
                $data = mysqli_query($koneksi,"select * from siswa where nis='$id'");
                while($d = mysqli_fetch_array($data)){
            ?>
        <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $d ['nis'] ?> "placeholder="NIS">
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $d ['nama'] ?>" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $d ['kelas'] ?>" placeholder="Kelas">
                  </div>
                  <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" class="form-control" id="ajaran" name="ajaran" value="<?php echo $d ['th_ajaran'] ?>" placeholder="Tahun Ajaran">
                  </div>
                  <div class="form-group">
                    <label>Biaya</label>
                    <input type="text" class="form-control" id="biaya" name="biaya" value="<?php echo $d ['biaya'] ?>" placeholder="Biaya">
                  </div>
                  <div class="form-group">
                    <label>Foto</label>
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
                    if(editsiswa ($_POST) > 0){
                        echo " 
                             <script>
                                document.location.href = 'siswa.php?r=sukses';
                            </script>";
                            }else{
                                echo " 
                                    <script>
                                        document.location.href = 'siswa.php?r=gagal';
                                     </script>";
                                    
                                }
                    }
                }
	        ?>
        </div>
              </form>
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
