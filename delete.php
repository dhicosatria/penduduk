<?php
require("config.php");
// delete
$id_delete = $_REQUEST['id_delete'];
if( isset($_REQUEST['id_delete']) ){

// ambil id dari query string
$id_delete = $_REQUEST['id_delete'];

// buat query hapus
$sql = "DELETE FROM tbl_penduduk WHERE id = $id_delete";
$query = mysqli_query($koneksi, $sql);

// apakah query hapus berhasil?
if( $query ){
    header('Location: data_penduduk.php');
} else {
    die("gagal menghapus...");
}

} else {
die("akses dilarang...");
}
?>