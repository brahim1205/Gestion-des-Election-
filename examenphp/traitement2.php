<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Élections</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="text-center">Résultats des Élections</h1>
        </header>
        <section>
            <div class="resultats">
            <?php
// Connexion à la base de données
$connexion = new PDO('mysql:host=localhost;dbname=users_base1','root','');

if (!$connexion) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

$sql = "SELECT candidat, SUM(scores) AS total_scores FROM elections GROUP BY candidat";
$resultat = $connexion->query($sql);

if ($resultat->rowCount() > 0) {
    $premier_candidat = null;
    $deuxieme_candidat = null;
    $total_votes = 0;
    $candidats = array(); 

    while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $candidat = $row['candidat'];
        $total_scores = $row['total_scores'];

        $total_votes += $total_scores;

        $candidats[] = array('candidat' => $candidat, 'total_scores' => $total_scores);

        if ($premier_candidat === null || $total_scores > $premier_candidat['total_scores']) {
            $deuxieme_candidat = $premier_candidat;

            $premier_candidat = array('candidat' => $candidat, 'total_scores' => $total_scores);
        } elseif ($deuxieme_candidat === null || $total_scores > $deuxieme_candidat['total_scores']) {

            $deuxieme_candidat = array('candidat' => $candidat, 'total_scores' => $total_scores);
        }
    }

    
    foreach ($candidats as $candidat_info) {
        if ($candidat_info['total_scores'] > ($total_votes / 2)){
            echo "Le candidat " . $candidat_info['candidat'] . " est élu dès le premier tour avec " . $candidat_info['total_scores'] . " voix.<br><br>";
        } elseif ($candidat_info['total_scores'] == $premier_candidat['total_scores']) {
            echo "Le candidat " . $candidat_info['candidat'] . " est passé au deuxième tour avec " . $candidat_info['total_scores'] . " voix.<br><br>";
        } elseif ($candidat_info['total_scores'] > $deuxieme_candidat['total_scores']) {
            echo "Le candidat " . $candidat_info['candidat'] . " est en ballotage avec " . $candidat_info['total_scores'] . " voix.<br><br>";
        } else {
            echo "Le candidat " . $candidat_info['candidat'] . " est éliminé directement avec " . $candidat_info['total_scores'] . " voix.<br><br>";
        }
    }
} else {
    echo "Aucun résultat trouvé.";
}
$connexion = null;
?>

            </div>
        </section>
    </div>



    <style> 
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

header {
    background-color: #007bff;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

.resultats {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.resultats h2 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
}

.resultats .candidat {
    margin-bottom: 15px;
}

.resultats .candidat .nom {
    font-weight: bold;
}

.resultats .candidat .voix {
    font-style: italic;
}

.resultats .candidat .statut {
    font-weight: bold;
    color: #007bff;
}

.resultats .candidat.elimine {
    text-decoration: line-through;
    color: #888;
}

    </style>

</body>
</html>
