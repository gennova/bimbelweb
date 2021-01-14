<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
  //including the database connection file
    include_once("config.php");
    $EMAIL = $_POST['email'];   
    $HARI = $_POST['hari'];   
    $TANGGAL = $_POST['tanggal'];   
    $TOPIK = $_POST['topik'];     
    $DURASI = $_POST['durasi']; 
    $NAMAMURID = $_POST['murid'];     
	 if($TANGGAL == '' && $EMAIL == ''){
	        echo json_encode(array( "status" => "false","message" => "Data belum lengkap!") );
	 }else{
    try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
	         $query = "CALL spPresensi('$EMAIL','$HARI','$TANGGAL','$DURASI','$TOPIK','$NAMAMURID')";  
           // prepare for execution of the stored procedure
            $stmt = $pdo->prepare($query);
            // execute the stored procedure
          $stmt->execute(); 
          $stmt->closeCursor();
          //echo "success";
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
			    echo json_encode(array( "status" => "true","message" => "Presensi Anda Berhasil!"));
	        mysqli_close($con);
	 }
 }
 ?>