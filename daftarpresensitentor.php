<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
//including the database connection file
    include_once("config.php");
	$IDTENTOR = $_POST['idtentor'];
 	
	 if( $IDTENTOR == ''){
	        echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
	 }else{
	 	$query= "SELECT * FROM tentor JOIN lesaktif ON lesaktif.idtentor=tentor.iduser JOIN aktivitasbimbel ON lesaktif.idtentor=aktivitasbimbel.idtentor WHERE tentor.statustentor='AKTIF' and tentor.iduser='$IDTENTOR';
";       $result= mysqli_query($con, $query);
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