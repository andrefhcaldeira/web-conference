<?php include ("inc/top.inc.php");?>
	<div class="forms">
		<h1>Register</h1>
		<form action='do_register.php' method='post'>
			<p>
				<label>Email:</label>
				<input type='email' name='email' required>
			</p>
			<p>
				<label>Username:</label>
				<input type='text' name='user' required>
			</p>
			<p>
				<label>Password:</label>
				<input type='password' name='pass' required>
			</p>
			<p>
			<input type='submit' value='register'>
			</p>
		</form>
	</div>
<?php include ("inc/top.inc.php");?>