<?php
    $connect = mysqli_connect("localhost","root","","sekolah");
    $sql = mysqli_query($connect, "SELECT MAX(no_bayar) AS last FROM spp");
    $null = mysqli_query($connect, "SELECT * FROM spp WHERE id = '$_GET[id]'");
    if(isset($null)){
        $sqlmax = mysqli_fetch_array($sql);
        $sql = mysqli_fetch_array($null);
        
        //Mengambil jatuh tempo lalu di convert ke ymd
        $tempo = $sql['jth_tempo'];
        $day = date('ymd', strtotime($tempo));
        
        #Mengambil value no bayar terakhir lalu diambil 2 string terakhir
        $lastnobayar = substr($sqlmax['last'], -2);
        $nextnourut =  (int)$lastnobayar + 1;


        //Value yang diperlukan
        $nis = $sql['nis'];
        $keterangan = 'LUNAS';
        $tgl_bayar = date('Y-m-d');
        $nobayar = $day.$nis.sprintf("%02s",$nextnourut);
        // echo $nobayar;

        $editBayar = mysqli_query($connect, "UPDATE spp SET no_bayar='$nobayar', tgl_bayar='$tgl_bayar', keterangan='$keterangan' WHERE id = '$_GET[id]'");

        header('location:bayar.php?nis='.$_GET['nis']);
    }
?>



<?php include "footer.php" ?>