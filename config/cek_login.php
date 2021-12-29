<?php
session_start();
include 'config.php';
include 'key.php';
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = sha1($_POST['password']);
  $auth = mysqli_query($koneksi,"SELECT * FROM akun WHERE 
    username='$username' AND password='$password'");

  if (mysqli_num_rows($auth)>0) {
   $fet = mysqli_fetch_array($auth);
   $_SESSION['status'] ="sudah_login";
   $_SESSION['id'] = $fet['idAkun'];
   $_SESSION['nama'] = $fet['nama'];
   $_SESSION['dp'] = $fet['gambar'];
   $_SESSION['level'] = $fet['levell'];
   $_SESSION['nota'] = "";
   //echo "<script>alert('berhasil');</script>";
   header('location:../index.php?Home');   
 }else{
  //echo "<script>alert('Gagal Login');</script>";
  $_SESSION['status'] ="gagal_login";
  header('location:../login.php');



}

}  


?>