
<?php \Core\View::render("/menu/panel_menu.php",[]); $userData = \Core\classes\session::get("login");  ?>
<div class="container">
<div>Hoşgeldin: <?php echo $userData["name"]; ?> </div>
<div>Mail Adresin: <?php echo $userData["mail"]; ?> </div>
<div>Rolün: <?php 
$checkRole = (new \App\models\role)
->find([
"id"=>$userData["roleID"]
])
->return(0);
echo $checkRole["name"]; ?> </div>
</div>
