<?php require("includes/header.php"); ?>



<div id="wrapper">

	<div id="menu">

		<ul>

			<li><a href="index.php">Hjem</a></li>

			<li><a class="current" href="meny.php">Meny</a></li>

			<li><a href="nytt.php">Nytt</a></li>

			<li><a href="kontakt.php">Kontakt</a></li>

		</ul>

	</div>



	<div id="header">

		<div id="bar"></div>

		<img src="media/logo_orig_top.png" alt="logo" />

		<img src="media/logo_orig_bott.png" alt="logo" />

	</div><!-- End header -->



	<div id="gallerycont">

		<?php
		$tegn = ",-";

		$menu_items = array(
			array(
				"item" => 1, 
				"title" => "POHPIA", 
				"price" => 79,
				"heading" => "Vårrull 2 stk (Mild i smak):",
				"description" => "Kylling, glassnudler, mais, kål, gulrot, agurkslice. Med ris og sweet chili saus",
				"hot" => FALSE,
				"info" => "Hvete, gluten østers. (fritert i olje som kan inneholde spor av peanøtter og soya)."
			),
			array(
				"item" => 2, 
				"title" => "POHPIA", 
				"price" => 99,
				"heading" => "Vårrull 3 stk (Mild i smak):",
				"description" => "Kylling, glassnudler, mais, kål, gulrot, agurkslice. Med ris og sweet chili saus",
				"hot" => FALSE,
				"info" => "Hvete, gluten østers. (fritert i olje som kan inneholde spor av peanøtter og soya)."
			),
			array(
				"item" => 3, 
				"title" => "KAO PAD GONG", 
				"price" => 129,
				"heading" => "Stekt ris med marinerte ko ngereker:",
				"description" => "Kongereker, ris, egg, gulrot og agurkslice. Med soyasaus",
				"hot" => FALSE,
				"info" => "Egg og skalldyr. (kan inneholde spor av gluten)."
			),
			array(
				"item" => 4, 
				"title" => "KAO PAD GAI", 
				"price" => 119,
				"heading" => "Stekt ris med kylling:",
				"description" => "Kyllingfilet, ris, egg, løk, gulrot og agurkslice. Med soyasaus",
				"hot" => FALSE,
				"info" => "Egg, østers. (kan inneholde spor av gluten)."
			),
			array(
				"item" => 5, 
				"title" => "NUA PAD NAM MAN GAI", 
				"price" => 129,
				"heading" => "Wok med kyllingfilet, grønnsaker og østersaus:",
				"description" => "Kyllingfilet, paprika, brokkoli, løk, gulrot og med ris",
				"hot" => FALSE,
				"info" => "Østers. (spor av gluten)."
			),
			array(
				"item" => 6, 
				"title" => "NUA PAD NAM MAN HOI", 
				"price" => 139,
				"heading" => "Wok med biff, grønnsaker og østersaus:",
				"description" => "Biffkjøtt, brokkoli, løk, gulrot, paprika og med ris",
				"hot" => FALSE,
				"info" => "Østers. (spor av gluten)."
			),
			array(
				"item" => 7, 
				"title" => "GAI PHAT MET MAMUANG", 
				"price" => 139,
				"heading" => "Wok med kylling og cashewnøtter:",
				"description" => "Kyllingfilet, chili, løk, hvitløk, cashewnøtter og med ris",
				"hot" => FALSE,
				"info" => "Cashew nøtter, østers, soya. (gluten)."
			),
			array(
				"item" => 8, 
				"title" => "TOM KAI GAI", 
				"price" => 129,
				"heading" => "Kyllingfilet i kokos:",
				"description" => "Kyllingfilet, kokos, galanga, løk, cherrytomat, vårløk og med ris",
				"hot" => FALSE,
				"info" => "(kan inneholde spor av gluten)."
			),
			array(
				"item" => 9, 
				"title" => "PAD NO MAI SAI GAI", 
				"price" => 129,
				"heading" => "Kylling med chilli og bambus:",
				"description" => "Kyllingfilet, hvitløk, chili, løk, vårløk, bambusslice og med ris",
				"hot" => 12,
				"info" => "Østers. (spor av gluten)."
			),
			array(
				"item" => 10, 
				"title" => "PAD KA PAO HOI", 
				"price" => 129,
				"heading" => "Wok med kvernet oksekjøtt og grønnsaker:",
				"description" => "Oksekjøtt, chili, løk, gulrot, hvitløk, long yard beans, vårløk, basilikum og med ris",
				"hot" => 12,
				"info" => "Østers. (spor av gluten)."
			),
			array(
				"item" => 11, 
				"title" => "SORADA’S STEAK MOO", 
				"price" => 129,
				"heading" => FALSE,
				"description" => "Stekt krydret svinekjøtt, agurk, cherrytomat, med ris og soyasaus",
				"hot" => FALSE,
				"info" => "Østers. (spor av gluten)."
			),
			array(
				"item" => 12, 
				"title" => "GAI TOD (Mild i smak)", 
				"price" => 119,
				"heading" => FALSE,
				"description" => "Sprøstekt kyllingfilet med ris og sweet chilisaus. Kylling, agurkslice, sweet chili saus og med ris",
				"hot" => FALSE,
				"info" => "Østers, gluten. (fritert i olje som kan inneholde spor av peanøtter og soya)."
			),
			array(
				"item" => 13, 
				"title" => "KAENG KHIAO WAN GAI", 
				"price" => 129,
				"heading" => FALSE, 
				"description" => "Kyllingfilet, bambusslice, gulrot, basilikum, kokos, thai green curry, long yard beans og med ris",
				"hot" => 12,
				"info" => "Ingen allergener. (kan inneholde spor av gluten og soya)."
			),
			array(
				"item" => 14, 
				"title" => "KAENG KHIAO WAN GAI", 
				"price" => 129, 
				"heading" => FALSE, 
				"description" => "Kyllingfilet, chili, long yard beans, basilikum, kokus, bambusslice, thai red curry og med ris",
				"hot" => 12,
				"info" => "Ingen allergener. (kan inneholde spor av gluten)."
			),
			array(
				"item" => 15, 
				"title" => "SMÅFOLK MENY", 
				"price" => 70,
				"heading" => FALSE,
				"description" => "Stekt ris med kylling, egg og gulrot Med valgfri Kuli Drikke",
				"hot" => FALSE,
				"info" => "Egg, østers. (spor av gluten)."
			),
			array(
				"item" => 16, 
				"title" => "PAD PRIO WAN", 
				"price" => 134,
				"heading" => "Wok med kongereker og grønnsaker:",
				"description" => "Kongereker, agurk, ananas, paprika i sweet and sour sauce, med ris",
				"hot" => FALSE,
				"info" => "Skalldyr, spor av gluten."
			),
			array(
				"item" => 17, 
				"title" => "GONG CHUP BANG MIT", 
				"price" => 134,
				"heading" => FALSE, 
				"description" => "Innbakte kongereker - friterte, agurkslice, med sweet chili sauce og med ris",
				"hot" => FALSE,
				"info" => "Skalldyr, hvete, gluten. (fritert i olje som kan inneholde spor av peanøtter og soya)."
			),
			array(
				"item" => 18, 
				"title" => "PAT MI SU GAI", 
				"price" => 129,
				"heading" => FALSE,
				"description" => "Nudler med thaimarinert kyllingfilet, gulrot, cherrytomat, kål, paprika Med soyasaus",
				"hot" => FALSE,
				"info" => "Egg, gluten, østers."
			),
			array(
				"item" => 19, 
				"title" => "TOM YUM LUM MIT", 
				"price" => 144,
				"heading" => FALSE,
				"description" => "Kongereker, fisk, kamskjell, lemon grass, galanga, kaffir lime blader, chili, løk, thai yellow curry og med ris",
				"hot" => 12,
				"info" => "Skalldyr, soya."
			),
			array(
				"item" => 20, 
				"title" => "PHANAENG NUEA", 
				"price" => 139,
				"heading" => FALSE,
				"description" => "Biffkjøtt, kokos, chili, løk, eggplant, thai red curry og med ris",
				"hot" => 12,
				"info" => "Ingen allergener. (kan inneholde spor av gluten og soya)."
			),
			array(
				"item" => 21, 
				"title" => "PAKLOAM NEUA", 
				"price" => 139,
				"heading" => FALSE,
				"description" => "Biffkjøtt, minimais, brokkoli, green pepper med Sorada’s spesial saus og med ris",
				"hot" => FALSE,
				"info" => "Østers, gluten."
			),
			array(
				"item" => 22, 
				"title" => "TOM YAM GOONG", 
				"price" => 134,
				"heading" => FALSE,
				"description" => "Kongereker, løk, tomat, lemon leaves, lemon grass, galangal, chili og med ris",
				"hot" => 23,
				"info" => "Skalldyr, soya, fiskesaus."
			),
			array(
				"item" => 23, 
				"title" => "PAD MI SU GOONG", 
				"price" => 129,
				"heading" => FALSE,
				"description" => "Nudler med thaimarinert kongereker, gulrot, kål, paprika, med soyasaus",
				"hot" => FALSE,
				"info" => "Skalldyr, soya, fiskesaus, egg."
			),
			array(
				"item" => 24, 
				"title" => "PAT MI SAI GOONG", 
				"price" => 139,
				"heading" => FALSE,
				"description" => "Kongereker, chili, vårløk, bambusslice, hvitløk, løk og med ris",
				"hot" => 23,
				"info" => "Skalldyr, østers, fiskesaus."
			),
			array(
				"item" => 25, 
				"title" => "THAI MIX", 
				"price" => 129,
				"heading" => FALSE,
				"description" => "Sprøsteikt kyllingfilet, vårrull, steikt ris med grønnsaker, agurk og sweet chili saus til",
				"hot" => FALSE,
				"info" => "Gluten, østers, egg."
			),
			array(
				"item" => 26, 
				"title" => "THAI SATAY MIX", 
				"price" => 129,
				"heading" => FALSE,
				"description" => "aThaimarinert svinekjøtt, vårrull, chili, gurk, med peanøttsaus og med ris",
				"hot" => FALSE,
				"info" => "Peanøtter, soya, gluten."
			),
			array(
				"item" => 27, 
				"title" => "PAD KA PAO GAI", 
				"price" => 129,
				"heading" => FALSE,
				"description" => "Kyllingfilet, basilikum, chili, hvitløk, gulrot, long yard beans, løk og med ris",
				"hot" => 23,
				"info" => "Østers, gluten."
			),
			array(
				"item" => 29, 
				"title" => "PAD PAK ROAM MOO", 
				"price" => 134,
				"heading" => FALSE,
				"description" => "Svinekjøtt, kale, brokkoli, chili, hvitløk, long yard beans og med ris",
				"hot" => 23,
				"info" => "Østers, gluten."
			),
			array(
				"item" => 30, 
				"title" => "MOO PING YANG", 
				"price" => 149,
				"heading" => FALSE,
				"description" => "Grillspyd av svinekjøtt, steikt ris, chili, hvitløksaus og soyasaus",
				"hot" => 1,
				"info" => "Østers, gluten, soya."
			),
			array(
				"item" => 31, 
				"title" => "PAD KEE MAO", 
				"price" => 134,
				"heading" => FALSE,
				"description" => "Kongereker,nudler, løk, long yard beens, gulrot, basilikum, chillie",
				"hot" => 3,
				"info" => "Skalldyr, fiskesaus."
			),
			array(
				"item" => 32, 
				"title" => "PAD THAI GAI", 
				"price" => 124,
				"heading" => FALSE,
				"description" => "Kylling, nudler, egg, løk,gulrot, long yard beens, tamarin, cashew nøtter",
				"hot" => FALSE,
				"info" => "Egg, cashew nøtter."
			),
			array(
				"item" => 33, 
				"title" => "PAD THAI GOONG", 
				"price" => 134,
				"heading" => FALSE,
				"description" => "Kongereker, nudler, egg, løk, gulrot, long yard beens, tanmarin , cashew nøtter",
				"hot" => FALSE,
				"info" => "Skalldyr, fiskesaus, cashew nøtter."
			),
			array(
				"item" => 34, 
				"title" => "THAI SUPER MIX", 
				"price" => 169,
				"heading" => FALSE,
				"description" => "5 satay kylling spyd, 5 nuggets, vårull, innbakt kyllingfilet , sweet chillie og peanut sauce. Steikt ris følger med",
				"hot" => FALSE,
				"info" => "Gluten, soya, østers, peanøtter i saus."
			)
		);

		foreach($menu_items as $item) : ?>

				<div class="gbox">

					<h3><?php echo sprintf("%d. %s", $item["item"], $item["title"]); ?></h3>

					<a class="fancybox" 
						data-title-id="<?php echo "title".$item["item"]; ?>" 
						href="<?php echo sprintf("media/menu/large/nr%d.jpg", $item["item"]) ?>">

					<img src="<?php echo sprintf("media/menu/nr%d.jpg", $item["item"]) ?>" alt="meny rett" /></a>

					<div id="<?php echo "title".$item["item"]; ?>">

						<?php if($item["heading"] !== FALSE) : ?>

							<p class="title"><?php echo sprintf("%d. %s", $item["item"], $item["heading"]); ?></p>
						
						<?php else : ?>
						
							<p class="title"><?php echo sprintf("%d. %s", $item["item"], $item["title"]); ?></p>
						
						<?php endif; ?>

						<p><?php echo $item["description"]; ?></p>

						<?php if( $item["hot"] !== FALSE ) : ?>

							<?php if( $item["hot"] === 1 ) : ?>

								<p><img class="hot" src="media/menu/hot.png" alt="hot" /></p>

							<?php elseif( $item["hot"] === 3 ) : ?>

								<p>
									<img class="hot" src="media/menu/hot.png" alt="hot" />
									<img class="hot" src="media/menu/hot.png" alt="hot" />
									<img class="hot" src="media/menu/hot.png" alt="hot" />
								</p>

							<?php elseif( $item["hot"] === 12 ) : ?>
								<p>Valgfri <img class="hot" src="media/menu/hot.png" alt="hot" /> 
								eller <img class="hot" src="media/menu/hot.png" alt="hot" /><img class="hot" src="media/menu/hot.png" alt="hot" /></p>

							<?php elseif( $item["hot"] === 23 ) : ?>
								<p>Valgfri <img class="hot" src="media/menu/hot.png" alt="hot" /><img class="hot" src="media/menu/hot.png" alt="hot" /> 
								eller <img class="hot" src="media/menu/hot.png" alt="hot" />
								<img class="hot" src="media/menu/hot.png" alt="hot" /><img class="hot" src="media/menu/hot.png" alt="hot" /></p>

							<?php endif; ?>
						
						<?php endif; ?>
						<p class="price">Kr <?php echo $item["price"].$tegn; ?></p>
						
						<p>Inneholder: <?php echo $item["info"]; ?></p>

					</div>

				</div><!-- End gallerybox -->

		<?php endforeach; ?>

		<br class="clear" />

	</div><!-- End galcont -->



<?php require("includes/footer.php"); ?>
