<?php
 session_start();

 include 'koneksi.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Pengaduan</title>

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- Google Fonts Poppins CDN -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

  </head>
  <body class="bg-primary" style="font-family: 'Poppins', sans-serif;">

    <div class="container card mt-5 ps-5 pe-5 pb-5 mb-5">

      <!-- Judul Halaman -->
      <h1 class="text-center m-5 text-primary">Pengaduan Kerusakan Kost-Kostan</h1>
      <h4 class="text-center m-5 text-primary">Selamat datang, silahkan pantau perkembangan aduan anda disini!</h1>

      <div class="row">
        <table class="table table-striped table-hover">

          <thead><tr>
              <!-- Tombol Tambah Pengaduan -->
              <td>
              <a class="btn btn-success mb-3 border-0" href="tambah.php">
              <i class="bi bi-pencil-square"></i> Tulis Aduan</a>
              </td>

              <!-- Kosongkan -->
              <td></td>
              <td></td>
              <td></td>
              <td></td>

              <!-- Tombol Keluar -->
              <td><a class="btn btn-info mb-3 border-0" href="login.php"> <i class="bi bi-box-arrow-right"></i> Login sebagai Admin</a></td>
            </tr>

            <!-- Baris Judul Kolom Tabel -->
            <tr>
            <th>No</th>
            <th>Tanggal Pengaduan</th>
            <th>No. Kamar</th> <th>Laporan</th>
            <th>Bukti</th>
            <th>Status</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
              // Jalankan Query untuk menampilkan semua data diurutkan berdasarkan ID
              $query = "SELECT * FROM laporan ORDER BY id ASC";
              $result = mysqli_query($koneksi, $query);

              // Buat perulangan untuk element tabel dari DATA LAPORAN
              $no = 1; //variabel untuk membuat nomor urut
      
              // Hasil query akan disimpan dalam variabel $data dalam bentuk array
              // Kemudian dicetak dengan perulangan while

              while($row = mysqli_fetch_assoc($result)) {
              ?>
            <tr>
              <!-- Nomor Pengaduan -->
              <td><?php echo $no; ?></td>
              <!-- Tanggal Pengaduan -->
              <td><?php echo $row['tgl']; ?>
              <!-- Tombol Aksi -->
              <br><a class="btn btn-danger mt-3" href="hapus.php?id=<?php echo $row['id']; ?>">
                  <i class="bi bi-trash"></i></a></td>
              <!-- Nomor Kamar -->
              <td><?php echo $row['no_kamar']; ?></td>
              <!-- Laporan Pengaduan -->
              <td><?php echo $row['pengaduan']; ?></td>
              <!-- Foto Bukti -->
              <td><img class="rounded m-1" src="gambar/<?php echo $row['bukti']; ?>" width=100></td>
              <!-- Status -->
              <td><?php echo $row['stat']; ?> <br>
              <label>Keterangan:</label>
              <?php echo $row['keterangan']; ?></td>

            </tr>
         
            <?php
              // Agar Nomor Pengaduan terus bertambah 1
              $no++; } ?>

          </tbody></table></div></div>
  </body>
</html>
