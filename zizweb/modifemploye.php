<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>info employe</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">
      <a class="navbar-brand" href="employes.php">zizweb</a>
    </div>
  </nav>
  <div class='container'>
<?php
	try{
    $conn = new PDO("mysql:host=localhost;dbname=zizweb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
    catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
 }
try {
	if (isset($_GET['ide'])) {
	$id=$_GET['ide'];
	$sql = "SELECT * FROM employes WHERE idemploye=$id ";
    $res = $conn ->query($sql);
     $row = $res->fetch();
     ?>
        <table  class='table table-success table-hover'>
         <form method="post">
        <tr>
         <td colspan="2"><input type='hidden' name='id' value="<?= $id?>"> </td> 
        </tr>
        <tr>
        <td>NOM:</td>
        <td><input type="text" name="nom" value="<?=$row['nom']?>"></td>
        </tr>
        <tr>
        <td>PRENOM:</td>
        <td><input type="text" name="pre" value="<?=$row['prenom']?>"></td>
        </tr>
         <tr>
        <td>FONCTION:</td>
        <td><input type="text" name="fon" value="<?=$row['fonction']?>"></td>
        </tr>
        <tr>
        <td>DATE EMBAUCHE:</td>
        <td><input type="date" name="dem" value="<?=$row['dateEmbouche']?>"></td>
        </tr>
         <tr>
        <td>ADRESSE:</td>
        <td><input type="text" name="ads" value="<?=$row['adress']?>"></td>
        </tr>
        <tr>
        <td>TELE:</td>
        <td><input type="number" name="tel" value="<?=$row['tele']?>"></td>
        </tr> 
        <tr>
        <td>E-MAIL:</td>
        <td><input type="email" name="ema" value="<?=$row['mail']?>"></td>
        </tr> 
        <tr>
      <td colspan="4" align="center" class="f"> <input type="submit" name="ok" value="VALIDER" class="btn btn-outline-dark" required></td>
   </tr>
   </form>
       </table>
    <?php
    if (isset($_POST['ok'])) {
      //recupereration
       $id=$_GET['ide'];
       $nom=$_POST['nom'];
       $prenom=$_POST['pre'];
       $fn=$_POST['fon'];
       $date=$_POST['dem'];
       $adress=$_POST['ads'];
       $tele=$_POST['tel'];
       $mail=$_POST['ema'];
       //modification
        $sql = "UPDATE employes SET nom='$nom',prenom='$prenom',fonction='$fn',dateEmbouche='$date',adress='$adress',tele='$tele',mail='$mail' WHERE idemploye=$id";
    $conn->exec($sql);
    echo'<tr><td><div class="alert alert-success" role="alert">mettre a jour  avec success</div></tr></td>';
    }
    }
	
} catch (Exception $e) {
	 die("ERROR: Could not connect. " . $e->getMessage());
}

?>
</div>
</body>
</html>