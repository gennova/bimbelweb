<?php 
   if($_SERVER['REQUEST_METHOD']=='POST'){
  // echo $_SERVER["DOCUMENT_ROOT"];  // /home1/demonuts/public_html
  //including the database connection file
    include_once("config.php");
    $NAMA = $_POST['nama'];   
    $JENJANG = $_POST['jenjang'];   
    $MAPEL = $_POST['mapel'];   
    $HARIJAM = $_POST['harijam'];     
    $KISARAN = $_POST['kisaran']; 
    $ALAMAT = $_POST['alamat'];       
    $EMAIL = $_POST['email']; 
    $PASSWORD = $_POST['password'];     
	 if($NAMA == '' || $EMAIL == ''){
	        echo json_encode(array( "status" => "false","message" => "Data belum lengkap!") );
	 }else{
    try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
	         $query = "CALL spInsertTentor('$NAMA','$JENJANG','$MAPEL','$HARIJAM','$KISARAN','$ALAMAT','$EMAIL','$PASSWORD')";  
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