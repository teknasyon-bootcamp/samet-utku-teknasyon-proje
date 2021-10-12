<div class="card" style="margin:10px 0;">
<div class="card-body" style="text-align:left;">
<h5 class="card-title">Haber Listesi</h5>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Başlık</th>
      <th scope="col">Görsel</th>
      <th scope="col">Açıklama</th>
      <th scope="col">İçerik</th>
      <th scope="col">Kategori</th>
      <th scope="col">Tarih</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $categories = (new \App\models\news)->all()->return();
    $i=0;
    foreach($categories as $val){
    ++$i;
    ?>
     <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td scope="col"><?php echo $val["title"] ?></td>
      <td scope="col"><a href="<?php echo $val["imageURL"] ?>"><img src="<?php echo $val["imageURL"] ?>" style="max-width:250px;height:auto;"></a></td>
      <td scope="col"><?php echo $val["description"] ?></td>
      <td scope="col"><?php echo $val["content"] ?></td>
      <td scope="col"><?php echo $val["categoryID"] ?></td>
      <td scope="col"><?php echo $val["update_at"] ?></td>
      <td scope="col"><button type="button" class="btn btn-primary" onclick='Page.callAPI("/panel/news/newsDelete","post", "id=<?php echo $val["id"] ?>" ,0,0);'>Sil</button></td>
    </tr>
    <?php 
        }
    ?>
  </tbody>
</table>

</div></div>