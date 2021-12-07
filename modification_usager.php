<HTML>
<head>
    <title>Modification Usager</title>				
</head>
<link rel="stylesheet" href="style.css">
<body>
    <ul>
        <li><a class="active" href="afficherUsager.php">Patients</a></li>
        <li><a href="afficherusager.php">Medecins</a></li>
        <li><a href="rdv.php">Consultation</a></li>
        <li><a href="index.html">Deconnexion</a></li>
    </ul>      
    <div style="margin-left:25%;padding:1px 16px;height:1500px;">
        <h2>Modifier un patient</h2>

        <?php
        include("connexion_base.php");

		$reqNom = 'SELECT nom, prenom, id_medecin FROM medecin';
        $contenuNom = $linkpdo->prepare($reqNom);
		
        //préparation de la requête
        $req = $linkpdo->prepare('SELECT *  FROM usager WHERE id_usager = :num LIMIT 1');
        //liaison du paramètre nommé.
        $req->bindValue(':num', $_GET['numUsager'], PDO:: PARAM_INT);
        //execution de la requête
        $req->execute();
        //On recupère le contact
        $usager = $req -> fetch();
        ?>
        <form method="get" action="modificationBD_usager.php">
            <p><input type="hidden" name="id" value="<?= $usager['id_usager'];?>"/>  </p>
            <p>Civilite : <select name="civilite" type="text" value="<?= $usager['civilite'];?>">
                    <option value="<?= $usager['civilite'];?>"><?= $usager['civilite'];?></option>  
                    <option value="Monsieur">Mr</option>  
                    <option value="Madame">Mme</option></select></p>
            <p>Nom : <input type="text" name="nom" value="<?= $usager['nom'];?>"/>  </p>
            <p>Prenom: <input type="text" name="prenom" value="<?= $usager['prenom'];?>" /> </p>
          <p>Adresse : <input name="adresse" type="text" value="<?= $usager['adresse'];?>"></p>
          <p>Ville : <input name="ville" type="text" value="<?= $usager['ville'];?>" ></p>
          <p>Code Postal : <input name="codepostal" type="text" value="<?= $usager['codepostal'];?>" ></p>
          <p>Date de naissance : <input name="date_naissance" type="date" value="<?= $usager['date_naissance'];?>" ></p>
          <p>Lieu de naissance : <input name="lieu_naissance" type="text" value="<?= $usager['lieu_naissance'];?>" ></p>
          <p>Numero de securite sociale : <input name="num_secu" type="text" value="<?= $usager['num_secu'];?>" ></p>
          <p>Medecin attitré : <select name="Medecin" value="<?= $usager['id_medecin'];?>">
                    <option value="<?= $usager['id_medecin'];?>"><?= $usager['id_medecin'];?></option>
               <?php
                    $contenuNom->execute(array($_POST['Medecin']));
                    $resultatNom = $contenuNom->fetchAll();
                    foreach ($resultatNom as $resultatNom) {
                        echo '<option value="'.$resultatNom['id_medecin'].'">';
                        echo $resultatNom['nom'].' '.$resultatNom['prenom']. "</option>";
                    }
                        
               ?>     
               </select></p>
            <p> <input type="submit" value="Enregister vos modifications" name="operation"> </p>
			
        </form>
        <form method="POST" action="afficherUsager.php">
            <input type="submit"  value="Retour" ></p>
        </form>
    </div>
</body>
</HTML>