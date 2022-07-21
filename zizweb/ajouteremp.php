<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ajouter nouveau employe</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">
      <a class="navbar-brand" href="employes.php">zizweb</a>
    </div>
  </nav>
  
<table width="600px" height="450px" cellpadding="10" cellpadding="5" align="center" style="background-color: #A8D0CC;"  >
	<form method="post" class="form-floating mb-3">
	<tr align="center">
		<td><strong>NOM: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" name="no" class="form-control" width="20px"  required></td>
	</tr>
	<tr align="center">
		<td><strong>PRENOM:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" name="pr"  class="form-control" required></td>
	</tr>
	<tr align="center">
		<td><strong>FONCTION:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" name="fo" class="form-control" required></td>
	</tr>
	<tr align="center">
		<td><strong>DATE EMBAUCHE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="date" name="de" class="form-control" required></td>
	</tr>

	<tr align="center">
		<td><strong>ADRESSE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" name="ad" class="form-control" required></td>
	</tr>
	<tr align="center">
		<td><strong>TELEPHONE:&nbsp;&nbsp;&nbsp;</strong><input type="number" name="tele" class="form-control"   max="999999999999"  required></td>
	</tr>
	<tr align="center">
		<td><strong>E-MAIL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="email" name="em" class="form-control" required></td>
	</tr>
	<tr>
		<td colspan="4" align="center" class="f"> <input type="submit" name="ok" value="ENREGISTRER" class="btn btn-outline-dark" required></td>
	</tr>
</form> 
<?php 

   if (isset($_POST['ok'])) {
   if (isset($_POST['no'])) {
   	 $nom=$_POST['no'];
   }
  if (isset($_POST['pr'])) {
  	$prenom=$_POST['pr'];
  }
  if (isset($_POST['fo'])) {
   $fn=$_POST['fo'];
  }
  if (isset($_POST['de'])) {
   $de=$_POST['de'];
  }
   if (isset($_POST['ad'])) {
   	$ads=$_POST['ad'];
   }
   if (isset($_POST['tele'])) {
    $tph=$_POST['tele'];
   }
   if (isset($_POST['em'])) {
   	$ema=$_POST['em'];
   }
 

try{
    $conn = new PDO("mysql:host=localhost;dbname=zizweb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
    catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
 }

 try{
 	//verfier email
 $email="SELECT mail FROM employes WHERE mail='$ema'";
  $k=$conn->query($email);
  $lo=$k->rowCount($k);
  if ($lo==0) {
  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO employes VALUES (NULL,'$nom', '$prenom', '$fn','$de','$ads',' $tph','$ema' )";
  
  $conn->exec($sql); 
 
  echo'<tr><td><div class="alert alert-success" role="alert">ajouter avec success</div></tr></td>';
 }
 else{
 echo'<tr><td><div class="alert alert-danger" role="alert">ce email est deja existe</div></tr></td>';
}
} 
  catch(PDOException $e){
    die("ERROR: kk " . $e->getMessage());
 }
  }
?>
</table>
</body>
</html>