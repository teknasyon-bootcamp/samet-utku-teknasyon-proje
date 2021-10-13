<div class="container">
<div class="card" style="margin:10px 0;">
<div class="card-header">
<h4><?php echo $params["news_data"]["title"]; ?></h4>
  </div>
  <div class="card-body"> 
  <img src="<?php echo $params["news_data"]["imageURL"]; ?>" alt="<?php echo $params["news_data"]["title"]; ?>" style="max-height:200px;max-width:500px !important;">
  
    <h2><?php echo $params["news_data"]["description"]; ?></h2>
    <p class="card-text"><?php echo $params["news_data"]["content"]; ?></p>
    <p><?php echo $params["news_data"]["update_at"]; ?></p>
  </div>
</div>
<div class="card" style="margin:10px 0;">
<div class="card-header">
Yorumlar
  </div>
  <div class="card-body"> 
  <div class="form-group">
    <label for="form_adiniz">Adınız</label>
    <input type="text" class="form-control" id="form_name" placeholder="Adınız">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Yorumunuz</label>
    <textarea class="form-control" id="form_comment" rows="3" placeholder="Yorum Yazın"></textarea>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary m-1" onclick='Page.callAPI("/api/comments/add","post", "name="+document.getElementById("form_name").value+"&"+
  "comment="+document.getElementById("form_comment").value+"&"+
  "newsID=<?php echo $params["news_data"]["id"]; ?>&" ,0,0);'>Gönder</button>
  </div>
  <h5 class="card-title">Yorumlar</h5>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Tarih</th>
      <th scope="col">İsim</th>
      <th scope="col">Yorum</th>
      <th scope="col">Tarih</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $comments = (new \App\models\comments)->find(["newsID"=>$params["news_data"]["id"]])->return();
    $i=0;
    foreach($comments as $val){
    ++$i;
    ?>
     <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td scope="col"><?php echo $val["name"] ?></td>
      <td scope="col"><?php echo $val["comments"] ?></td>
      <td scope="col"><?php echo $val["updated_at"] ?></td>
    </tr>
    <?php 
        }
    ?>
  </tbody>
</table>
  </div>
</div>
</div>