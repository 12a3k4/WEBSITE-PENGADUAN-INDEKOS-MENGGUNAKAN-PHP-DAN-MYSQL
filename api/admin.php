<?php

  //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  include('koneksi.php');

  // Memulai Session
  session_start();

  if(isset($_SESSION['username'])){

      $username = $_SESSION['username'];

  } else{

      header("location:login.php");
      
  }

  // Mengecek apakah di url ada nilai GET ID
  if (isset($_GET['id'])) {

    // Ambil nilai ID dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // Menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM laporan WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    // Mengambil data dari database
    $data = mysqli_fetch_assoc($result);
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Admin Daftar Pengaduan</title>

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
      <h2 class="text-center m-5 text-primary"> Admin Data Pengaduan</h2>

      <div class="row">
        <table class="table table-striped table-hover">

        <thead><tr>

      <!-- Hitung Laporan Diterima -->
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary mb-4">
            <div class="card-body">
            Laporan Masuk
            <?php
              $query = "SELECT * FROM laporan";
              $result = mysqli_query($koneksi, $query);

               if ($result) {
                $category_total = mysqli_num_rows($result);

                if ($category_total > 0) {
                  echo '<h4 class="mb-0"> ' . $category_total . '</h4>';
                } else {
                  echo '<h4 class="mb-0"> No Data </h4>';
                }
              } else {
                echo '<h4 class="mb-0"> Error in query </h4>';
              }
            ?>
            </div></div></div></div>
        
        <!-- Hitung Belum Diproses -->
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger mb-4">
            <div class="card-body">
            Belum Diproses
            <?php
              $query = "SELECT * FROM laporan WHERE stat='Laporan Diterima'";
              $result = mysqli_query($koneksi, $query);

               if ($result) {
                $category_total = mysqli_num_rows($result);

                if ($category_total > 0) {
                  echo '<h4 class="mb-0"> ' . $category_total . '</h4>';
                } else {
                  echo '<h4 class="mb-0"> No Data </h4>';
                }
              } else {
                echo '<h4 class="mb-0"> Error in query </h4>';
              }
            ?>
            </div></div></div></div>

        <!-- Hitung Sedang Diproses -->
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning mb-4">
              <div class="card-body">
              Sedang Diproses
              <?php
                $query = "SELECT * FROM laporan WHERE stat='Sedang Diproses'";
                $result = mysqli_query($koneksi, $query);

                if ($result) {
                  $category_total = mysqli_num_rows($result);

                  if ($category_total > 0) {
                    echo '<h4 class="mb-0"> ' . $category_total . '</h4>';
                  } else {
                    echo '<h4 class="mb-0"> No Data </h4>';
                  }
                } else {
                  echo '<h4 class="mb-0"> Error in query </h4>';
                }
              ?>
              </div></div></div></div>
        
        <!-- Hitung Selesai -->
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success mb-4">
              <div class="card-body">
              SELESAI
              <?php
                $query = "SELECT * FROM laporan WHERE stat='SELESAI'";
                $result = mysqli_query($koneksi, $query);

                if ($result) {
                  $category_total = mysqli_num_rows($result);

                  if ($category_total > 0) {
                    echo '<h4 class="mb-0"> ' . $category_total . '</h4>';
                  } else {
                    echo '<h4 class="mb-0"> No Data </h4>';
                  }
                } else {
                  echo '<h4 class="mb-0"> Error in query </h4>';
                }
              ?>
              </div></div></div></div>
        
      </tr></thead></table></div>

      <div class="row">
        <table class="table table-striped table-hover">

          <thead>

          <tr>
              <!-- Kosongkan -->
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>

              <!-- Tombol Keluar -->
              <td>
                <a class="btn btn-danger mb-3 border-0" href="logout.php"> <i class="bi bi-box-arrow-right"></i> Keluar</a>
              </td>
            </tr>

            <!-- Baris Judul Kolom Tabel -->
            <tr>
              <th>No</th>
              <th>Tanggal Pengaduan</th>
              <th>No. Kamar</th>
              <th>Laporan</th>
              <th>Bukti</th>
              <th>Status</th>
              <th>Cek Tindakan</th>
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
              <td><?php echo $row['tgl']; ?></td>

              <!-- Nomor Kamar -->
              <td><?php echo $row['no_kamar']; ?></td>

              <!-- Laporan Pengaduan -->
              <td><?php echo $row['pengaduan']; ?></td>

              <!-- Foto Bukti -->
              <td>
                <img class="rounded m-1" src="gambar/<?php echo $row['bukti']; ?>" width=100>
              </td>

              <!-- Status -->
              <td><?php echo $row['stat']; ?></td>

              <!-- Tindakan -->
              <td>
                <a class="btn btn-warning mt-3" href="halstatus.php?id=<?php echo $row['id']; ?>">
                  <i class="bi bi-pencil-square"></i>
                </form>
              </td>
            </tr>
         
            <?php
              // Agar Nomor Pengaduan terus bertambah 1
              $no++; 
            } ?>

          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
