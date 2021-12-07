<?php
     include("connexion_base.php");
     $reqNom = 'SELECT nom, prenom FROM medecin';
     $contenuNom = $linkpdo->prepare($reqNom);
   
?>
<?php
include("connexion_base.php");
$reqNomU = 'SELECT nom, prenom FROM usager';
$contenuNomU = $linkpdo->prepare(reqNomU);
?>
<HTML>
<head>
    <title>Fiche rendez-vous</title>				
</head>
<link rel="stylesheet" href="style.css">
<body>
     <ul>
          <li><a  href="afficherUsager.php">Patients</a></li>
          <li><a href="afficherMedecin.php">Medecin</a></li>
          <li><a class="active" href="rdv.php">Consultation</a></li>
          <li><a href="index.html">Deconnexion</a></li>
     </ul>      
     <div style="margin-left:25%;padding:1px 16px;">
     <h2>Ajout d'un Rendez-vous :</h2>
  
     <form method="POST" action="ajoutusager.php">
          <p>Date_RDV : <input name="date_rdv" type="date" ></p>
          <p>Duree : <input name="duree" type="text" ></p>
          <p>Heure_RDV : <input name="heure_rdv" type="text" ></p>
          <p>usager <input name="usager" type="text" ></p>
		  <?php
                    $contenuNomU->execute(array($_POST['usager']));
                    $resultatNomU = $contenuNomU->fetchAll();
                    foreach ($resultatNomU as $resultatNomU) {
                         echo "<option>".$resultatNomU['nom']." ".$resultatNomU['prenom']."</option>";
                    }
                        
               ?>   
          <p>Medecin attitré : <select name="Medecin" type="text">
               <?php
                    $contenuNom->execute(array($_POST['Medecin']));
                    $resultatNom = $contenuNom->fetchAll();
                    foreach ($resultatNom as $resultatNom) {
                         echo "<option>".$resultatNom['nom']." ".$resultatNom['prenom']."</option>";
                    }
                        
               ?>     
               </select></p>
          <p><input type="submit" value="Valider" ><input type="reset" value="Annuler"></p>
     </form>
     <form method="POST" action="recherchercontact.php">
          <input type="submit"  value="Rechecher un contact" ></p>
     </form>
     </div>

</body>
</HTML>