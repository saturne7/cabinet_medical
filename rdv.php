<?php
     include("connexion_base.php");
     $reqNom = 'SELECT nom, prenom FROM medecin';
     $contenuNom = $linkpdo->prepare($reqNom);
   
?>


<?php
        include("connexion_base.php");

		$reqNomMedecin = 'SELECT nom, prenom, id_medecin FROM medecin';
        $contenuNomMedecin = $linkpdo->prepare($reqNom);
		
   
        ?>
		
		<?php
        include("connexion_base.php");

		$reqNomUsager = 'SELECT nom, prenom, id_usager FROM usager';
        $contenuNomUsager = $linkpdo->prepare($reqNom);
		
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
          <p>Duree : <input name="duree" type="time" ></p>
          <p>Heure_RDV : <input name="heure_rdv" type="text" ></p>
          <p>Usager: <select name="usager" value="<?php= $usager['id_usager'];?>">
                    <option value="<?php= $usager['id_usager'];?>"><?= $usager['id_usager'];?></option>
               <?php
                    $contenuNomUsager->execute(array($_POST['usager']));
                    $resultatNom = $contenuNomUsager->fetchAll();
                    foreach ($resultatNom as $resultatNom) {
                        echo '<option value="'.$resultatNom['id_usager'].'">';
                        echo $resultatNom['nom'].' '.$resultatNom['prenom']. "</option>";
                    }
                        
               ?> 
		    
          
              <p>Medecin attitré : <select name="medecin" value="<?= $usager['id_medecin'];?>">
                    <option value="<?= $usager['id_medecin'];?>"><?= $usager['id_medecin'];?></option>
               <?php
                    $contenuNomMedecin->execute(array($_POST['medecin']));
                    $resultatNom = $contenuNomMedecin->fetchAll();
                    foreach ($resultatNom as $resultatNom) {
                        echo '<option value="'.$resultatNom['id_medecin'].'">';
                        echo $resultatNom['nom'].' '.$resultatNom['prenom']. "</option>";
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