<div class="card" style="margin:10px 0;">
<div class="card-body" style="text-align:left;">
<h5 class="card-title">Haber Ekle</h5>
 

  <div class="form-group">
    <label for="form_newstitle">Haber Başlığı</label>
    <input type="email" class="form-control" id="form_newstitle" aria-describedby="emailHelp" placeholder="Başlık">
  </div>
  <div class="form-group">
    <label for="form_newsimage">Haber Görsel URL</label>
    <input type="email" class="form-control" id="form_newsimage" aria-describedby="emailHelp" placeholder="URL">
  </div>
  <div class="form-group">
    <label for="form_newstitle">Haber Açıklaması</label>
    <input type="email" class="form-control" id="form_newsdescription" aria-describedby="emailHelp" placeholder="Açıklama">
  </div>
  <div class="form-group">
    <label for="form_newscontent">Haber İçeriği</label>
    <textarea class="form-control" id="form_newscontent" rows="3"></textarea>
  </div>
  <div class="form-group">
    <div for="form_newscategories">Haber Kategorisi</div>
    <div>
    <select class="custom-select my-1 mr-sm-2" id="form_newscategories">
    <option selected>Seçin...</option>
    <?php
    $categories = (new \App\models\news_categories)->all()->return();
    $id=0;
    foreach($categories as $val){
    ++$id;
    ?>
    <option value="<?php echo $val['id']; ?>"><?php echo $val['title']; ?></option>
    <?php 
    }
    ?>
   </select>
  </div>
  </div>

  <button type="submit" class="btn btn-primary my-1" onclick='Page.callAPI("/panel/news/newsAdd","post",
                "title="+document.getElementById("form_newstitle").value+"&"+
                "imageURL="+document.getElementById("form_newsimage").value+"&"+
                "description="+document.getElementById("form_newsdescription").value+"&"+
                "content="+document.getElementById("form_newscontent").value+"&"+
                "categoryID="+document.getElementById("form_newscategories").value+"&"
                ,0,0);'>Gönder</button>
 
</div></div>