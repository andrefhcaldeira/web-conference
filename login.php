<?php include ("inc/top.inc.php");?>
	<div class="forms">
		<h1>Login</h1>
		<form action='home.php' method='post'>
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
	</div>
<?php include ("inc/bot.inc.php");?>