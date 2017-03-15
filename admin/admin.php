<?php
if(!isset($_COOKIE['log'])){
	header("Location:index.php?msg=Du er ikke logget inn");
	}
if($_GET['msg']){
	$msg = $_GET['msg'];
	}
if($_GET['msgC']){
	$msgC = $_GET['msgC'];
	}
if($_GET['cname']){
	$cname = $_GET['cname'];
	}
if($_GET['com']){
	$com = $_GET['com'];
	}
?>
<?php require("header.php"); ?>
<?php require_once("../includes/db_config.php"); ?>

<div id="wrapper">

<div id="menu">
<ul>
<li><a class="current" href="../index.php">Hjem</a></li>
<li><a href="../meny.php">Meny</a></li>
<li><a href="../kontakt.php">Kontakt</a></li>
</ul>
</div>

<div id="header">
<div id="bar"></div>
<img src="../media/logo_orig_top.png" alt="logo" />
<img src="../media/logo_orig_bott.png" alt="logo" />
</div><!-- End header -->

<div class="cont">
<h1>Administrer kommentarer</h1>

<form method="post" action="../includes/form_action.php">
<input id="logout" type="submit" name="submitLogout" value="Logg Ut" />
</form>

<h2>kommentarer:</h2>
<?php
if(isset($msg)){
	echo "<p class='msg'>$msg</p>";
	}
$action = mysql_query("SELECT * FROM feedback ORDER BY id DESC");
while($row= mysql_fetch_array($action)){
	echo "<div class='acom'>";
	echo "<form action='../includes/form_action.php' method='post'>";
	echo "<p>".$row['comment']."</p>";
	echo "<p>".$row['name']."</p>";
	echo "<input type='hidden' name='id' value='".$row['id']."'>";
	echo "<input type='submit' name='submitDelete' value='Slett Kommenter'>";
	echo "</form>";
	echo "</div>";
	}
mysql_close($con);
?>

<h2>Legg til kommentar</h2>
<form id="comment" method="post" action="../includes/form_action.php">
<?php echo"<p class='msg'>$msgC</p>"; ?>

<input type="hidden" name="ip" value="<?php $_SERVER['REMOTE_ADDR']; ?>" />

<label for="name">Navn:</label>
<input type="text" id="name" name="name" <?php if($cname){echo "value='$cname'";} ?> />

<label for="comment">Kommentar: <small><em>(Max 100 tegn)</em></small></label>
<textarea id="comment" name="comment" ><?php if($com) echo $com ?></textarea>

<input type="submit" name="submitComment" value="Send Kommentar" />
</form>
<br class="clear" />
</div><!-- End contact -->

<br class="clear" />
</div><!-- End feedback -->

<?php require("../includes/footer.php"); ?>

</div><!-- End wrapper -->
</body>
</html>
