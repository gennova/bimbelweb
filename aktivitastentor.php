<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
//including the database connection file
    include_once("config.php");
	$username = $_POST['username'];
 	
	 if( $username == ''){
	        echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
	 }else{
	         $query= "select aktivitasbimbel.hari,aktivitasbimbel.tanggal,aktivitasbimbel.durasi,aktivitasbimbel.topik from aktivitasbimbel join tentor on aktivitasbimbel.idtentor=tentor.id join userbimbel on tentor.nama=userbimbel.nama where userbimbel.username='$username'";
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