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
          <li><a href="statistique.php">Statistique</a></li>
          <li><a href="index.html">Deconnexion</a></li>
     </ul>      
     <div style="margin-left:25%;padding:1px 16px;">
     <h2>Ajout d'un Rendez-vous :</h2>
  
     <form method="POST" action="ajoutusager.php">
          <p>Date_RDV : <input name="date_rdv" type="date" ></p>
          <p>Duree : <input name="duree" type="time" ></p>
          <p>Heure_RDV : <input name="heure_rdv" type="text" ></p>
          <p>Usager: <select name="usager" value="">
                    <option value=""></option>
               <?php
                    include("connexion_base.php");
                    $reqUsager = 'SELECT nom, prenom, id_Usager FROM usager';
                    $contenuUsager = $linkpdo->prepare($reqUsager);
                    $contenuUsager->execute(array($_POST['usager']));
                    $resultatUsager = $contenuUsager->fetchAll();
                    foreach ($resultatUsager as $resultatUsager) {
                        echo '<option value="'.$resultatUsager['id_usager'].'">';
                        echo $resultatUsager['nom'].' '.$resultatUsager['prenom']. "</option>";
                    }
                        
               ?> 
		</select></p>    
          <p>Medecin attitré : <select name="medecin" value="">
                    <option value=""></option>
               <?php
                    $reqMedecin = 'SELECT nom, prenom, id_medecin FROM medecin';
                    $contenuMedecin = $linkpdo->prepare($reqMedecin);
                    $contenuMedecin->execute(array($_POST['medecin']));
                    $resultatMedecin = $contenuMedecin->fetchAll();
                    foreach ($resultatMedecin as $resultatMedecin) {
                        echo '<option value="'.$resultatMedecin['id_medecin'].'">';
                        echo $resultatMedecin['nom'].' '.$resultatMedecin['prenom']. "</option>";
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