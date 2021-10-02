<h1 class="display-3">News: <?= $params["query"][2]; ?> </h1> 
<div class="row">
			 <?php for($i=0; $i<rand(10,15); $i++){ ?>
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
                        
						<div class="title">
							<h4>Haber <?php echo $i; ?></h4>
							<h5>Kategori <?php echo $params["query"][2]; ?> </h5>
						</div>
                        
						<div class="text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>
                        
						<a href="#">Learn More</a>
                        
					 </div>
				</div>	 
			 <?php } ?>
		</div>