<?php
 include "function.php";
 $id = $_GET ["id"];
if(hapusgaleri ($id) > 0){
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
 ?>