<?php
     include("connexion_base.php");
     $reqNom = 'SELECT * FROM medecin ORDER BY nom DESC';
     $contenuNom = $linkpdo->prepare($reqNom);
   
?>

<HTML>
<head>
    <title>Fiche Usager</title>				
</head>
<link rel="stylesheet" href="style.css">
<body>
     <ul>
          <li><a class="active" href="afficherUsager.php">Patients</a></li>
          <li><a href="afficherMedecin.php">Medecin</a></li>
          <li><a href="rdv.php">Consultation</a></li>
          <li><a href="statistique.php">Statistique</a></li>
          <li><a href="index.html">Deconnexion</a></li>
     </ul>      
     <div style="margin-left:25%;padding:1px 16px;">
     <h2>Ajout d'un Usager :</h2>
  
     <form method="POST" action="ajoutusager.php">
          <p>Civilite : <select name="civilite" type="text">
               <option value="Monsieur">Mr</option>  
               <option value="Madame">Mme</option></select></p>
          <p>Nom : <input name="nom" type="text" ></p>
          <p>Prenom : <input name="prenom" type="text" ></p>
          <p>Adresse : <input name="adresse" type="text" ></p>
          <p>Ville : <input name="ville" type="text" ></p>
          <p>Code Postal : <input name="codepostal" type="text" ></p>
          <p>Date de naissance : <input name="date_naissance" type="date" ></p>
          <p>Lieu de naissance : <input name="lieu_naissance" type="text" ></p>
          <p>Numero de securite sociale : <input name="num_secu" type="text" ></p>
          <p>Medecin attitré : <select name="Medecin" type="text">
               <?php
                    $contenuNom->execute();
                    $resultatNom = $contenuNom->fetchAll();
                    foreach ($resultatNom as $resultatNom) {
                         echo '<option value= "'.$resultatNom['id_medecin'].'" >'.$resultatNom['nom'].' '.$resultatNom['prenom'].'</option>';
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