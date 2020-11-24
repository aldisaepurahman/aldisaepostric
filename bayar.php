<?php
include ("assets/connection.php");

$sql = "SELECT * FROM peminjaman JOIN buku ON peminjaman.id_buku = buku.id WHERE
peminjaman.status_pinjam='0' AND
DATEDIFF(peminjaman.balik, NOW()) < 0";
$result = mysqli_query($conn, $sql);
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
    <h1 class="text-center mb-3">Data Buku Yang Melewati Batas Peminjaman</h1>
    <p class="pt-5">Hitungan Denda Yaitu dari lama waktu terlambat x Rp.1000</p>
    <div class="col-md-12">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul Buku</th>
      <th scope="col">Lama Waktu Terlambat</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $i = 1;
        while ($data = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $data['judul']; ?></td>
      <td>
        <?php
        $tglbalik = new DateTime($data['balik']);
        $now = new DateTime();
        $sisa = $tglbalik->diff($now)->format("%a");
        echo $sisa. " Hari";
        ?>
      </td>
      <td>
      <form action="assets/kembali.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="selisih" value="<?php echo $sisa; ?>">
        <input type="hidden" name="posisi" value="2">
        <div class="ml-auto">
            <button type="submit" class="btn btn-warning" name="kembali">Kembalikan</button>
        </div>
      </form>
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>
    </div>
</div>
</body>
</html>