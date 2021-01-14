<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
//including the database connection file
    include_once("config.php");
	$iduser = $_POST['iduser'];
 	
	 if( $iduser == ''){
	        echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
	 }else{
	         $query= "SELECT * FROM userbimbel join tentor on userbimbel.id=tentor.iduser WHERE userbimbel.id=$iduser";
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