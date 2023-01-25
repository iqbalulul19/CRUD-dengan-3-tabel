<?php
include("koneksi.php");
if(isset($_POST['tambah'])){
    $nama=$_POST['nama'];
    $kelas=$_POST['kelas'];
    $nama_jurusan=$_POST['nama_jurusan'];
    $tahun=$_POST['tahun'];
    $nominal=$_POST['nominal'];

    $sql="INSERT INTO tb_jurusan(nama_jurusan) VALUES ('$nama_jurusan' )";
    $query=mysqli_query($koneksi, $sql);

    $sql="SELECT max(id_jurusan) AS jurusan_id FROM tb_jurusan LIMIT 1";
    $query=mysqli_query($koneksi, $sql);

    $sql="INSERT INTO tb_spp(tahun, nominal) VALUES ('$tahun','$nominal' )";
    $query=mysqli_query($koneksi, $sql);

    $sql="SELECT max(id_jurusan) AS jurusan_id FROM tb_jurusan LIMIT 1";
    $query=mysqli_query($koneksi, $sql);

    $data = mysqli_fetch_array($query);
    $as = $data ['jurusan_id'];

    $sql="SELECT max(id_spp1) AS spp2_id FROM tb_spp LIMIT 1";
    $query=mysqli_query($koneksi, $sql);

    $data = mysqli_fetch_array($query);
    $das = $data ['spp2_id'];

   $sql="INSERT INTO tb_siswa(nama, kelas, id_jurusan, id_spp1 ) VALUES ('$nama','$kelas','$as','$das' )";
    $query=mysqli_query($koneksi, $sql);


    if($query){
        header('location:join-table.php?status:sukses');
    }else{
        header('location:join-table.php?status:gagal'); 
    }
}
?>