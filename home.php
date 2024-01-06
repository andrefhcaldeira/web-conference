<?
include ("inc/autentica.inc.php");
include ("inc/top.inc.php");

$sql = "SELECT * FROM tasks";
$result = $db->query($sql);
?>
<section>
<main>
    <h1>Tasks</h1>
    <? while($row = $result->fetch_assoc()) { ?>
    <ul>
        <? if ($row["done"]) $class="class='done'"; else $class=""; ?>
        <li><b <?=$class ?>><?= $row["name"] ?></b><br>
        <?= $row["description"] ?><br>
        <small><? include ("inc/claps.inc.php") ?></small>

        <a href="do_done.php?id=<?=$row["id"]?>">done</a>
        <a href="do_clap.php?id=<?=$row["id"]?>" >clap</a>
        </li>
    </ul>

<? } ?>

</main>
<aside>
    <h2>new task</h2>
    <form action='do_insert.php' method='post'>
			<p>
				<label>Task:</label>
				<input type='text' name='name' required>
			</p>
			<p>
				<label>Description:</label>
				<textarea name="description"></textarea>
			</p>
			<p>
			<input type='submit' value='insert'>
			</p>
	</form>
</aside>
</section>



<?
include ("inc/bot.inc.php");

