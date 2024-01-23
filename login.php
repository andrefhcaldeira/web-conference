<?php include("inc/top.inc.php"); 
include("content_fetch.php");
?>
<main>
	<div class="forms">
		<span class="form-title">Login</span>
		<form action='index.php' method='post'>
			<p>
				<label>Username:</label>
				<input type='text' name='user'>
			</p>
			<p>
				<label>Password:</label>
				<input type='password' name='pass'>
			</p>
			<p>
				<input type='submit' value='login'>
			</p>
		</form>
		<a href="register.php">
			<p>Don't have an account?</p>
		</a>
	</div>
</main>
<?php include("inc/bot.inc.php"); ?>