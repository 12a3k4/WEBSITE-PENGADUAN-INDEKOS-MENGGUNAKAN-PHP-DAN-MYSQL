 <?php

  // Memanggil file koneksi.php untuk membuat koneksi
  include 'koneksi.php';

  // Memulai Session
  session_start();

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
    <title>TINDAKAN</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Google Fonts Poppins CDN -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

  </head>
  <body class="bg-primary" style="font-family: 'Poppins', sans-serif;">

      <div class="container mt-5 p-5 card d-flex justify-content-center shadow-lg">

        <!-- Buat Form dengan method POST -->
        <form method="POST" action="status.php" enctype="multipart/form-data" >

          <!-- Teks Judul Ubah Pengaduan -->
          <h3 class="text-center text-primary"> Tindakan Pengaduan</h3>
        
          <!-- Menampung ID Data yang akan dihapus -->
          <input class="form-control" name="id" value="<?php echo $data['id']; ?>"  hidden />

          <!-- Form Tanggal Pengaduan -->
          <div>
            <br>
            <label>Tanggal Pengaduan</label>
            <input class="form-control" type="text" name="tgl" value="<?php echo $data['tgl']; ?>" readonly />

          <!-- Form Nomor Kamar -->  
          </div>
            <br>
            <label>Nomor Kamar: </label>
            <input class="form-control" type="text" name="no_kamar" value="<?php echo $data['no_kamar']; ?>" readonly />
          <div>
          
          </div>
          <!-- Form Pengaduan -->
          <div>
            <br>
            <label>Pengaduan</label>
            <textarea class="form-control" type="text" name="pengaduan" readonly />
            <?php echo $data['pengaduan']; ?>
            </textarea>
          </div>

          <!-- Status -->
          <div>
          <br>
            <label>Status Laporan:</label><?php echo $data['stat']; ?>
            
            <select class="form-control m-1" type="text" name="stat">
                    <option value="Laporan Diterima">Laporan Diterima</option>
                    <option value="Sedang Diproses">Sedang Diproses</option>
                    <option value="SELESAI">SELESAI</option>
                </select>
                
          </div>
          

          <!-- Keterangan -->
          <div>
          <br>
          <label>Keterangan</label>
          <input class="form-control" type="text" name="keterangan" value="<?php echo $data['keterangan']; ?>" />
          </div>

          <!-- Tombol Simpan Perubahan -->
          <div>
            <br>
            <button class="btn btn-success" type="submit" href="admin.php">Simpan</button>
            <a class="btn btn-primary m-1" href="admin.php">Kembali</a>
          </div>

      </form>
      </div>
      
  </body>
</html>
