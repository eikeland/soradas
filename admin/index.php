<?php
if($_GET['msg']){
	$msg = $_GET['msg'];
	}
?>
<?php require("header.php"); ?>

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
<h1>Logg inn</h1>
<?php if(isset($msg)) echo "<p class='msg'>$msg</p>"; ?>
<form id="loginform" action="../includes/form_action.php" method="post">
<label for="username">Brukernavn:</label>
<input type="text" id="username" name="username" />

<label for="password">Passord:</label>
<input type="password" id="password" name="password" />

<input type="submit" name="submitLogin" value="Logg inn" />
</form>
<br class="clear" />
</div><!-- End contact -->

<br class="clear" />
</div><!-- End feedback -->

<?php require("../includes/footer.php"); ?>

</div><!-- End wrapper -->
</body>
</html>
