<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>index</title>
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
    //supp
   if (isset($_GET['ide'])) {
      $id=$_GET['ide'];
      $req="DELETE FROM employes WHERE idemploye='$id'";
      $nb=$conn->exec($req);
    }
      // affichage
     $sql = "SELECT * FROM employes ";
    $res = $conn ->query($sql);
        echo "<table  class='table table-success table-hover'";
        echo "<tr class='table-secondary'>";
        echo "<th colspan='3'>liste des employes</th>";
        echo "<th><a href='ajouteremp.php'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-circle-fill' viewBox='0 0 16 16'>
  <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z'/>
</svg> NOUVEAU</a></th>";
        echo"</tr>";
        echo "<tr>";
        echo "<th>NOM&PRENOM</th>";
        echo "<th>Fonction</th>";
        echo "<th>Date embouche</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        while ($row = $res->fetch()) {
            echo "<tr>";
            echo "<td>".$row['nom']." ".$row['prenom']."</td>";
            echo "<td>".$row['fonction']."</td>";
            echo "<td>".$row['dateEmbouche']."</td>";
            ?> <td><a href=infoemploye.php?ide=<?=$row['idemploye']?>><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
  <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
  <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z's/>
</svg><a/>&nbsp;&nbsp;<a href='modifemploye.php?ide=<?=$row['idemploye']?>'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
  <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
</svg></a>&nbsp;&nbsp;
<a href='employes.php?ide=<?=$row['idemploye']?>'>
 <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill'viewBox='0 0 16 16'>
  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg></a></td>  <?php
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        unset($res);
 } catch (Exception $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
 }
 ?>
 </table>
 </div> 
</body>
</html>