<?php
include ("assets/connection.php");

if (!isset($_GET['id'])) {
    echo "<script>
        alert('Data Gagal Didapat!');
        document.location=('index.php');
        </script>";
}

$id = $_GET['id'];

$sql = "SELECT * FROM buku WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) != 1) {
    die("Terjadi Konflik Pada Pengambilan Data!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Peminjaman <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="datapinjam.php">Pengembalian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bayar.php">Pembayaran</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
    <h1 class="text-center mb-3">Detail Buku</h1>
    <div class="col-md-12">
    <img src="assets/<?php echo $data['cover']; ?>" class="img-control covers mb-3">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" colspan="2">Detail Buku</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row">Judul</th>
        <td><?php echo $data['judul']; ?></td>
    </tr>
    <tr>
        <th scope="row">Genre</th>
        <td><?php echo $data['genre']; ?></td>
    </tr>
    <tr>
        <th scope="row">Penulis</th>
        <td><?php echo $data['penulis']; ?></td>
    </tr>
    <tr>
        <th scope="row">Deskripsi</th>
        <td><?php echo $data['deskripsi']; ?></td>
    </tr>
  </tbody>
</table>
<h1 class="text-center mt-3">Pinjam Buku</h1>
<form action="assets/pinjam.php" method="post">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <div class="form-group">
        <label for="tanggalpinjam">Pinjam Hingga</label>
        <input type="date" class="form-control" name="pinjam">
    </div>
    <div class="ml-auto">
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
    </div>
</form>
    </div>
</div>
</body>
</html>