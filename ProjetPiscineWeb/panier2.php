<?php

	session_start();


	$mail= $_SESSION['email'];
	$database= "projetweb";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	$sqlType = array(); 
	  
	$sql = 'SELECT * FROM `connexion` WHERE `email` = "'.$mail.'" ' ;  

	if($db_found)
	{
		//$result = mysqli_query($db_handle,$sql ); 
		$type = mysqli_query($db_handle, $sql);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Page Panier</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
	<link rel="stylesheet" type="text/css" href="jolie.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>


<body>
	<!-- Création de la barre en haut de l'écran --> 
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  		<a class="navbar-brand" href="menu_principal.php"> <h2> ECE Amazon </h2> </a> 
		<div class="collapse navbar-collapse" id="main-navigation">
	
			<!-- Titre de la page --> 
			<ul class="navbar-nav">             
				<li class="nav-item"><a class="nav-link" href=""> <h1> Mon panier </h1></a> </li>       
			</ul> 

		</div> 

	</nav>

	<?php
	//Verification que c'est bien un acheteur.
	while ($row = mysqli_fetch_array($type, MYSQLI_ASSOC))
	{
    	 $sqlType[] = $row['type'];;
	} 
	
	//Regarde tout les Client pour voir si l'email correspond
	for($i=0;$i< count($sqlType) ;$i++) 
    {   
    	//Si oui rechercher le panier de 
		if ($sqlType[$i]=="Client")
		{	
			//Récupère tout les panier du client 
			$sql= 'SELECT * FROM `panier`  WHERE email_client = "'.$mail.'" ';
				
			$resultPanier = mysqli_query($db_handle, $sql);
			$panierEmail = array();
		
			while($row1= mysqli_fetch_assoc($resultPanier))
			{
				$panierEmail[] = $row1;
			}

			//Regarder tout les Id de commande pour voir si un correspond
			//Si elle a un panier rechercher ses articles
			if ( $emailPanier[0] != null )
			{
				//On les cherches dans Bon de commande
				$sqlBon = 'SELECT * FROM `commande`  WHERE `id_commande` = "'.$emailPanier[0].'" ';
				$resultCommande = mysqli_query($db_handle, $sqlBon);
				$CommandeId = array();

				//On a l'ensemble des chemins pour accéder aux items. 
				while($row2= mysqli_fetch_assoc($resultPanier))
				{
					$CommandeId[] = $row2;
				}


			}

				
		}
		else if($row['type']!="Client")
		{
			echo "<br>Tu n'es pas un client!<br>";
		}
	}
		
	?>
</body>
</html
