<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Connexion et Inscription </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/all.min.css'>
   
</head>
<body class="bg-light">
    <div class="container ">
        <div class="row mt-5">
            <div class="col-lg-4 bg-white m-auto rounded-top">
                <h2 class="text-center"> Inscription</h2>
                <p class="text-center text-muted lead"> Simple et Rapide </p>
 
                <form method="POST" action="gestion.php">
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-user">
                            </i> 
                        </span>
                        <input type="text" name="nom" class="form-control" placeholder="Nom " required>
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-user">
                            </i> 
                        </span>
                        <input type="text" name="prenom" class="form-control" placeholder="Prénom " required>
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-envelope">
                            </i> 
                        </span>
                        <input type="text" name="email" class="form-control" placeholder="Email " required>
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-lock">
                            </i> 
                        </span>
                        <input type="password" name="passworde" class="form-control" placeholder="Mot de passe " required>
                    </div>
                    <div class="d-grid">
                        <button type="buton" name="valider" class="btn btn-success">S’inscrire</button>
                        <p class="text-center text-muted ">

                        <i style="color: red">
                        <?php
                            if(isset($message)){
                                echo $message;
                            }

                        ?></i><br>
                       

                            En cliquant sur S’inscrire, vous acceptez nos <a href="#">  Conditions générales</a>, notre <a href=""> Politique de confidentialité </a> et notre <a href="#">  Politique d’utilisation</a> des cookies. 
                        </p>
                        <p class="text-center">
                             Avez vous déjà un compte ?<a href="connexion.html"> Connexion </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</body>
</html> 
<script src='js/bootstrap.js'></script>