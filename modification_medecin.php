<HTML>
<head>
    <title>Modification Medecin</title>				
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
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Modifier un medecin</h2>

        <?php
        include("connexion_base.php");

        //préparation de la requête
        $req = $linkpdo->prepare('SELECT *  FROM medecin WHERE id_medecin = :num LIMIT 1');
        //liaison du paramètre nommé.
        $req->bindValue(':num', $_GET['numMedecin'], PDO:: PARAM_INT);
        //execution de la requête
        $req->execute();
        //On recupère le contact
        $medecin = $req -> fetch();
        ?>
        <form method="get" action="modificationBD_medecin.php">
            <p><input type="hidden" name="id" value="<?= $medecin['id_medecin'];?>"/>  </p>
            <p>Civilite : <select name="civilite" type="text">
                    <option value="<?= $medecin['civilite'];?>"><?= $medecin['civilite'];?></option>
                    <option value="Monsieur">Mr</option>  
                    <option value="Madame">Mme</option></select></p>
            <p>Nom : <input type="text" name="nom" value="<?= $medecin['nom'];?>"/>  </p>
            <p>Prenom: <input type="text" name="prenom" value="<?= $medecin['prenom'];?>" /> </p>
            <p> <input type="submit" value="Enregister vos modifications" name="operation"> </p>
        </form>
        <form method="POST" action="afficherMedecin.php">
            <input type="submit"  value="Retour" ></p>
        </form>
    </div>
</body>
</HTML>