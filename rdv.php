<HTML>
<head>
    <title>Fiche rendez-vous</title>				
</head>
<link rel="stylesheet" href="style.css">
<body>
     <ul>
          <li><a  href="afficherUsager.php">Patients</a></li>
          <li><a href="afficherMedecin.php">Medecins</a></li>
          <li><a class="active" href="rdv.php">Consultations</a></li>
          <li><a href="statistique.php">Statistiques</a></li>
          <li><a href="index.html">Deconnexion</a></li>
     </ul>      
     <div style="margin-left:25%;padding:1px 16px;">
     <h2>Ajout d'un Rendez-vous :</h2>
  
     <form method="POST" action="ajoutRDV.php">
          <p>Date de la consultation : <input name="date_rdv" type="date" ></p>
          <p>Duree : <input name="duree" type="time" ></p>
          <p>Heure de la consultation : <input name="heure_rdv" type="time" ></p>
          <p>Patient : <select name="usager" value="">
                    <option value=""></option>
               <?php
                    include("connexion_base.php");
                    $reqUsager = 'SELECT nom, prenom, id_medecin
                    FROM usager';
                    $contenuUsager = $linkpdo->prepare($reqUsager);
                    $contenuUsager->execute(array($_POST['usager']));
                    $resultatUsager = $contenuUsager->fetchAll();
                    foreach ($resultatUsager as $resultatUsager) {
                        echo '<option value="'.$resultatUsager['id_usager'].'">';
                        echo $resultatUsager['nom'].' '.$resultatUsager['prenom']. "</option>";
                    }
                        
               ?> 
		</select></p>    
          <p>Medecin : <select name="medecin" value="">
                    <option value=""></option>
               <?php
                     $reqMedecin = 
                     'SELECT nom, prenom, id_medecin
                     FROM medecin
                     WHERE id_medecin= '.$resultatUsager['id_medecin'].'';
                     $contenuMedecin =$linkpdo->prepare($reqMedecin);
                     $contenuMedecin->execute(array($_POST['medecin']));
                     $resultatMed = $contenuMedecin->fetchAll();
                     foreach ($resultatMed as $resultatMed) {
                         echo '<option value="'.$resultatMed['id_medecin'].'">';
                         echo $resultatMed['nom'].' '.$resultatMed['prenom']. "</option>";
                     }
   
               ?>          
          </select></p>
          <p><input type="submit" value="Valider" ><input type="reset" value="Annuler"></p>
     </form>
     </div>

</body>
</HTML>