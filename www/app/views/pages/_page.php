<div class="pageView">
<div class="menu">

</div>
<div class="PHPnews"><h1 class="display-3">News: bursa-haberleri </h1> 
<div class="row">


	<?php
    $categories = (new \App\models\news)->all()->return();
    $i=0;
    foreach($categories as $val){
    ++$i;
    ?>
	<div class="col-sm-6">
    <div class="card" style="width: 18rem;">
  	<img src="<?php echo $val["imageURL"]; ?>" class="card-img-top" alt="<?php echo $val["title"]; ?>">
  	<div class="card-body">
    <h5 class="card-title"><?php echo $val["title"]; ?></h5>
    <p class="card-text"><?php echo $val["description"]; ?></p>
	<a href="/news/<?php echo $val["id"]; ?>" class="btn btn-primary">Görüntüle</a>
  </div>
  </div>
  </div>
    <?php 
    }
    ?>


</div></div>
</div>