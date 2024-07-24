<?php

  //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  include('koneksi.php');

  // Memulai Session
  session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Pengaduan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Google Fonts Poppins CDN -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

</head>
  
  <!-- Background warna biru -->
  <body class="bg-primary" style="font-family: 'Poppins', sans-serif;">
    
    <!-- Buat Sebuah Container dengan CARD lalu beri margin-top 5 dan padding 5, lalu tengahkan objek menggunakan 'd-flex justify-content-center' -->
    <div class="container card mt-5 p-5 d-flex justify-content-center">

        <!-- Buatlah Form dengan method POST -->
        <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
          <!-- Teks Judul Tambah Pengaduan -->
          <h3 class="text-center text-primary"> Tambah Pengaduan</h3>       
          <!-- Tanggal Pengaduan Otomatis -->
          <div> <label>Tanggal Pengaduan</label>
            <input class="form-control m-1" type="text" name="tgl" value="<?php echo date('d/m/Y'); ?>" readonly />
          </div>
          <!-- Nomor Kamar -->
          <div> <label>Nomor Kamar</label>
            <select class="form-control m-1" type="text" name="no_kamar">
                    <option value="101">101</option> <option value="102">102</option>
                    <option value="103">103</option> <option value="201">201</option>
                    <option value="202">202</option> <option value="203">203</option>
                    <option value="204">204</option> <option value="205">205</option>
                    <option value="206">206</option> </select> </div>
          <!-- Pengaduan -->
          <div><label>Pengaduan</label>
            <textarea class="form-control m-1" type="text" name="pengaduan" /></textarea>
          </div>
          <!-- Bukti Pengaduan -->
          <div> <label>Bukti</label>
            <input class="form-control  m-1" type="file" name="bukti" required="" />
          </div>
          <!-- Buat Tombol SIMPAN dan KEMBALI dengan class 'btn btn-success atau btn-primary' lalu beri margin1 -->
          <div> <button class="btn btn-success m-1" type="submit">
            Simpan Pengaduan </button>
            <a class="btn btn-primary m-1" href="index.php">Kembali</a>
          </div> </form>
      </div>

  </body>
</html>
