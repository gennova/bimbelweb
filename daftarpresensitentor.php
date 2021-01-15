<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
//including the database connection file
    include_once("config.php");
	$IDTENTOR = $_POST['idtentor'];
 	
	 if( $IDTENTOR == ''){
	        echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
	 }else{
	 	$query= "SELECT * FROM tentor join userbimbel on tentor.iduser=userbimbel.id and userbimbel.level='TENTOR' where statustentor='AKTIF' and userbimbel.id=$IDTENTOR";
	 	  $result= mysqli_query($con, $query);
          $emparray = array();
	                     if(mysqli_num_rows($result) > 0){  
	                     while ($row = mysqli_fetch_assoc($result)) {
                                     $emparray[] = $row;
                                   }
	                     }
	           echo json_encode(array( "status" => "true","message" => "Data fetch successfully!", "data" => $emparray) );
     	       mysqli_close($con);
	 }
	}
?>