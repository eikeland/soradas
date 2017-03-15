<?php session_start(); ?>

<?php require("includes/header.php"); ?>

<div id="wrapper">



<div id="menu">
<ul>
<li><a href="index.php">Hjem</a></li>
<li><a href="meny.php">Meny</a></li>
<li><a href="nytt.php">Nytt</a></li>
<li><a class="current" href="kontakt.php">Kontakt</a></li>
</ul>
</div>

<div id="header">
<div id="bar"></div>
<img src="media/logo_orig_top.png" alt="logo" />
<img src="media/logo_orig_bott.png" alt="logo" />
</div><!-- End header -->

<div class="cont">
<h1>Kontakt Sorada's</h1>
<p>Du kan bestille mat slik at den er klar når du kommer. Alt du trenger å gjøre er og velge en rett i <a href="meny.php" title="finn en rett i menyen">menyen,</a>
 og ringe <strong>40 10 7000</strong> så er maten klar på 5-10 minutter.<br />
 Vår adresse er Ringveien 44 ved <a href="www.heianestorsenter.no/" target="_blank">Heiane Storsenter</a>.</p>

<h2 id="open">Åpningstid</h2>
<table border="0">
<tr>
<td>Mandag - Fredag</td>
<td>11:00 - 20:00</td>
</tr>
<tr>
<td>Lørdag - Søndag</td>
<td>13:00 - 20:00</td>
</tr>
</table>


<h2>Ris og Ros</h2>
<p>Har du prøvd en rett du liker i menyen, er du fornøyd med vår service, syns du vi kan bli flinkere på noen områder?
Da kan du legge igjen en kommentar i skjemaet nedenfor, Vi setter stor pris på alle tilbakemeldinger.</p>

<h2>Thai Buffet</h2>
<p>Vi tilbyr også Sorada's Thai Buffet til alle eventer. Har du spørsmål eller vil bestille så bruk kontakt skjemaet, eller send en epost til <a href="mailto:Jørn Kenneth Myhre<soradas@soradas.no>">soradas@soradas.no</a></p>

<h2>Kontakt skjema</h2>
<form id="catering" method="post" action="includes/form_action.php">
<?php
if(isset($_SESSION['msg'])){
	echo "<p class='msg'>".$_SESSION['msg']."</p>";
	}
else{
	echo"<p class='msg'>Venligst fyll ut alle felter</p>";
	}
?>
<input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" />

<label for="name">Navn:</label>
<input type="text" id="name" name="name" <?php if(isset($_SESSION['name'])) echo "value='".$_SESSION['name']."'"; ?> />

<label for="email">Epost:</label>
<input type="email" id="email" name="email"  <?php if(isset($_SESSION['email'])) echo "value='".$_SESSION['email']."'"; ?> />

<label for="message">Melding:</label>
<textarea id="message" name="message"><?php if(isset($_SESSION['message'])) echo $_SESSION['message'] ?></textarea>

<p class="msg">Sikkerhetsspørsmål:</p>
<label for="checkH">Menneske</label>
<input type="checkbox" id="checkH" name="checkH" value="human" />

<label for="checkR">Robot</label>
<input type="checkbox" id="checkR" name="checkR" value="robot" />

<input type="submit" name="submitEmail" value="Send Epost" />
</form>

</div><!-- End cont -->

<?php require("includes/footer.php"); ?></div>