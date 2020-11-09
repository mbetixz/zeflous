<section name="login-box">
	<form action="/auth/login" method="post">
		<h2 align="center">
			<p>Login</p>
		</h2>
		<div class="input">
			<input type="text" name="login" value="" required/>
			<label>Email Address</label>
		</div>
		<div class="input">
			<input type="password" name="password" value="" required/>
			<label>Password</label>
		</div>
		<div class="input">
			<div>
				<button type="submit" name="submit">Login</button>
			</div>
			<p>
				<a href="/auth/recovery">Forgot Password</a>
				<br/>
				<span>Dont have an account? </span><a href="/auth/register">Join Now</a>
			</p>
		</div>
	</form>
</section>