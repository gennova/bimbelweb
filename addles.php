<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
  //including the database connection file
    include_once("config.php");
    $NAMATENTOR = $_POST['namatentor'];   
    $NAMAMURID = $_POST['namamurid'];   
    $JADWAL = $_POST['jadwal'];   
    $TARIF = $_POST['tarif'];     
    $STATUS = $_POST['status'];         
	 if($NAMATENTOR == '' || $NAMAMURID == ''){
	        echo json_encode(array( "status" => "false","message" => "Data belum lengkap!") );
	 }else{
    try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
	         $query = "CALL spAddLes('$NAMATENTOR','$NAMAMURID','$JADWAL','$TARIF','$STATUS')";  
           // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($query);
            // execute the stored procedure
          $stmt->execute(); 
          $stmt->closeCursor();
          //echo "success";
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
			    echo json_encode(array( "status" => "true","message" => "Registrasi Anda Berhasil!"));
	        mysqli_close($con);
	 }
 }
 ?>