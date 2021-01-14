<?php 
   if($_SERVER['REQUEST_METHOD']=='GET'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
//including the database connection file
    include_once("config.php");
	         $query= "SELECT * FROM murid join userbimbel on murid.iduser=userbimbel.id and userbimbel.level='MURID' where status='MENUNGGU PERSETUJUAN'";
	                 $result= mysqli_query($con, $query);
		             $emparray = array();
	                 while ($row = mysqli_fetch_assoc($result)) {
                                     $emparray[] = $row;
                                   }

	           echo json_encode(array( "status" => "true","message" => "Login successfully!", "data" => $emparray)); 
	           mysqli_close($con);
	 }
?>