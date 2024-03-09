<?php
// Connexion à la base de données 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_base1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$region = $_POST['region'];
$commune = $_POST['Commune'];
$departement = $_POST['Departement'];
$quartier = $_POST['Quartier'];
$centre_de_vote = $_POST['Centre_de_Vote'];
$candidat = $_POST['Candidat'];
$bureau_de_vote = $_POST['Bureau_de_vote'];
$scores = $_POST['Scores'];

$sql = "INSERT INTO elections (region, commune, departement, quartier, centre_de_vote, candidat, bureau_de_vote, scores) VALUES ('$region', '$commune', '$departement', '$quartier', '$centre_de_vote', '$candidat', '$bureau_de_vote', '$scores')";

if ($conn->query($sql) === TRUE) {
    echo "Les informations ont été ajoutées avec succès à la base de données.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
