<?php
require("config.php");

// proses edit
    // cek apakah tombol simpan sudah diklik atau blum?
    if(isset($_POST['simpan'])){

        // ambil data dari formulir
        $id = $_POST['id_sistem_penduduk'];
        $nik = $_POST['nik'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $status_kawin = $_POST['status_kawin'];
        $pekerjaan = $_POST['pekerjaan'];
        $kewarganegaraan = $_POST['kewarganegaraan'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $golongan_darah = $_POST['golongan_darah'];

        // buat query update
        $sql = "UPDATE tbl_penduduk SET 

            nik='$nik',
            nama_lengkap='$nama_lengkap', 
            jenis_kelamin='$jenis_kelamin',
            alamat='$alamat',
            status_kawin='$status_kawin',
            pekerjaan='$pekerjaan',
            kewarganegaraan='$kewarganegaraan',
            tempat_lahir='$tempat_lahir',
            tanggal_lahir='$tanggal_lahir',
            golongan_darah='$golongan_darah'
            WHERE id_sistem_penduduk=$id";
        $query = mysqli_query($koneksi, $sql);

        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location: data_penduduk.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }


      } else {
        die("Akses dilarang...");
      }
?>