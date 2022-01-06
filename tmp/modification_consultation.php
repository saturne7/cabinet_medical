<HTML>
<head>
    <title>Modification Consultation</title>				
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
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Modifier une consultation</h2>

        <?php
        include("connexion_base.php");

        //préparation de la requête
        $req = $linkpdo->prepare('SELECT *  FROM rendez_vous WHERE id_rendez_vous = :num LIMIT 1');
        //liaison du paramètre nommé.
        $req->bindValue(':num', $_GET['numRDV'], PDO:: PARAM_INT);
        //execution de la requête
        $req->execute();
        //On recupère le contact
        $rdv = $req -> fetch();

       
        ?>
        <form method="get" action="modificationBD_consultation.php">
            <p><input type="hidden" name="id" value="<?= $rdv['id_rendez_vous'];?>"/>  </p>
            <p>Date de la consultation :<input type="date" name="date" value="<?= $rdv['date_rdv'];?>"/>  </p>
            <p>Duree : <input type="time" name="duree" value="<?= $rdv['duree'];?>"/>  </p>
            <p>Heure de la consultation: <input type="time" name="heure" value="<?= $rdv['heure_rdv'];?>" /> </p>
            <p>Patients : <select name="patient" value="<?= $rdv['id_usager'];?>">
                    <?php
                     $reqUse = 'SELECT nom, prenom, id_medecin FROM usager WHERE id_usager = '.$rdv['id_usager'].'';
                     $contenu = $linkpdo->prepare($reqUse);
                     $contenu->execute(array($_GET['patient']));
                     $resultat = $contenu->fetch();
                    ?>
                    <option value="<?= $rdv['id_usager'];?>"><?= $resultat['nom'];?> <?= $resultat['prenom'];?></option>
               <?php
                    $reqNom = 'SELECT nom, prenom, id_usager, id_medecin FROM usager';
                    $contenuNom = $linkpdo->prepare($reqNom);
                    $contenuNom->execute(array($_GET['patient']));
                    $resultatNom = $contenuNom->fetchAll();
                    foreach ($resultatNom as $resultatNom) {
                        echo '<option value="'.$resultatNom['id_usager'].'">';
                        echo $resultatNom['nom'].' '.$resultatNom['prenom']. "</option>";
                    }        
               ?>     
               </select></p>
            <p> <input name="id_medecin" type="hidden" value="<?=$resultatNom['id_medecin']?>" ></p>
            <p> <input type="submit" value="Enregister vos modifications" name="operation"> </p>
        </form>
        <form method="POST" action="afficherConsultation.php">
            <input type="submit"  value="Retour" ></p>
        </form>
    </div>
</body>
</HTML>