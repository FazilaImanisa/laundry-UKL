<?php
include("connection.php");
if (isset($_POST["simpan_member"])) {
    // tampung data input member dari user
    
    $nama_member = $_POST["nama_member"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $telepon = $_POST["telepon"];

    //membuat perintah sql untuk insert data ke table member
    $sql = "insert into member values
    ('','$nama_member','$alamat','$jenis_kelamin','$telepon')";

    //eksekusi perintah sql
    $tambah = mysqli_query($connect, $sql);

    //direct ke halaman list-member
    if ($tambah) {
        header("location:list-member.php");
    } else {
        printf('Gagal'.mysqli_error($connect));
        exit();
    }

# untuk update

}else if(isset($_POST["edit_member"])){
    # menampung dulu data yang akan di update
    $id_member = $_POST["id_member"];
    $nama_member = $_POST["nama_member"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $telepon = $_POST["telepon"];

    $sql = "update member set nama_member='$nama_member', alamat='$alamat', jenis_kelamin='$jenis_kelamin',
    telepon='$telepon' where id_member='$id_member'";
    
    $edit = mysqli_query($connect, $sql);
    
    if ($edit) {
        header('location:list-member.php');
    } else {
        printf('Gagal'.mysqli_error($connect));
        exit();
    }
    
}elseif (isset($_GET["id_member"])) {
$id_member = $_GET["id_member"];

# hapus data yg ada di tabel member
$sql = "delete from member where id_member='$id_member'";
if (mysqli_query($connect, $sql)) {
    header("location:list-member.php");
} else {
    echo mysqli_error($connect);
}
}
?>
