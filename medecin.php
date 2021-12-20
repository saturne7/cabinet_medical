<HTML>
    <head>
        <title>Fiche Medecin</title>				
    </head>
    <link rel="stylesheet" href="style.css">
    <body>
     <ul>
          <li><a href="afficherUsager.php">Patients</a></li>
          <li><a class="active" href="afficherMedecin.php">Medecins</a></li>
          <li><a href="afficherConsultation.php">Consultations</a></li>
          <li><a href="statistique.php">Statistiques</a></li>
          <li><a href="index.html">Deconnexion</a></li>
     </ul>      
     <div style="margin-left:25%;padding:1px 16px;">
       <h2>Ajout d'un Medecin :</h2>
         <form method="POST" action="ajoutmedecin.php">
              <p>Civilite : <select name="civilite" type="text"> 
                   <option value="Monsieur">Mr</option>  
                   <option value="Madame">Mme</option></select></p>
              <p>Nom : <input name="nom" type="text" ></p>
              <p>Prenom : <input name="prenom" type="text" ></p>
              <p><input type="submit" value="Valider" ><input type="reset" value="Annuler"></p>
         </form>
         <form method="POST" action="afficherMedecin.php">
               <input type="submit"  value="Retour" ></p>
         </form>
     </div>
    </body>
    </HTML>
    