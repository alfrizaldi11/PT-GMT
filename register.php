<!DOCTYPE html>
<html lang="en">
  
 <head>
    <meta charset="utf-8">
    <title>Register</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>

<body>
	
	<div class="container">
		<br>  
		<hr>
		
		<div class="row justify-content-center">
			<div class="col-md-6">
			<div class="col-md-6 d-none d-sm-block">
					<img src="img/logooo.jpeg" class="img-responsive" alt="" style="margin-left:160px;">
				</div>
				<div class="card">
				<header class="card-header">
					<a href="login.php" class="float-right btn btn-outline-primary mt-1">Login</a>
					<h4 class="card-title mt-2">Register</h4>
				</header>
				<article class="card-body">
				<form action="aksi_register.php" method="post">

					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
					</div> <!-- form-group end.// -->

					<div class="form-group">
						<label>Password</label>
						<input class="form-control" id="password" name="mypassword" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Masukkan Password" required>
					</div> <!-- form-group end.// -->

					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input class="form-control" id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" placeholder="Konfirmasi Password" required>
					</div> <!-- form-group end.// -->

					
					<div class="form-group">
				    <label>Akses</label>
						<select name="akses" class="form-control"required>
							<option value="">-- Pilih Akses --</option>
							<option value="staf">Staf</option>
						</select>
					</div>

					<div class="form-group">
						<label>Kode Unik</label>
						<input type="text" name="kodeUnik" class="form-control" placeholder="Masukkan Kode Unik" required>
					</div> <!-- form-group end.// -->

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"> Register  </button>
					</div> <!-- form-group// -->                                               
				</form>
				</article> <!-- card-body end .// -->
				<div class="border-top card-body text-center">Sudah mempunyai Akun? <a href="login.php">Login</a></div>
				</div> <!-- card.// -->
			</div> <!-- col.//-->
		
		</div> <!-- row.//-->
		
		
	</div> 
		<!--container end.//-->



<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

 </html>
