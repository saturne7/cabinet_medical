<HTML>

<head>
    <title>Fiche Medecin</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <ul>
        <li><a href="afficherUsager.php">Patients</a></li>
        <li><a class="active" href="afficherMedecin.php">Medecins</a></li>
        <li><a href="rdv.php">Consultations</a></li>
        <li><a href="statistique.php">Statistiques</a></li>
        <li><a href="index.html">Deconnexion</a></li>
    </ul>
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Ajout d'un Medecin :</h2>
        <?php
        include("connexion_base.php");

        $civilite = $_POST["civilite"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];

        $req = $linkpdo->prepare('INSERT INTO medecin(civilite, nom, prenom) VALUES(:civilite, :nom, :prenom)');
        $req->execute(
            array(
                'civilite' => $civilite,
                'nom' => $nom,
                'prenom' => $prenom
            )
        );

        if ($req) {
            echo 'Données insérées';
        } else {
            echo "Échec de l'opération d'insertion";
        }
        ?>

        <form method="POST" action="afficherMedecin.php">
            <input type="submit" value="Retour"></p>
        </form>
    </div>
</body>

</HTML>