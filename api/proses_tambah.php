<?php

  // Melakukan koneksi database ( copy saja dari halaman koneksi.php)
  include 'koneksi.php';

	// Membuat variabel untuk menampung data dari Formulir Tambah Pengaduan
  $tgl                 = $_POST['tgl'];
  $no_kamar            = $_POST['no_kamar'];
  $pengaduan           = $_POST['pengaduan'];
  $ft                  = $_FILES['bukti']['name'];
  $file                = $_FILES['bukti']['tmp_name'];

  // Menambahkan Pengaduan ke Database pada tabel LAPORAN
  $sql=mysqli_query($koneksi, "insert into laporan(tgl,no_kamar,pengaduan,bukti,stat) values('$tgl','$no_kamar','$pengaduan','$ft','Laporan Diterima')");
  move_uploaded_file($file, "gambar/".$ft);

  if(!$sql){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi));
  } else {
    // Tampil alert dan akan redirect ke halaman index.php
    echo "<script>window.location='index.php';</script>";
  }

?>