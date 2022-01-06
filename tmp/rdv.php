<HTML>
<head>
    <title>Fiche rendez-vous</title>				
</head>
<link rel="stylesheet" href="../style/style.css">
<body>
     <ul>
          <li><a  href="afficherUsager.php">Patients</a></li>
          <li><a href="afficherMedecin.php">Medecins</a></li>
          <li><a class="active" href="rdv.php">Consultations</a></li>
          <li><a href="statistique.php">Statistiques</a></li>
          <li><a href="../index.html">Deconnexion</a></li>
     </ul>      
     <div style="margin-left:25%;padding:1px 16px;">
     <h2>Ajout d'un Rendez-vous :</h2>
  
     <form method="POST" action="ajoutconsultation.php">
          <p>Date de la consultation : <input name="date_rdv" type="date" ></p>
          <p>Duree : <input name="duree" type="time" value="00:30" ></p>
          <p>Heure de la consultation : <input name="heure_rdv" type="time" ></p>
          <p>Patient : <select name="patient">
               <option value=""></option>
               <?php
                    include("connexion_base.php");
                    $reqUsager = 'SELECT nom, prenom, id_medecin, id_usager
                    FROM usager';
                    $contenuUsager = $linkpdo->prepare($reqUsager);
                    $contenuUsager->execute(array($_POST["patient"]));
                    $resultatUsager=$contenuUsager->fetchAll();
                    foreach ($resultatUsager as $resultatUsager) {
                         echo '<option value="'.$resultatUsager['id_usager'].'">';
                         echo $resultatUsager['nom'].' '.$resultatUsager['prenom']."</option>";
                    }
                        
               ?> 
		</select></p>
          <p><input name="id_medecin" type="hidden" value="<?=$resultatUsager['id_medecin']?>"></p>
          <p><input type="submit" value="Valider" ><input type="reset" value="Annuler"></p>
     </form>
     <form method="POST" action="afficherConsultation.php">
          <input type="submit"  value="Retour" ></p>
     </form>
     </div>

</body>
</HTML>