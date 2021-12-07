<!DOCTYPE HTML>
<html>

  <head>
    <title>Afficher medecin</title>
  </head>
  <link rel="stylesheet" href="style.css">
  <body>
    <ul>
      <li><a href="afficherUsager.php">Patients</a></li>
      <li><a class="active" href="afficherMedecin.php">Medecin</a></li>
      <li><a href="rdv.php">Consultation</a></li>
      <li><a href="index.html">Deconnexion</a></li>
    </ul>
    <div style="margin-left:25%;padding:1px 16px;"> 
    <h2>Liste de Medecin dans le cabinet : </h2>
    <?php
      include("connexion_base.php");
      ///Préparation de la requête sans les variables (marqueurs : ?)
      $req = 'SELECT * FROM medecin';
      $contenuReq = $linkpdo->prepare($req);
      $contenuReq->execute();
      echo "<table border = 1>";
      echo "<tr>
        <th>Civilite</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th></th>
        <th></th>
        </tr>";
      $resultat = $contenuReq->fetchAll();
    foreach ($resultat as $resultat) {
    ?>
    <p><?php
      echo "<tr>";
      echo "<td>" . $resultat['civilite'] . "</td>";
      echo "<td>" . $resultat['nom'] . "</td>";
      echo "<td>" . $resultat['prenom'] . "</td>";
      echo "<td>" ?><a href= "modification_medecin.php?numMedecin=<?=$resultat['id_Medecin']?>"> Modifier <?php "</td>";
      echo "<td>" ?><a href="supprimer_medecin.php?numMedecin=<?=$resultat['id_Medecin']?>"> Supprimer<?php "</td>";
      echo "</tr>";
    }
    echo "</table>";?></p>
    <form method="POST" action="medecin.php">
      <input type="submit"  value="Ajouter un Medecin" ></p>
    </form>
</div>

</body>
</html>