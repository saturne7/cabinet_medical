 <HTML>

 <head>
     <title>Fiche Usager</title>
 </head>
 <link rel="stylesheet" href="style.css">

 <body>
     <ul>
         <li><a class="active" href="afficherUsager.php">Patients</a></li>
         <li><a href="afficherMedecin.php">Medecins</a></li>
         <li><a href="afficherConsultation.php">Consultations</a></li>
         <li><a href="statistique.php">Statistiques</a></li>
         <li><a href="index.html">Deconnexion</a></li>
     </ul>
     <div style="margin-left:25%;padding:1px 16px;height:1000px;">
         <h2>Suppression d'un patient :</h2>

         <?php
            try {
                $linkpdo = new PDO("mysql:host=localhost; dbname=cabinet", 'root', '');
                $linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

            $req = $linkpdo->prepare('DELETE FROM usager WHERE id_usager = :num LIMIT 1');

            $req->bindValue(':num', $_GET['numUsager'], PDO::PARAM_STR);

            $resultat = $req->execute();

            if ($resultat) {
                echo "Le patient a été supprimé";
            } else {
                echo "Une erreur est survenue";
            }
            ?>

         <form method="POST" action="afficherUsager.php">
             <input type="submit" value="Retour"></p>
         </form>
     </div>
 </body>

 </HTML>