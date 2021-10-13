<div class="pageView">
<div class="menu">

</div>
<div class="PHPnews">
<div class="row">

<?php
    $categories = (new \App\models\news)->all()->return();
	if(is_array($categories) && count($categories)>0){ 
    $i=0;
    foreach($categories as $val){
	print_r($val);
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
    }}else{
		echo 'Henüz Haber Eklenmemiş...';
	}

?>


</div>
</div>
</div>