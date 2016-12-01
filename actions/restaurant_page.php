<html>
    <head>
        <title>Restaurant Guide</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- <link rel="stylesheet" href="css/style.css"> -->
    </head>
    <body>
        <header>
           <div id="header">
             <h1>Restaurant Guide</h1>
             <p><a href="login.php"> Login </a><a href="register_page.php"> Register </a></p>
           </div>
        </header>
		<div id="main">
			<section id = "rest">
				<?php
					include_once("restaurant.php");
          include_once("review.php");

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

					$restaurant_id=$_POST['id'];

                echo '<form id="form" method="post" action="make_review.php">';
                echo '<input type="text" name="criticReview" value="Critics" height="100px" width="100px" required/>';
                echo '<input type="number" name="score" value="4" min="1" max="5" step="1"/>';
                echo '<button type="submit" value="'.$restaurant_id.'" name="restaurant_id">Finish</button>';
                echo '</form>';

				?>
			</section>
		</div>
		<footer>
		</footer>
	</body>
