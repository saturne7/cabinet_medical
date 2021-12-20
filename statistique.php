<!DOCTYPE HTML>
<html>
  <head>
    <title>Statistique du cabinet</title>
  </head>
  <link rel="stylesheet" href="style.css">
  <body>
    <ul>
      <li><a href="afficherUsager.php">Patients</a></li>
      <li><a href="afficherMedecin.php">Medecins</a></li>
      <li><a href="afficherConsultation.php">Consultations</a></li>
      <li><a class="active" href="statistique.php">Statistiques</a></li>
      <li><a href="index.html">Deconnexion</a></li>
    </ul>
    <div style="margin-left:25%;padding:1px 16px;"> 
    <h2> Statistique du cabinet : </h2>
    <?php
      include("connexion_base.php");
      ///Préparation de la requête sans les variables (marqueurs : ?)
      $reqHInf25 = 
      'SELECT count(*) as nb FROM usager 
      WHERE usager.civilite = "Monsieur" 
      AND (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(usager.date_naissance)), "%Y")+0 < 25)';
      $contenuReq = $linkpdo->prepare($reqHInf25);
      $contenuReq->execute();
      $resultHInf25 = $contenuReq->fetch();

      $reqFInf25 = 
      'SELECT count(*) as nb FROM usager 
      WHERE usager.civilite = "Madame" 
      AND (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(usager.date_naissance)), "%Y")+0 < 25)';
      $contenuReq2 = $linkpdo->prepare($reqFInf25);
      $contenuReq2->execute();
      $resultFInf25 = $contenuReq2->fetch();

      $reqHBT25and50 = 
      'SELECT count(*) as nb FROM usager 
      WHERE usager.civilite = "Monsieur" 
      AND (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(usager.date_naissance)), "%Y")+0 > 25)
      AND (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(usager.date_naissance)), "%Y")+0 < 50)';
      $contenuReq3 = $linkpdo->prepare($reqHBT25and50);
      $contenuReq3->execute();
      $resultHBT25and50 = $contenuReq3->fetch();

      $reqFBT25and50 = 
      'SELECT count(*) as nb FROM usager 
      WHERE usager.civilite = "Madame" 
      AND (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(usager.date_naissance)), "%Y")+0 > 25)
      AND (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(usager.date_naissance)), "%Y")+0 < 50)';
      $contenuReq4 = $linkpdo->prepare($reqFBT25and50);
      $contenuReq4->execute();
      $resultFBT25and50 = $contenuReq4->fetch();

      $reqHSup50 = 
      'SELECT count(*) as nb FROM usager 
      WHERE usager.civilite = "Monsieur" 
      AND (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(usager.date_naissance)), "%Y")+0 > 50)';
      $contenuReq5 = $linkpdo->prepare($reqHSup50);
      $contenuReq5->execute();
      $resultHSup50 = $contenuReq5->fetch();

      $reqFSup50 = 
      'SELECT count(*) as nb FROM usager 
      WHERE usager.civilite = "Madame" 
      AND (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(usager.date_naissance)), "%Y")+0 > 50)';
      $contenuReq6 = $linkpdo->prepare($reqFSup50);
      $contenuReq6->execute();
      $resultFSup50 = $contenuReq6->fetch();

      echo "<table border = 1>";
      echo "<tr>
        <th>Tranche d'age</th>
        <th>Homme</th>
        <th>Femme</th>
        </tr>
        <tr>
        <td> Moins de 25 ANS</td>
        ";
        echo "<td>" . $resultHInf25['nb'] . "</td>";
        echo "<td>" . $resultFInf25['nb'] . "</td>";
        echo "<tr>";
        echo "<tr>
        <td> Entre 25 et 50 ANS</td>
        ";
        echo "<td>" . $resultHBT25and50['nb'] . "</td>";
        echo "<td>" . $resultFBT25and50['nb'] . "</td>";
        echo "<tr>";
        echo "<tr>
        <td> Plus de 50 ANS</td>
        ";
        echo "<td>" . $resultHSup50['nb'] . "</td>";
        echo "<td>" . $resultFSup50['nb'] . "</td>";
        echo "<tr>";
        echo "</table>";?></p>
</div>

</body>
</html>