<div class="card">
<div class="card-header">
<?php echo $params["news_data"]["title"]; ?>
  </div>
  <img class="card-img-top" src="<?php echo $params["news_data"]["imageURL"]; ?>" alt="<?php echo $params["news_data"]["title"]; ?>">
  <div class="card-body"> 
    <h1><?php echo $params["news_data"]["title"]; ?></h1>
    <h2><?php echo $params["news_data"]["description"]; ?></h2>
    <p class="card-text"><?php echo $params["news_data"]["content"]; ?></p>
    <p><?php echo $params["news_data"]["update_at"]; ?></p>
  </div>
</div>
<div class="card">
<div class="card-header">
Yorumlar
  </div>
  <div class="card-body"> 
      yorumlarrrr
  </div>
</div>