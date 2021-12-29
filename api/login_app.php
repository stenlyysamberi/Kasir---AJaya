<?php 
include '../config/config.php';
header("Content-type:application/json");
if (isset($_POST['username']) && isset($_POST['password'])) {
 
 $username = $_POST['username'];
 $password = sha1($_POST['password']);

 $sql = $koneksi->query("SELECT * FROM akun WHERE 
    username='$username' AND password='$password' AND levell='gudang'");
 if(mysqli_num_rows($sql) > 0){
  while($row = mysqli_fetch_array($sql)){
     
      $response["error"] = "Berhasil";
      $response["message"] = "Login Successfully";
      $response["id"] = $row['idAkun'];
      $response["nama"] = $row['nama'];
      $response["gambar"] = $row['gambar'];
      $response["hp"] = $row['hp'];
      $response["levell"] = $row['levell'];
      $response["alamat"] = $row['alamat'];
      $response["create_date"] =$row['create_date'];
    
  }
     
 
  }else{
     $response["error"] = 'error';
     $response["message"] = "Invalid username & Password";
    

 
  }
   echo json_encode($response);
   mysqli_close($koneksi);
  
}