<?php require('includes/header.php') ?>
</head>
<body>
	<div class="container">
	    <div class="row justify-content-center">
	      <div class="col-xl-6 col-lg-6 col-md-6">
	        <div class="card o-hidden border-0 shadow-lg my-5">
	          <div class="card-body p-0">
	            <div class="row">
	              <div class="col-lg-12  col-md-12 col-sm-12">
	                <div class="p-5">
	                  <div class="text-center">
	                    <h1 class="h4 text-gray-900 mb-4">Aponta Horas</h1>
	                  </div>
	                  <form class="user" action="/login/sing_in" method="POST">
	                    <div class="form-group">
	                      <input type="text" class="form-control form-control-user" id="user-input" placeholder="Username" name="user" required="">
	                    </div>
	                    <div class="form-group">
	                      <input type="password" class="form-control form-control-user" id="pass-input" placeholder="Password" name="pass" required="">
	                    </div>
	                    <button type="submit" class="btn btn-primary btn-user btn-block">
	                      Login
	                    </button>
	                    <hr>
	                    <span class="has-error">
	                    	<?php echo isset($msg) ? $msg : "" ?>
	                    	<?php echo isset($_GET['msg']) ? $_GET['msg'] : "" ?>
	                    </span>
	                  </form>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
  	</div>
</body>
<footer>
	<?php require('includes/footer.php') ?>
</footer>
</html>