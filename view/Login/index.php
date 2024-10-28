<style>
	#leftcol{
		border-right: solid grey 1px;
	}
	
	input {
		text-align: center;
		max-width: 80%;
		margin: auto;
	}
	
	button {
		width: 80%;
	}
	</style>
	
	<script>
		function passCheck() {
		  const password = document.querySelector('input[name=password]');
		  const confirm = document.querySelector('input[name=confirmPassword]');
		  if (confirm.value === password.value) {
			confirm.setCustomValidity('');
		  } else {
			confirm.setCustomValidity('Passwords do not match');
		  }
		}
		
		function usernameCheck() {
			const username = document.querySelector('input[name=name]');
			if(username.value.includes(" ")) {
			   username.setCustomValidity('Username cannot contain spaces');
			}
			else if(username.value.length > 25) {
				username.setCustomValidity('Username must be less than 25 characters');
			}
			else{
			   username.setCustomValidity('');
			}
			
		}
		
		function ucFirst(string) {
		  return string.charAt(0).toUpperCase() + string.slice(1);
		}
		
		function conc(string, string2) {
			if(string === "") {
				return "password " + string2;
			}
			else {
				return string + " and " + string2;
			}
		}
		
		function passwordCheck() {
			const pass = document.querySelector('input[name=password]');
			let error = "";
			if(pass.value.length < 8) {
				error = conc(error, "must be 8 characters or more ");
			}
			if(!(/\d+/.test(pass.value))) {
				error = conc(error, "must contain at least one number ");
			}
			if(!(/[a-zA-Z]+/.test(pass.value))) {
				error = conc(error, "must contain at least one letter ");
			}
			if(!(/[$&+,:;=?@#|'<>.^*()%!-]+/.test(pass.value))) {
				error = conc(error, "must contain at least one special character ");
			}
			
			if(error === "") {
				pass.setCustomValidity('');
			}
			else {
				pass.setCustomValidity(ucFirst(error));
			}
		}
	</script>
	
	<div class="container">
		<div class="row">
		<div class="col-md-11">
			<div class="row">
				<div class="col-md text-center" id="leftcol">
					<h1>Log in</h1>
					<br>
					<form method="POST" action="<?=WEBROOT2;?>/login">
					  <div class="form-group">
						<label for="login">Username/Email address</label>
						<input type="text" class="form-control" id="login" name="login" placeholder="xx_darkusername_xx/example@email.com" required>
					  </div>
					  <br>
					  <div class="form-group">
						<label for="loginpassword">Password</label>
						<input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="********" required>
					  </div>
					  
					  <br>
					  <button type="submit" class="btn btn-outline-primary" name="button" value="login">Login</button>
					</form>
				</div>
				
				
				<div class="col-md text-center">
					<h1>Sign up</h1>
					<br>
					<form Method="POST" action="<?=WEBROOT2;?>/login">
					  <div class="form-group">
						<label for="name">Username<small class="text-muted"><br>(must be less than 25 characters)</small></label>
						<input type="text" class="form-control" id="name" name="name" placeholder="xx_darkusername_xx" onchange="usernameCheck()" required>
					  </div>
					  <br>
					  <div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
					  </div>
					  <br>
					  <div class="form-group">
						<label for="password" style="max-width: 80%;">Password<br><small class="text-muted">(must be 8 or more characters and include at least a letter, at least a number and at least a <abbr title="Special characters are the following : $&+,:;=?@#|'<>.^*()%!-">special character</abbr>) </small></label>
						<input type="password" class="form-control" id="password" name="password" placeholder="********" onChange="passCheck(); passwordCheck();" required>
					  </div>
					  <br>
					  <div class="form-group">
						<label for="confirmPassword">Confirm password</label>
						<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="********" onChange="passCheck()" required>
					  </div>
					  <br>
					  <button type="submit" class="btn btn-primary" name="button" value="signup">Create an account</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<h2>Important :</h2>
			<p>By creating an account on our website, you allow us to store your email, your username and your password.</p>
			<p>Passwords are encrypted using SHA-256 <a href="https://en.wikipedia.org/wiki/Cryptographic_hash_function" target="_blank" title="Wikipedia">hash algorthm</a>,
			which is also the algorithm used for the encryption of the Bitcoin blockchain.</p>
		</div>
	</div>
	</div>
	<br>