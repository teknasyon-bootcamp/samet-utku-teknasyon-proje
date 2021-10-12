<div class="card" style="margin:10px 0;">
<div class="card-body" style="text-align:left;">
<h5 class="card-title">Haber Kategorileri</h5>

<div>
<div class="form-group"> 
<label for="add_category">Kategori ID</label>
<input type="text" class="form-control" id="categoryTitle" placeholder="Kategori Adı">
</div>
<button type="submit" class="btn btn-primary" onclick='Page.callAPI("/panel/news/categoryAdd","post", "categoryTitle="+document.getElementById("categoryTitle").value+"&" ,0,0);'>Ekle</button>
</div>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Başlık</th>
      <th scope="col">Tarih</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $categories = (new \App\models\news_categories)->all()->return();
    $id=0;
    foreach($categories as $val){
    ++$id;
    ?>
     <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $val["title"] ?></td>
      <td><?php echo $val["updated_at"] ?></td>
      <td><button type="button" class="btn btn-primary" onclick="">Sil</button></td>
    </tr>
    <?php 
        }
    ?>
  </tbody>
</table>




</div>
</div>