<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	

<!--===============================================================================================-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
<!--===============================================================================================-->
<link href="css/fontawesome/css/all.css" rel="stylesheet">
<link href="css/fontawesome/js/all.css" rel="stylesheet">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login-util.css">
	<link rel="stylesheet" type="text/css" href="css/login-main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/login.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input row" data-validate = "Veuillez saisir votre adresse mail">
                        <i class="fas fa-user col-md-1 mt-3"></i>
						<input class="input100 col" type="text" name="email" placeholder="Veuillez saisir votre adresse email">
						
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					
					</div>

					<div class="wrap-input100 validate-input row" data-validate="Entrez votre mot de passe ">
                        <i class="fas fa-lock col-md-1 mt-3"></i>
						<input  type="password" name="password" class="input100 col  @error('password') is-invalid @enderror" placeholder="Entrez votre mot de passe">
					
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Se souvenir de moi
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="btn btn-outline-warning">
							Connexion
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Mot de passe oublié ?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
  
<!--===============================================================================================-->

<!--===============================================================================================-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="js/login-main.js"></script>

</body>
</html>