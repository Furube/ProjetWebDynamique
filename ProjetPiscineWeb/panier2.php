<?php
session_start();

$mail= $_SESSION['email'];
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
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="menu_principale.php"> <h2> ECE Amazon </h2> </a> 
		<div class="collapse navbar-collapse" id="main-navigation">
	

		<ul class="navbar-nav">             
			<li class="nav-item"><a class="nav-link" href="">Mon panier</a> </li>       
		</ul>             
	</div> 
	</nav>
	<?php
	$mail="stagiaire@gmail.com";
	$sql = "SELECT type FROM `connexion`  WHERE (email=";
	$sql =$sql."'".$mail."')";
	//$sql="SELECT * FROM `connexion`  WHERE (email = 'stagiaire@gmail.com') ";
	$type = mysqli_query($db_handle, $sql);
	
	while ($row =mysqli_fetch_assoc($type)) 
  {
		
		if ($row['type']=="Acheteur")
		{
				$sql= "SELECT * FROM `panier`  WHERE (email_client = '".$mail."')";
				echo $sql;
				
				$result5 = mysqli_query($db_handle, $sql);
				//print_r($result5);
				//$row1 =mysqli_fetch_assoc($result5);
				//echo gettype($row1);
				$tableau = array();
		
			while($row1= mysqli_fetch_assoc($result5))
			{
				$tableau[] = $row1;
				echo "la";
				echo $row1['id_commande'];
				echo"email : ".$row1['email_client']."<br>";
				echo "id panier :".$row1['id_panier']."<br>";
			}
				
		}
		else if($row['type']!="Acheteur")
		{
			echo "<br>Tu n'es pas un client!<br>";
		}
  }
		
	?>
</body>
</html
