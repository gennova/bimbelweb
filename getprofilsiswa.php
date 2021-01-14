<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
//including the database connection file
    include_once("config.php");
	$iduser = $_POST['iduser'];
 	
	 if( $iduser == ''){
	        echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
	 }else{
	         $query= "SELECT *,murid.nama as namamurid,murid.alamat as alamatmurid,murid.jenjang as jenjangmurid, tentor.nama as 'namatentor' FROM userbimbel join murid on userbimbel.id=murid.iduser join lesaktif on userbimbel.id=lesaktif.idmurid join tentor on lesaktif.idtentor=tentor.id  WHERE userbimbel.id='$iduser'";
	                 $result= mysqli_query($con, $query);
		             $emparray = array();
	                     if(mysqli_num_rows($result) > 0){  
	                     while ($row = mysqli_fetch_assoc($result)) {
                                     $emparray[] = $row;
                                   }
	                     }
	         echo json_encode(array( "status" => "true","message" => "Data Siswa successfully!", "data" => $emparray) );
	         mysqli_close($con);
	 }
	} else{
			echo json_encode(array( "status" => "false","message" => "Error occured, please try again!"));
	}
?>