<?php 
require_once "../koneksi.php";
require_once "../functions.php";
check_login();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Perpustakaan</title>
  <?php include "../contents/headscript.php"; ?>
  <style>
    body{
      background: #EEE8AA;
    }

  </style>
</head>
<body>
  <?php include "../contents/navbar.php"; ?>

  <main>
    <div class="container">
      <div class="col-sm-12">
       <h2 class="h2 mb-4">Data Buku Perpustakaan</h2>
       <a href="form_buku.php" class="btn btn-primary mb-2">Tambah Buku</a>
       <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Buku</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Jenis Buku</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          require_once "../koneksi.php";
          $conn = buka_koneksi();
          $query = "SELECT b.kd_buku,b.judul_buku,b.pengarang,b.jenis_buku,p.penerbit FROM tb_buku b JOIN tb_penerbit p ON b.kd_penerbit = p.kode";
          $hasil = mysqli_query($conn, $query);
          $i =1;
          while($row = mysqli_fetch_assoc($hasil)){
            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>$row[kd_buku]</td>";
            echo "<td>$row[judul_buku]</td>";
            echo "<td>$row[pengarang]</td>";
            echo "<td>$row[jenis_buku]</td>";
            echo "<td>$row[penerbit]</td>";
            echo "<td>
            <a class = 'btn btn-success' href='update_buku.php?kode_buku=$row[kd_buku]'>Ubah</a>
            <a class = 'btn btn-danger' href='delete_buku.php?kode_buku=$row[kd_buku]'>Hapus</a>
            </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>


  <?php include "../contents/footer.php"; ?>

</body>
</html>