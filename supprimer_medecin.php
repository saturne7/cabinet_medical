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
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Suppression d'un medecin :</h2>

        <?php
        try {
            $linkpdo = new PDO("mysql:host=localhost; dbname=cabinet", 'root', '');
            $linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $req = $linkpdo->prepare('DELETE FROM medecin WHERE id_Medecin = :num LIMIT 1');

        $req->bindValue(':num', $_GET['numMedecin'], PDO::PARAM_STR);

        $resultat = $req->execute();

        if ($resultat) {
            echo "La valeur a été supprimé";
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