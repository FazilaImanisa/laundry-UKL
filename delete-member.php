<?php
include("connection.php");

$id_member=$_GET["id_member"];

$sql = "delete from member where id_member= '".$id_member."'";

$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:list-member.php");
} else {
    printf('Gagal Menghapus Data'.mysqli_error($connect));
    exit();
}
?>