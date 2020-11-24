<?php
include ("connection.php");

if (isset($_POST['kembali'])) {
    $id = $_POST['id'];
    $posisi = $_POST['posisi'];
    $selisih = $_POST['selisih']*1000;
    $sql = "UPDATE peminjaman SET status_pinjam = '1', denda ='$selisih'
        WHERE id='$id'";
    
    if (mysqli_query($conn, $sql) > 0) {
        echo "<script>
        alert('Pengembalian Berhasil!');
        </script>";
        if ($posisi == 1) {
            echo "<script>
            document.location=('../datapinjam.php');
            </script>";
        }
        else if($posisi == 2){
            echo "<script>
            document.location=('../bayar.php');
            </script>";
        }
    }
    else{
        die("Error!". mysqli_error($conn));
    }
}else{
    die('Access Denied!');
}
?>