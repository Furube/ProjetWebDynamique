<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" type="text/css" href="inscription.css">
</head>
<body>
<?php  require "navbar.php"?>
<div class="container">
<div class="card bg-light">
	<form action="" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-at"></i> </span>
		 </div>
        <input name="mail" class="form-control" placeholder="e-mail" type="text">
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
        <input name="mdp" class="form-control" placeholder="Mot de passe" type="text">
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		</div>
        <input name="nom" class="form-control" placeholder="Nom" type="text">
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="prenom" class="form-control" placeholder="Prenom" type="text">
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		 </div>
        <input name="adresse" class="form-control" placeholder="Adresse" type="text">
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="codepostal" class="form-control" placeholder="Code postal" type="number" max="99999" min="0" value="0">
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		 </div>
        <input name="ville" class="form-control" placeholder="Ville" type="text">
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-plane"></i> </span>
		 </div>
        <input name="pays" class="form-control" placeholder="Pays" type="text">
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		 </div>
        <input name="telephone" class="form-control" placeholder="Numéro de Téléphone" type="number" min="0" value="0">
    </div> 
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Ajouter" name="envoie"></input>
      <?php
      if (isset($_POST['envoie'])) 
            {
              $mail =isset($_POST["mail"])? $_POST["mail"]: "";
              $mdp =isset($_POST["mdp"])? $_POST["mdp"]: "";
              $nom=isset($_POST["nom"])? $_POST["nom"]: "";
              $prenom=isset($_POST["prenom"])? $_POST["prenom"]: "";
              $adresse=isset($_POST["adresse"])? $_POST["adresse"]: "";
              $codepostal=isset($_POST["codepostal"])? $_POST["codepostal"]: 0;
              $ville=isset($_POST["ville"])? $_POST["ville"]:"";
              $pays=isset($_POST["pays"])? $_POST["pays"]:"";
              $telephone=isset($_POST["telephone"])? $_POST["telephone"]:0;
              $database= "projetweb";
              $db_handle = mysqli_connect('localhost', 'root', '');
              $db_found = mysqli_select_db($db_handle, $database);

              if($db_found)
              {
                $sql = "INSERT INTO `client`(`email_client`, `password`, `nom_client`, `prenom_client`, `adresse_postale`, `code_postale`, `ville`, `pays`, `numero_tel`, `email`) VALUES ('$mail','$mdp','$nom','$prenom','$adresse','$codepostal','$ville','$pays','$telephone','')";

                $sql2 = "INSERT INTO `connexion`(`email`,`password`,`type`,`email_admin`,`email_vendeur`,`email_acheteur`) VALUES ('$mail','$mdp','Acheteur','','','')";
              }
              else 
              {
                echo "Database not found";
              }

              $result = mysqli_query($db_handle, $sql);

              $result = mysqli_query($db_handle, $sql2);
            }
      ?>
</form>
</div> 
</div>
</body>