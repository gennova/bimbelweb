<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
  //including the database connection file
    include_once("config.php");
    $NAMA = $_POST['nama'];   
    $EMAIL = $_POST['email'];   
    $JADWAL = $_POST['jadwal'];   
    $TARIF = $_POST['tarif'];     
    $STATUS = $_POST['status']; 
    $TENTOR = $_POST['tentor'];         
	 if($NAMA == '' || $EMAIL == ''){
	        echo json_encode(array( "status" => "false","message" => "Data belum lengkap!") );
	 }else{
    try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
	         $query = "CALL spAktivasi('$NAMA','$EMAIL','$JADWAL','$TARIF','$STATUS','$TENTOR')";  
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