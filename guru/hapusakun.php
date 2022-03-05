<?php
 include "function.php";
 $id = $_GET ["id"];
if(hapusakun ($id) > 0){
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
 ?>