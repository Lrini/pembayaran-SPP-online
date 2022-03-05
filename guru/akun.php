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
                        <label>Username</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" id="pass" name="pass" placeholder="Passwprd">
                      </div>
                      <div class="form-group">
                        <label>Siswa</label>
                          <select name= "nis" id="nis" class="form-control" type="text">
                            <option>Siswa</option>
                                                                
                                    <?php
                                       $koneksi= mysqli_connect("localhost","root","","sekolah");
                                        $data = mysqli_query($koneksi,"SELECT * FROM siswa ");
                                        while ($sql = mysqli_fetch_array($data)) 
                                            { ?>
                                                <option value='<?php echo $sql['nis'] ?>'><?php echo $sql ['nis'] ?> | <?php echo $sql['nama'] ?></option>
                                            <?php } ?>
                                </select>
                      </div>
                      <div class="form-group">
                        <label>Siswa</label>
                          <select name= "nip" id="nip" class="form-control" type="text">
                            <option>Guru</option>
                                                                
                                    <?php
                                       $koneksi= mysqli_connect("localhost","root","","sekolah");
                                        $data = mysqli_query($koneksi,"SELECT * FROM guru ");
                                        while ($sql = mysqli_fetch_array($data)) 
                                            { ?>
                                                <option value='<?php echo $sql['nip'] ?>'><?php echo $sql ['nip'] ?> | <?php echo $sql['nama_guru'] ?></option>
                                            <?php } ?>
                                </select>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan login</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div  class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="ket" id="ket1" value="guru"> Guru
                            </label>
                        </div>
                        <div  class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="ket" id ="ket2" value="siswa"> Siswa
                            </label>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                <div class="card-footer">
                      <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Submit</button>
                </div>
                <?php 
                    if(isset($_POST['simpan'])){
                        if(tambahakun ($_POST) > 0){
                            echo " 
                                <script>
                                    document.location.href = 'akun.php?r=sukses';
                                </script>";
                                }else{
                                  
                                    echo " 
                                        <script>
                                            document.location.href = 'akun.php?r=gagal';
                                        </script>";
                                    }
                        }
              ?>

                <table id="dataTables" class="table table-bordered table-striped" >
                              <thead>
                                  <tr>
                                      <th>NO.</th>
                                      <th>Username</th>
                                      <th>Password</th>
                                      <th>Nama Siswa</th>
                                      <th>Nama Guru</th>
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
                            $data = "select login.id,siswa.nama, guru.nama_guru,login.ket, login.user,login.pass FROM (login LEFT JOIN siswa ON login.nim = siswa.nis) LEFT JOIN guru ON guru.nip = login.nip";
                            $res = $conn->query($data);
                            while($row = $res->fetch_assoc()){
                              echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['user'].'</td>
                                <td>'.$row['pass'].'</td>
                                <td>'.$row['nama'].'</td>
                                <td>'.$row['nama_guru'].'</td>
                                <td>
                                 <a href ="hapusakun.php?id='.$row['id'].'"><i class="btn btn-block btn-danger btn-sm">hapus</i></a>
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
