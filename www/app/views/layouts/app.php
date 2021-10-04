<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $params["meta"]["description"]; ?>">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"> 
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
    </style>
    <!-- Custom styles for this template -->
  </head>
<body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><?= $params["meta"]["title"]; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
<div class="container">
<div class="notification"></div>
<div class="pageView">

</div>

</div>
</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
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
Page.callAPI("/<?php $apideger = implode("/",$params["query"]); if($apideger!='/'){echo $apideger;} ?>","post","",function(data){
	document.getElementsByClassName("pageView")[0].innerHTML=data; 
});
}, 
callAPI:function(url,method,query,callback){
Page.API(url,method,query,callback,function(jqXhr, textStatus, errorMessage){
	document.getElementsByClassName("notification")[0].innerHTML='<div class="alert alert-warning alert-dismissible fade show" role="alert"> '+textStatus+" || "+errorMessage+' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';
});
},
API:function(url,method,query,callback,errorcallback=0){
$.ajax({
			url: url,
			method: method,
			data: query,
			crossDomain: true,
			beforeSend: function(xhr) {
				xhr.withCredentials = true;
			},
			success: function(response) {
				setTimeout(function(){ callback(response); window.history.pushState(document.getElementsByClassName("pageView")[0].innerHTML, 'Title', url); }, 0300);
			},
			error: function(jqXhr, textStatus, errorMessage) {
				if(errorcallback!=0){
					setTimeout(errorcallback(jqXhr, textStatus, errorMessage), 0300);
				}
			}
});
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