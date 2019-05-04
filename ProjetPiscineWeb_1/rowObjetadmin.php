
<link rel="stylesheet" type="text/css" href="jolie.css">
	<div class="container">   
			    <div class="row">

			    	<?php if ( $i < count($tableautout) ) { ?>
			        <div class="col-lg-3">
						<div class="thumbnail">
							<!-- endroit où mettre les images venue de la database --> 
							<a href="#"> <?php echo '<img src=  '.$tableautout[$i]['photos_item'].' width=20, height=154 >' ?> </a>
	              				
	              				<div class="caption">
	              					<br>

				                	<!-- endroit où mettre nom objet db -->
					                <h4 class= "ItemTitre"> <?php echo $tableautout[$i]['nom_item']?> </h4>
	            				
	            				</div>
	            				
	            				<form method="post" action="">
	            					<input type="submit" class="btn btn-default" value="Supprimer" name="suppression" id="supp"></input>
		      							<?php
		 								if (isset($_POST['suppression'])) 
		            					{	 
								            echo $tableautout[$i]['id_item'];
		            					}
		            					?>
            					</form>
	         			 </div>      
			        </div>
			        <br>
			        <?php $i++ ?>
					<?php } ?>
					
					<?php if ( $i < count($tableautout) ) { ?>
			        <div class="col-lg-3">
			            <div class="thumbnail" >
			            	<a href="#"> <?php echo '<img src=  '.$tableautout[$i]['photos_item'].' width=20, height=154 >' ?></a>

				                <div class="caption">
				                	<br>
				                	<!-- endroit où mettre nom objet db -->
		               				<h4 class= "ItemTitre"> <?php echo $tableautout[$i]['nom_item']?> </h4>

		                		</div>

		                		<form method="post" action="">
		            				<input type="submit" class="btn btn-default" value="Supprimer" name="suppression" id="supp"></input>
		      							<?php
		 								if (isset($_POST['suppression'])) 
		            					{	 
								            echo $tableautout[$i]['id_item'];
		            					}
		            					?>
            					</form>
			            </div>
			        </div>
			        <?php $i++ ?>
					<?php } ?>
			        
			        <?php if ( $i < count($tableautout) ) { ?>
			        <div class="col-lg-3">
			            <div class="thumbnail">
			            	<a href="#"> <?php echo '<img src=  '.$tableautout[$i]['photos_item'].' width=20, height=154 >' ?></a>
				               
				                <div class="caption">
				                	<br>
				                	<!-- endroit où mettre nom objet db -->
		               				<h4 class= "ItemTitre"> <?php echo $tableautout[$i]['nom_item']?> </h4>

		                		</div>
		                		<form method="post" action="">
		            				<input type="submit" class="btn btn-default" value="Supprimer" name="suppression" id="supp"></input>
		      							<?php
		 								if (isset($_POST['suppression'])) 
		            					{	 
								            echo $tableautout[$i]['id_item'];
		            					}
		            					?>
            					</form>
			            </div>
			        </div>
			        <?php $i++ ?>
					<?php } ?>
			        
			        <?php if ( $i < count($tableautout) ) { ?>
			        <div class="col-lg-3">
						<div class="thumbnail">
							<!-- endroit où mettre les images venue de la database --> 
	            			<a href="#"> <?php echo '<img src=  '.$tableautout[$i]['photos_item'].' width=20, height=154 >' ?> </a>
	              				
	              				<div class="caption">
	              					<br>
									<!-- endroit où mettre nom objet db --> 
					                <h4 class= "ItemTitre" > <?php echo $tableautout[$i]['nom_item']?> </h4>
	            				
	            				</div>

	            				<form method="post" action="">
		            				<input type="submit" class="btn btn-default" value="Supprimer" name="suppression" id="supp"></input>
		      							<?php
		 								if (isset($_POST['suppression'])) 
		            					{	 
								            echo $tableautout[$i]['id_item'];
		            					}
	            					?>
            					</form>
	         			 </div>      
			        </div>
			        <?php $i++ ?>
					<?php } ?>

			    </div>
			</div>