<?php include ("inc/top.inc.php");
include("content_fetch.php");

?>
	<div class="forms">
		<span class="form-title">Register</span>
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
			<input type='submit' value='Register'>
			</p>
		</form>
	</div>
<?php include ("inc/top.inc.php");?>