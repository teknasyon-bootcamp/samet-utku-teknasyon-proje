<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $params["meta"]["description"]; ?>">
	<meta name="robots" content="<?= $params["meta"]["robots"]; ?>">

    <title><?= $params["meta"]["title"]; ?></title>
    <!-- Bootstrap core CSS -->
	<link href="http://localhost/lib/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Favicons -->  
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  /* Custom page CSS
		-------------------------------------------------- */
		/* Not required for template or sticky footer method. */

		main > .container {
		  padding: 60px 15px 0;
		} 
		.pageView{text-align:center;}
    </style>
    <!-- Custom styles for this template -->
  </head>
<body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href='javascript:Page.callAPI("/","post","");'><?= $params["meta"]["title"]; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href='javascript:Page.callAPI("/","post","");'>Home</a>
          </li>
          <?php if((new \Core\middleware\auth)->rule(["permissions"=>["membership"]])){ ?>
          <li class="nav-item">
            <a class="nav-link" href='javascript:Page.callAPI("/panel","post","");'>Panel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='javascript:Page.callAPI("/logout","post","");'>Logout</a>
          </li>
          <?php }else{ ?> 
          <li class="nav-item">
            <a class="nav-link" href='javascript:Page.callAPI("/signin","post","");'>Sign In</a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href='javascript:Page.callAPI("/signup","post","");'>Sign Up</a>
          </li>
          <?php } ?>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>
<main class="flex-shrink-0">
<div class="container">
<div class="notification"></div>
<div class="pageView"><div class="spinner-border text-primary"></div></div>
</div>
</main>
<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">Teknasyon<span>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="http://localhost/lib/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
// Page & API Viewer
Page = {
AppURL: "localhost",
start:function(){
/* Jarvis: Welcome Again /<?php echo implode("/",$params["query"]); ?> */
Page.callAPI("/<?php $apideger = implode("/",$params["query"]); if($apideger!='/'){echo $apideger;} ?>","post","");
}, 
callAPI:function(url,method,query,callback=0,redirect=1){
Page.API(redirect,url,method,query,callback,0);
},
API:function(redirect=1,url,method,query,callback=0,errorcallback=0){
$.ajax({
			url: url,
			method: method,
			data: query,
			crossDomain: true,
			beforeSend: function(xhr) {
				xhr.withCredentials = true;
			},
			success: function(response) {
			setTimeout(function(){ 
				if(callback!=0){
					callback(response); 
				}else{
					Page.CallBack(response); 
				}

        if(redirect==1){
				window.history.pushState(document.getElementsByClassName("pageView")[0].innerHTML, response["meta"]["title"], url); 
        }
      }, 0300);
			},
			error: function(jqXhr, response, errorMessage) {
        console.log(jqXhr);
				if(errorcallback!=0){
					setTimeout(errorcallback(jqXhr, response, errorMessage), 0300);
				}else{

          document.getElementsByClassName("pageView")[0].innerHTML =  '<div class="card text-center"> <div class="card-header"> '+response+' </div> <div class="card-body"> <h5 class="card-title">'+errorMessage+'</h5> </div> </div>';
          if(redirect==1){
          window.history.pushState(document.getElementsByClassName("pageView")[0].innerHTML, "Error", url); 
          }
        }
        
			}
});
},
CallBack:function(data){
  console.log(data);
if(data["meta"]!=null){
  this.Meta(data["meta"]);
}
if(data["html"]!=null){
  this.html(data["html"]);
}

if(data["notice"]!=null){
  this.notice(data["notice"]);
}


if(data["script"]!=null){
  this.script(data["script"]);
}

},
html:function(data){
document.getElementsByClassName("pageView")[0].innerHTML=data;
},	
Meta:function(data){
document.title = data["title"];
document.getElementsByTagName('meta')["description"].content = data["description"];
document.getElementsByTagName('meta')["robots"].content = data["robots"];
},	
script:function(command){
eval(command); 
},
notice:function(data){
alert(data);
}
}
Page.start();
window.onpopstate = function(e){ 
    if(e.state){ 
	document.getElementsByClassName("pageView")[0].innerHTML = e.state;
    }
};
</script>
</body>
</html>