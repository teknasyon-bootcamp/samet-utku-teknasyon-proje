<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign Up Panel</h5> 
			        <div class="form-floating mb-3">
                <input type="text" class="form-control" id="post_name" placeholder="Name">
                <label for="post_name">Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="post_mail" placeholder="name@example.com">
                <label for="post_mail">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control password" id="post_password" placeholder="Password">
                <label for="post_password">Password</label>
              </div>
			  <div class="form-floating mb-3">
                <input type="password" class="form-control" id="post_password2" placeholder="Password">
                <label for="post_password2">Confirm Password</label>
              </div>			
			        <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" onclick='Page.callAPI("/members/signup","post",
                "post_name=\""+document.getElementById("post_name").value+"\"&"+
                "post_mail=\""+document.getElementById("post_mail").value+"\"&"+
                "post_password=\""+document.getElementById("post_password").value+"\"&"+
                "post_password2=\""+document.getElementById("post_password2").value+"\"&"
                ,0,0);'>Sign up</button>
              </div>
              <hr class="my-4">  
			  
          </div>
        </div>
      </div>
    </div>
  </div>
<style>
body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

.btn-google {
  color: white !important;
  background-color: #ea4335;
}

.btn-facebook {
  color: white !important;
  background-color: #3b5998;
}
.d-grid{margin:10px 0;}
</style>
