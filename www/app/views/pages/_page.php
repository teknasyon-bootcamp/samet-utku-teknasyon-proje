<div class="pageView">
<div class="menu">
<?php 
/* Category List */
$categories = (new \App\models\news_categories)->all()->return();
foreach($categories as $val){ 
?>
<a href="/category/<?php echo $val["id"]; ?>" class="btn btn-success">#<?php echo $val["title"]; ?></a>
<?php } ?>
</div>
<div class="PHPnews">
<div class="row">

<?php 
	if(!empty($params["categoryInfo"]["id"])){
	$categories = (new \App\models\news)->find(["categoryID"=>$params["categoryInfo"]["id"]])->return();
	}else{
    $categories = (new \App\models\news)->all()->return();
	}
	if(is_array($categories) && count($categories)>0){ 
    $i=0;
    foreach($categories as $val){
    ++$i;
    ?>
	<div class="col-sm-6">
    <div class="card" style="margin:15px;">
  	<img src="<?php echo $val["imageURL"]; ?>" class="card-img-top" alt="<?php echo $val["title"]; ?>">
  	<div class="card-body">
    <h5 class="card-title"><?php echo $val["title"]; ?></h5>
    <p class="card-text"><?php echo $val["description"]; ?></p>
	<?php 
		$category_info = (new \App\models\news_categories)->find(["id"=>$val["categoryID"]])->return(0);
	?>
	<a href="/category/<?php echo $category_info["id"]; ?>" class="btn btn-success">#<?php echo $category_info["title"]; ?></a>
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