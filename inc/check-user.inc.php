<? if (@$_SESSION['user']) { ?>
User: <?= $_SESSION['user']; ?> | <a href="home.php?logout=1">logout</a>
<? } else { ?>
<a href="register.php">register</a> | <a href="login.php">login</a>
<? }?>