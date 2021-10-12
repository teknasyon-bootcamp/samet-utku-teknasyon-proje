<div class="card" style="margin:10px 0;">
<div class="card-body" style="text-align:left;">
<h5 class="card-title">Haber Kategorileri</h5>

<div>
<div class="form-group"> 
<label for="add_category">Kategori ID</label>
<input type="text" class="form-control" id="categoryTitle" placeholder="Kategori Adı">
</div>
<button type="submit" class="btn btn-primary" onclick='Page.callAPI("/panel/news/categoryAdd","post",
                "categoryTitle="+document.getElementById("categoryTitle").value+"&"
                ,0,0);'>Ekle</button>
</div>
</div></div>