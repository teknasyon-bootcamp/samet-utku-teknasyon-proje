<div class="pageView">
<div class="menu">

</div>
<div class="PHPnews"><h1 class="display-3">News: bursa-haberleri </h1> 
<div class="row">
<?php 
for($i=1; $i<rand(10,21); $i++){ ?>
			 			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
                        
						<div class="title">
							<h4>Haber <?php echo $i; ?></h4>
							<h5>Kategori bursa-haberleri </h5>
						</div>
                        
						<div class="text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>
                        
						<a href='javascript:Page.callAPI("/haber/<?php echo $i; ?>","post","",function(data){ document.getElementsByClassName("pageView")[0].innerHTML=data; });'>Learn More</a>
                        
					 </div>
				</div>	 
<?php } ?>
			 		</div></div>
<style>
body{
    background: #eee;
}
span{
    font-size:15px;
} 
.box{
    padding:60px 0px;
}

.box-part{
    background:#FFF;
    border-radius:0;
    padding:60px 10px;
    margin:30px 0px;
}
.text{
    margin:20px 0px;
}

.fa{
     color:#4183D7;
}
</style></div>