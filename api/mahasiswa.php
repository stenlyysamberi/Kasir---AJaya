<?php 
include '../config/config.php';
header("Content-type:application/json");
$response = array();

$sql = mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa");

if(mysqli_num_rows($sql)>0){
	while ($row = mysqli_fetch_array($sql)) {
		$response[] = array(
            
                    'id'    => $row['id'],
                    'nama'  => $row['nama'],
                    'nim'   => $row['nim'],
                    'nama_panggil' => $row['nama_panggil'],
                    'slug' => $row['slug'],
                    'email' =>$row['email'],
                    'phone' => $row['phone'],
                    'url_ig' => $row['url_ig'],
                    'url_fb' => $row['url_fb'],
                    'url_youtube' => $row['url_youtube'],
                    'url_github' => $row['url_github'],
                    'jurussan' => $row['nama_kampus'],
                    'fakultas' => $row['fakultas'],
                    'hobi' => $row['hobi'],
                    'skill' => $row['skill'],
                    'picture' => $row['picture']
            
        );
        
	}
    
}

echo json_encode([array("data" => $response)]);
mysqli_close($koneksi);