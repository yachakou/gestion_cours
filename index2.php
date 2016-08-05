<?php 
    session_start();
    //print_r($_SESSION);
    $login=$_SESSION["login"];
    
    include "functions.php";
    
 
    
?>
<html>
<head>
    <title>Tableau de bord | Gestion des vacataires</title>
<?php include "header.php"; ?>
<div class="container">
<img src="images/nanterre.jpg" alt="nanterre" class="img-responsive">
</div>


<?php include "footer.php" ?>