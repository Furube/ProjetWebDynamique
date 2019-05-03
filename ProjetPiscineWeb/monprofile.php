<?php
session_start();
$mail= $_SESSION['email'];
$bliat="'";
$database= "projetweb";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$sql = "SELECT * FROM `connexion`  WHERE (email =";
$sqlbis =$sql."'".$mail."')";
$type = mysqli_query($db_handle, $sqlbis);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Vendeur Page</title>
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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="menu_principale.php"> <h2> ECE Amazon </h2> </a> 
		<div class="collapse navbar-collapse" id="main-navigation">
	

		<ul class="navbar-nav">             
			<li class="nav-item"><a class="nav-link" href="http://localhost/ProjetPiscineWeb/monprofile">Mon Profil</a> </li>       
			<li class="nav-item"><a class="nav-link" href="http://localhost/ProjetPiscineWeb/vendeur">Mes Stocks</a></li>             
			<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>  
		</ul>             
	</div> 
	</nav>
	<?php 
	while ($row = $type->fetch_assoc()) {
     $sqlbalbal=$row['type'];
} 
	if($sqlbalbal=="Vendeur")
	{
	$sqltout="SELECT * FROM `".$sqlbalbal."` WHERE (email_vendeur ='".$mail."')";
	$result2= mysqli_query($db_handle, $sqltout);
	while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))
	{
		?>
		<img src=<?php echo $row['photo_vendeur']?>  width="84" height="84">
	<?php
		echo "<br>email:  ".$row['email_vendeur']."<br>";
		echo "nom: {$row['nom_vendeur']}"."<br>";	
		echo "prenom: ".$row['prenom_vendeur']."<br>"; 
	
	}
	}
	if($sqlbalbal=="Admin")
	{
		$sqltout="SELECT * FROM `".$sqlbalbal."` WHERE (email_admin ='".$mail."')";
	//echo $sqltout;
	$result2= mysqli_query($db_handle, $sqltout);

	while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))
	{
		echo "email:  ".$row['email_admin']."<br>";
		echo "nom: {$row['nom_admin']}"."<br>";	
	}
	}
	if($sqlbalbal=="Client")
	{
	$sqltout="SELECT * FROM `".$sqlbalbal."` WHERE (email_client ='".$mail."')";
	$result2= mysqli_query($db_handle, $sqltout);

	while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))
	{
		echo "email:  ".$row['email_client']."<br>";
		echo "nom: {$row['nom_client']}"."<br>";
		echo "prenom: {$row['prenom_client']}"."<br>";
		echo "adresse postale: {$row['adresse_postale']}"."<br>";
		echo "code_postale: {$row['code_postale']}"."<br>";
		echo "ville: {$row['ville']}"."<br>";
		echo "pays: {$row['pays']}"."<br>";
		echo "numero_tel: {$row['numero_tel']}"."<br>";
	}
	}
	
?>
	
</body>
</html
