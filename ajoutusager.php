<HTML>

<head>
    <title>Ajouter un patient</title>
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
        <h2>Modifier un medecin</h2>
        <?php

        include("connexion_base.php");

        $req = $linkpdo->prepare('SELECT id_medecin FROM medecin WHERE nom = :medecin LIMIT 1');
        $req->bindValue(':medecin', $_POST['Medecin']);
        $req->execute();
        $id_medecin = $req->fetch();

        $civilite = $_POST["civilite"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adresse = $_POST["adresse"];
        $ville = $_POST["ville"];
        $codepostal = $_POST["codepostal"];
        $date_naissance = $_POST["date_naissance"];
        $lieu_naissance = $_POST["lieu_naissance"];
        $num_secu = $_POST["num_secu"];

        $req = $linkpdo->prepare('INSERT INTO usager(civilite, nom, prenom, adresse, ville, codepostal, date_naissance, lieu_naissance, num_secu, id_medecin) 
    VALUES(:civilite, :nom, :prenom, :adresse, :ville, :codepostal, :date_naissance, :lieu_naissance, :num_secu, :id_medecin)');
        $req->execute(array(
            'civilite' => $civilite,
            'nom' => $nom,
            'prenom' => $prenom,
            'adresse' => $adresse,
            'ville' => $ville,
            'codepostal' => $codepostal,
            'date_naissance' => $date_naissance,
            'lieu_naissance' => $lieu_naissance,
            'num_secu' => $num_secu,
            'id_medecin' => $id_medecin['id_medecin']
        ));

        if ($req) {
            echo 'Données insérées';
        } else {
            echo "Échec de l'opération d'insertion";
        }
        ?>
        <form method="POST" action="afficherUsager.php">
            <input type="submit" value="Retour"></p>
        </form>
    </div>
</body>

</HTML>