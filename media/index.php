<?php require_once("includes/db_config.php"); ?>

<?php require("includes/header.php"); ?>

<div id="wrapper">

<div id="menu">
<ul>
<li><a class="current" href="index.php">Hjem</a></li>
<li><a href="meny.php">Meny</a></li>
<li><a href="kontakt.php">Kontakt</a></li>
</ul>
</div>

<div id="header">
<div id="bar"></div>
<img src="media/logo_orig_top.png" alt="logo" />
<img src="media/logo_orig_bott.png" alt="logo" />
</div><!-- End header -->

<div id="content">
<div class="box">
<h2>Sorada's</h2>
<p>Sorada's Thai Take Away leverer Thai mat av topp kvalitet fra vår vogn ved Heiane Storsenter.<br />
Vi har 21 forskjellige retter og velge mellom. Ta en titt på vår <a href="meny.php">meny</a> og velg blant våre retter.<br />
Har du ikke smakt Sorada's Thai Take Away mat før, anbefaler vi at du prøver rett nr 1-7 og nr 12 til å begynne med.
Du kan forhånds bestille på<br />
tlf <strong>40 10 7000</strong>. Maten din er klar på 5-10min. Vi har også veldig hyggelige priser, du får en hel middag fra 55kr. Se i vår <a href="meny.php">meny</a> for priser.
</p>
</div>

<div class="box">
<h2>Sawadee</h2>
<p>Sorada og jentene møter deg alltid med et smil uansett hvor travle vi er.
<img src="media/annsatte.jpg" alt="våre annsatte" />
Sorada's består av 4 hyggelige jenter, som lager de beste Thailandske retter. Vår mat er laget etter Thailandsk tradisjon og vi bruker Thailandske ingredienser. Kom og besøk vår bod i <a href="kontakt.php#open" title="Åpningstider">åpningstiden</a></p>
</div>

<div class="box">
<h2>Catering</h2>
<p>Vi leverer også <strong>Thai catering</strong>, du kan bestille mat til alle eventer. Har du en forespørsel om catering så bruk vårt 
<a href="kontakt.php#catering">kontakt skjema</a> og vi kontakter deg snarest med et uforpliktende tilbud. Vår catering er spennede smakfull og fargerik.
<img src="media/bod.jpg" alt="vår bod" />
</p>
</div>
<br class="clear" />
</div><!-- End content -->


<div id="feedback">
<h2>Hva sier våre Kunder</h2>
<?php
$action = mysql_query("SELECT * FROM feedback ORDER BY id DESC LIMIT 0,4");
while($row= mysql_fetch_array($action)){
	echo "<div class='fbox'>";
	echo "<p class='comment'><img class='openq' src='media/quote_open.png' alt='quote'>".$row['comment']."<img class='closeq' src='media/quote_close.png' alt='quote'></p>";
	echo "<p class='name'>".$row['name']."</p>";
	echo "</div>";
	}
mysql_close($con);
?>
<br class="clear" />
</div><!-- End feedback -->

<?php require("includes/footer.php"); ?>

</div><!-- End wrapper -->
</body>
</html>
