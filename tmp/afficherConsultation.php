<!DOCTYPE HTML>
<html>

  <head>
    <title>Afficher consultations</title>
  </head>
  <link rel="stylesheet" href="../style/style.css">
  <body>
    <ul>
      <li><a href="afficherUsager.php">Patients</a></li>
      <li><a href="afficherMedecin.php">Medecins</a></li>
      <li><a class="active" href="afficherConsultation.php">Consultations</a></li>
      <li><a href="statistique.php">Statistiques</a></li>
      <li><a href="../index.html">Deconnexion</a></li>
    </ul>
    <div style="margin-left:25%;padding:1px 16px;"> 
    <h2>Liste des consultations : </h2>
    <?php
      include("connexion_base.php");

    
      $reqRDV = 'SELECT *
      FROM rendez_vous
      ORDER BY date_rdv, heure_rdv DESC';
      $contenuRDV = $linkpdo->prepare($reqRDV);
      $contenuRDV->execute();
      $resultatRDV = $contenuRDV->fetchAll();

      echo "<table border = 1>";
      echo "<tr>
        <th>Date consultation</th>
        <th>Heure du rendez-vous</th>
        <th>Duree consultation</th>
        <th>Patients</th>
        <th>Medecins</th>
        <th></th>
        <th></th>
        </tr>";
     
    foreach ($resultatRDV as $resultatRDV) {
      
    ?>
    <p><?php

      $reqMed = $linkpdo->prepare('SELECT nom, prenom FROM medecin WHERE id_medecin = '.$resultatRDV['id_medecin'].'');
      $reqMed->execute();
      $resMed = $reqMed->fetch();

      $reqUse = $linkpdo->prepare('SELECT nom, prenom FROM usager WHERE id_usager = '.$resultatRDV['id_usager'].'');
      $reqUse->execute();
      $resUse = $reqUse->fetch();

      echo "<tr>";
      echo "<td>" . date_format(date_create($resultatRDV['date_rdv']), 'd/m/Y') . "</td>";
      echo "<td>" . $resultatRDV['heure_rdv'] . "</td>";
      echo "<td>" . $resultatRDV['duree'] . "</td>";
      echo "<td>" . $resUse['nom'].' '.$resUse['prenom']. "</td>";
      echo "<td>" . $resMed['nom'].' '.$resMed['prenom'].  "</td>";
      echo "<td>" ?><a href= "modification_consultation.php?numRDV=<?=$resultatRDV['id_rendez_vous']?>"> Modifier <?php "</td>";
      echo "<td>" ?><a href="supprimer_consultation.php?numRDV=<?=$resultatRDV['id_rendez_vous']?>"> Supprimer<?php "</td>";
      echo "</tr>";
    }
    echo "</table>";?></p>
    <form method="POST" action="rdv.php">
      <input type="submit"  value="Ajouter une consultation" ></p>
    </form>
</div>

</body>
</html>