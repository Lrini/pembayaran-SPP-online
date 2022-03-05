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
            <h1 class="m-0"></h1>
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
        <div class ="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Keterangan Foto</label>
                        <input type="text" class="form-control" id="nama_foto" name="nama_foto" placeholder="Keterangan foto">
                      </div>
                      <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="foto">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                <div class="card-footer">
                      <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Submit</button>
                </div>
                <?php 
                    if(isset($_POST['simpan'])){
                        if(tambahgaleri ($_POST) > 0){
                            echo " 
                                <script>
                                    document.location.href = 'galeri.php?r=sukses';
                                </script>";
                                }else{
                                  
                                    echo " 
                                        <script>
                                            document.location.href = 'galeri.php?r=gagal';
                                        </script>";
                                    }
                        }
              ?>

                <table id="dataTables" class="table table-bordered table-striped" >
                              <thead>
                                  <tr>
                                      <th>NO.</th>
                                      <th>Keterangan Foto</th>
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
                            $res = $conn->query("select * from galeri");
                            while($row = $res->fetch_assoc()){
                              echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['nama_foto'].'</td>
                                <td><img src="siswa/'.$row['foto'].'" width="70" height="90"></td>
                                <td>
                                 <a href ="hapusgaleri.php?id='.$row['id'].'"><i class="btn btn-block btn-danger btn-sm">hapus</i></a>
                                </td>
                              </tr>
                              ';
                              $no++;
                            }
                            ?>
                          </tbody>
                        </table>
            </div>
        </form>
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
