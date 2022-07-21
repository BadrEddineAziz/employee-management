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
        <tr>
         <td colspan="2"><input type='hidden' name='id' value="<?= $id?>"> </td> 
        </tr>
        <tr>
        <td>NOM:</td>
        <td><?=$row['nom']?></td>
        </tr>
        <tr>
        <td>PRENOM:</td>
        <td><?=$row['prenom']?></td>
        </tr>
         <tr>
        <td>FONCTION:</td>
        <td><?=$row['fonction']?></td>
        </tr>
        <tr>
        <td>DATE EMBAUCHE:</td>
        <td><?=$row['dateEmbouche']?></td>
        </tr>
         <tr>
        <td>ADRESSE:</td>
        <td><?=$row['adress']?></td>
        </tr>
        <tr>
        <td>TELE:</td>
        <td><?=$row['tele']?></td>
        </tr> 
        <tr>
        <td>E-MAIL:</td>
        <td><?=$row['mail']?></td>
        </tr> 
       </table>
    <?php
    }
	
} catch (Exception $e) {
	 die("ERROR: Could not connect. " . $e->getMessage());
}

?>
</div>
</body>
</html>