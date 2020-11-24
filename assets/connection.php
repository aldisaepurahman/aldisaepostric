<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "pinjam_buku";
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Could not connect: '. mysqli_error($conn));
}
?>