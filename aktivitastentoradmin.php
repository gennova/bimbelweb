<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
//including the database connection file
    include_once("config.php");
	$nama = $_POST['nama'];
	$tglawal = $_POST['tglawal'];
	$tglakhir = $_POST['tglakhir'];
 	
	 if( $nama == ''){
	        echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
	 }else{
	         $query= "SELECT tentor.nama,aktivitasbimbel.hari,aktivitasbimbel.tanggal,aktivitasbimbel.durasi,aktivitasbimbel.topik FROM aktivitasbimbel JOIN tentor ON aktivitasbimbel.idtentor=tentor.id JOIN userbimbel ON tentor.nama=userbimbel.nama WHERE userbimbel.nama='$nama' AND aktivitasbimbel.tanggal BETWEEN 'tglawal' AND '$tglakhir'";
	                 $result= mysqli_query($con, $query);
		             $emparray = array();
	                     if(mysqli_num_rows($result) > 0){  
	                     while ($row = mysqli_fetch_assoc($result)) {
                                     $emparray[] = $row;
                                   }
	                     }
	         echo json_encode(array( "status" => "true","message" => "Login successfully!", "data" => $emparray) );
	         mysqli_close($con);
	 }
	} else{
			echo json_encode(array( "status" => "false","message" => "Error occured, please try again!"));
	}
?>