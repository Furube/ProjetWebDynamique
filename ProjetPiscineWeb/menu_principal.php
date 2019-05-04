<?php session_start();
isset($_SESSION["email"])? $_SESSION["email"] : "";

//Refresh l'email
//$_SESSION['email'] = "A"; 						
echo $_SESSION['email']; 
?>


<!DOCTYPE html>
<html>
<head>
	<title> ECE amazon </title>
	
	<!-- Pour le Bootstrap -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="jolie.css">
    <!-- https://www.php.net/manual/fr/function.require.php --> 
	

	<!--Partie sql --> 
	<?php 

	  $tableautout = array();
	  $tableauClient = array();


	  $database= "projetweb";
	  $db_handle = mysqli_connect('localhost', 'root', '');
	  $db_found = mysqli_select_db($db_handle, $database);

	  
	  if($db_found)
	  {
	    $result = mysqli_query($db_handle, "SELECT photos_item, nom_item, id_item, prix_item FROM item ");
	    $resultClient = mysqli_query($db_handle, "SELECT email_client FROM client ");  
	  }
	  else 
	  {
	    echo "Database not found";
	  }
	  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	  {
	       $tableautout[] = $row;
	  }

	  while ($rowClient = mysqli_fetch_array($resultClient, MYSQLI_ASSOC))
	  {
	       $tableauClient[] = $rowClient;
	  } 

	?> 

	<?php require "navbar.php"?> 

</head>

<body>
	<div id="carousel">

  		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     		 <ol class="carousel-indicators">
        		<li  data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
       		    <li  data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        		<li  data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        		<li  data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      		 </ol>
    
	    	<div class="carousel-inner">
	      
	      		<!-- https://pixabay.com/fr/illustrations/f%C3%AAtards-rave-personnes-musique-dj-1644798/ --> 
		        <div class="carousel-item active"> 
		          <img class="d-block w-100" src="images/Musique.jpg" alt="First slide">
		          	<div class="carousel-caption d-none d-md-block">
    					<h3 id="surlignage"> Que la musique vous emporte ! </h3>
    					<p  id="surlignage"> Vynile et Cd en vente à prix minis koeur </p>
  					</div>
		        </div>
	        
	        	<!-- https://pixabay.com/fr/photos/animaux-fantasy-composer-livres-2739386/ -->
		        <div class="carousel-item">
		          <img class="d-block w-100" src="images/Livres.jpg" alt="Second slide">
		          <div class="carousel-caption d-none d-md-block">
    					<h3 id="surlignage">Les livres ça pique et peut couper ! </h3>
    					<p id="surlignage"> Furube et le stagiaire tope des ventes à prix minis koeur </p>
  					</div>
		        </div>
	      
	      		<!-- https://pixabay.com/fr/photos/chapeau-la-mode-style-heureux-591973/ --> 
		        <div class="carousel-item">
		          <img class="d-block w-100" src="images/vetementsH2.jpg" alt="Third slide">
		          <div class="carousel-caption d-none d-md-block">
    					<h3 id="surlignage">Comme le dit si bien McDonalds: Venez comme vous êtes ! </h3>
    					<p  id="surlignage"> Ventes Flash sur les moumoutes à poil ras koeur </p>
  					</div>
		        </div>

		        <!-- https://pixabay.com/fr/photos/en-cours-d-ex%C3%A9cution-sprint-498257/ --> 
		        <div class="carousel-item" >
		          <img class="d-block w-100" src="images/runningF2.jpg" alt="Fourth slide">
		          <div class="carousel-caption d-none d-md-block">
    					<h3 id="surlignage"> courez vers nos prix attractifs et innovants et beaux ! </h3>
    					<p  id="surlignage"> koeur sur vous !  </p>
  					</div>
		        </div>
	   
	    	</div>
   
	   		<!-- Pour le bouton prev --> 
		    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
	   		
	   		<!-- Pour le bouton next --> 
		    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		      <span class="carousel-control-next-icon" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>

  		</div>

	</div>

	<!-- https://ludovicscribe.fr/blog/galerie-images-bootstrap --> 
	<div id="objet" >
		<br>
		<br>

		<!-- Limiter les le défilement à 3 -->  
		<!--  Pour afficher tout les objets --> 
		<?php for($i=0;$i< count($tableautout) ;$i++) : ?>
            <?php  require "rowObjet.php"; ?>
        <?php endfor; ?>



            </div>
        </div>
       
		<br>
		<br>
		<br>

		<!-- Pour la pagination --> 
		<div class="d-flex justify-content-center" > 
			<ul class="pagination">
			        <li class="disabled"><a href="#"> « </a></li>
			        <li class="active"><a href="#"> 1   <span class="sr-only">(current)</span></a></li>
			        <li><a href="#"> 2 </a></li>
			        <li><a href="#"> 3 </a></li>
			        <li><a href="#"> 4 </a></li>
			        <li><a href="#"> 5 </a></li>
			        <li><a href="#"> » </a></li>
			</ul>
		</div>
		
		<br>
	</div>

	<footer class="page-footer">
		<div class="container">
			<div class="row">
		
				<div class="col-lg-8 col-md-8 col-sm-12">
					<h6 class="text-uppercase font-weight-bold"> Information additionnelle</h6>
					<p>
						Ce site a été conçu dans le cadre du projet piscine 2019. Il a été conçu par les enseignants: Hina Manolo, JP Segado, Elisabeth Rendler et toute l’équipe du projet « piscine » de web dynamique. Que la force soit avec nous et bonne nage !! *bloubloublou*
					</p>

					<p>
						Une piscine est un bassin artificiel, étanche, rempli d'eau et dont les dimensions permettent à un être humain de s'y plonger au moins partiellement. Une piscine se différencie d'une cuve ou d'une baignade par ses équipements de filtration (pompe, filtre...). Il existe différents types de piscine dont les caractéristiques varient en fonction de leurs destinations  et de leur usage.
					</p>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 class="text-uppercase font-weightbold">Contact</h6>
					<p>
						37, quai de Grenelle, 75015 Paris, France <br>
						info@webDynamique.ece.fr <br>
						+33 01 02 03 04 05 <br>
						+33 01 03 02 05 04
					</p>
				</div>

			</div>
	
		<div class="footer-copyright text-center">&copy; 2019 Copyright | Droit
			d'auteur: webDynamique.ece.fr</div>
	</footer>


</body>
</html>


