<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['passworde']; 

    // Connexion à la base de données
    $servername = "localhost"; 
    $username = "root"; 
    $password_db = ""; 
    $dbname = "users_base1"; 

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (nom, prenom, email, passworde) VALUES ('$nom', '$prenom', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Gestion des Élections</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container-fluid  text-light py-3">
    <header class="text-center">
        <h1 class="display-6">Gestion Des Elections</h1>
    </header>
</div>
<section class="container my-2  w-50 text-dark p-2">
    <form class="row g-3 p-3" method="POST" action="traitement2.php" id="candidateForm" >
        <div class="col-md-4">
            <label for="validationDefault01" class="form-label text-dark">Region</label>
            <input type="text" class="form-control" id="validationDefault01" name="region" >
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label text-dark">Commune</label>
            <input type="text" class="form-control" id="validationDefault02" name="Commune" >
        </div>
        <div class="col-md-4">
            <label for="validationDefaultDepartement" class="form-label text-dark">Departement</label>
            <input type="text" class="form-control" id="validationDefaultDepartement" name="Departement" >
        </div>
        <div class="col-md-4">
            <label for="validationDefaultQuartier" class="form-label text-dark">Quartier</label>
            <input type="text" class="form-control" id="validationDefaultQuartier" name="Quartier" >
        </div>
        <div class="col-md-4">
            <label for="validationDefaultCentredeVote" class="form-label text-dark">Centre de Vote</label>
            <input type="text" class="form-control" id="validationDefaultCentredeVote" name="Centre_de_Vote" >
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label text-dark">Candidat</label>
            <input type="text" class="form-control" id="inputCity" name="Candidat">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label text-dark">Bureau de vote</label>
            <select id="inputState" class="form-select" name="Bureau_de_vote">
                <option selected>Choose...</option>
                <option>Bureau 1</option>
                <option>Bureau 2</option>
            </select>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label text-dark">Scores</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="" name="Scores">
        </div>
       

       

        <div class="col-12">
        <button type="button" id="sendBtn" class="btn btn-success me-4">Envoyer</button>
        <button type="submit" id="calculateBtn"  class="btn btn-primary">Calculer les Résultats</button>
    </div> 
    </form>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="script.js"></script>
























<script>
 $(document).ready(function() {
    $('#sendBtn').click(function() {
        if (confirm("Voulez-vous vraiment envoyer les informations ?")) {
            var formData = new FormData(document.getElementById("candidateForm"));

            $.ajax({
                type: 'POST',
                url: 'traitement1.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#candidateForm')[0].reset();
                    alert('Les informations ont été envoyées avec succès !');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Une erreur est survenue lors de l\'envoi des données.');
                }
            });
        }
    });

    $('#calculateBtn').click(function() {
        if (confirm("Voulez-vous vraiment calculer les résultats ?")) {
            $.ajax({
                type: 'POST',
                url: 'traitement2.php',
                success: function(response) {
                    alert('Les scores ont été calculés avec succès !');
                    $('#candidateForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Une erreur est survenue lors du calcul des scores.');
                }
            });
        }
    });
});

</script>

</body>
</html>
