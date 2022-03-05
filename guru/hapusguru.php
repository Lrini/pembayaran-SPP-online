<?php
 include "function.php";
 $id = $_GET ["nip"];
if(hapusguru ($id) > 0){
				 echo " 
			           <script>
			                document.location.href = 'guru.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = 'guru.php?r=gagal';
			            </script>";
			}
 ?>