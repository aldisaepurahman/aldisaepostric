<?php
include ("connection.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tgl_batas = $_POST['pinjam'];
    $tgl_pinjam = date("Y-m-d");
    
    $sqlSelect = "SELECT * FROM peminjaman WHERE id_buku = '$id'
    AND status_pinjam = '0'";
    
    $resultSelect = mysqli_query($conn, $sqlSelect);
    if (mysqli_num_rows($resultSelect) > 0) {
        echo "<script>
        alert('Buku Ini belum dikembalikan!');
        document.location=('../index.php');
        </script>";
    }
    else{
        $sql = "INSERT INTO peminjaman (id_buku, pinjam, balik, status_pinjam)
        VALUES ('$id', '$tgl_pinjam', '$tgl_batas', '0')";
    
    
        if (mysqli_query($conn, $sql) > 0) {
            echo "<script>
            alert('Peminjaman Berhasil!');
            document.location=('../datapinjam.php');
            </script>";
        }
        else{
            die("Error!". mysqli_error($conn));
        }
    }
    
}else{
    die('Access Denied!');
}
?>