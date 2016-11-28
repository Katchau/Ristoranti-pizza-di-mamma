<html>
    <head>
        <title>Restaurant Guide</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="scripts/script1.js"></script>
        <!-- <link rel="stylesheet" href="css/style.css"> -->
    </head>
    <body>
        <header>
           <div id="header">
            <h1>Restaurant Guide</h1>
                <h2><a href="login.php">Login</a></h2>
                <h2><a href="">Register</a></h2>
           </div>
        </header>
		<div id="main">
			<section id = "rest">
				<?php
					include_once("actions/connection.php");
					include_once("actions/restaurant.php");

					$result = getRestaurantById();
					
					echo '<h1>' . $result['name'] . '</h1>';
					echo 'mancata una descrizione del ristorante';
					echo '<p> Indirizzo: ' . $result['adress'] . '</p>';
					echo '<p> Contattis: ' . $result['contacts'] . '</p>';
					echo '<p> Apertura: ' . $result['schedule'] . '</p>';
					echo '<p> Valutazione: ' . $result['score'] . '</p>';
					
					$reviews = getReviewsById();
					
					echo 'Recensionis di ristorante';
					
					foreach($reviews as $rev){
						echo '<p>' . $rev['text'] . ' nota assegnata' . $rev['score'] . '</p>';
					}
				?>				
			</section>
		</div>
		<footer>
		</footer>
	</body>
