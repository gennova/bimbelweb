<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
  //including the database connection file
    include_once("config.php");
    $NAMA = $_POST['nama'];   
    $EMAIL = $_POST['email']; 
    $STATUSTERIMA = $_POST['status'];      
	 if($NAMA == '' || $EMAIL == ''){
	        echo json_encode(array( "status" => "false","message" => "Data belum lengkap!") );
	 }else{
    $query= "update tentor set statustentor='$STATUSTERIMA' where nama='$NAMA' and statustentor='MENUNGGU PROSES'";
          $result= mysqli_query($con, $query);
            echo json_encode(array( "status" => "true","message" => "Aktivasi Tentor Successfully!") );
          }
           mysqli_close($con);
 }
 ?>