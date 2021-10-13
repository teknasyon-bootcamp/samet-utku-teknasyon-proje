<div class="card" style="margin:10px 0;">
<div class="card-body" style="text-align:left;">
<h5 class="card-title">Kullanıcı Listesi</h5>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ad</th>
      <th scope="col">Mail</th>
      <th scope="col">Yetkisi</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $categories = (new \App\models\users)->all()->return();
    $i=0;
    foreach($categories as $val){
    ++$i;
    ?>
     <tr>
      <th scope="row"><?php echo $val["id"] ?> <input type="hidden" id="usereditid_<?php echo $val["id"] ?>" value="<?php echo $val["id"] ?>"> </th>
      <td scope="col"><input type="text" id="usereditname_<?php echo $val["id"] ?>" value="<?php echo $val["name"] ?>"></td>
      <td scope="col"><input type="text" id="usereditmail_<?php echo $val["id"] ?>" value="<?php echo $val["mail"] ?>"></td>
      <td scope="col"><input type="text" id="usereditrole_<?php echo $val["id"] ?>" value="<?php echo $val["roleID"] ?>"></td>


      <td scope="col">
    <button type="button" class="btn btn-primary" onclick='Page.callAPI("/panel/user/update","post", 
                "id="+document.getElementById("usereditid_<?php echo $val["id"] ?>").value+"&"+
                "name="+document.getElementById("usereditname_<?php echo $val["id"] ?>").value+"&"+
                "mail="+document.getElementById("usereditmail_<?php echo $val["id"] ?>").value+"&"+
                "role="+document.getElementById("usereditrole_<?php echo $val["id"] ?>").value+"&"
                ,0,0);'>Güncelle</button>
      <button type="button" class="btn btn-primary" onclick='Page.callAPI("/panel/user/delete","post", 
                "id="+document.getElementById("usereditid_<?php echo $val["id"] ?>").value+"&"+
                "name="+document.getElementById("usereditname_<?php echo $val["id"] ?>").value+"&"+
                "mail="+document.getElementById("usereditmail_<?php echo $val["id"] ?>").value+"&"+
                "role="+document.getElementById("usereditrole_<?php echo $val["id"] ?>").value+"&"
                ,0,0);'>Sil</button>
    </td>
    </tr>
    <?php 
        }
    ?>
  </tbody>
</table>

</div></div>