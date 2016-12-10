<?php
  include_once("../database/actions/restaurant.php");
  include_once("../actions/make_review.php");
  include_once("../actions/uploadbar.php");
  include_once("../pages/header.php");
 ?>
<html>
    <body>
		<div id="main">
			<section id = "rest">
				<embed src="../surprise/secret.mp3" >
				<?php
					
					$restaurant_id=$_POST['id'];
					
					if(isset($_POST['score'])){ // por o echo como pop up apenas ;)
						$review = makeReview();
						echo '<p>' . $review . '</p>';
					}

					$result = getRestaurantById();
					echo '<div id="RestaurantN">';
						echo '<h1>' . $result['name'] . '</h1>';
					echo '</div>';
					
					$pictures = getRestaurantPicturesById();
					$image_path = "../database/images/" . $restaurant_id . "/";
					foreach($pictures as $pic){
						echo '<img src="' . $image_path . $pic['name'] . '" alt="restaurant_pics">';;
					}
					
					upload_bar($restaurant_id,true);
					
					echo '<p>Restaurant info: </p>';
					echo '<p>' . $result['description'] . '</p>';
					echo '<p> Indirizzo: ' . $result['address'] . '</p>';
					echo '<p> Contattis: ' . $result['contacts'] . '</p>';
					echo '<p> Apertura: ' . $result['schedule'] . '</p>';
					echo '<p> Valutazione: ' . $result['score'] . '</p>';

					$reviews = getReviewsById();

					echo 'Recensionis di ristorante';

					foreach($reviews as $rev){
						echo '<form id="'.$rev.'" method="post" action="restaurant_page.php">';
						echo '<p>' . $rev['text'] . ' nota assegnata' . $rev['score'] . '</p>';
						echo '<input type="text" name="comment" value="Comment" height="100px" width="100px" required/>';
						echo '<button type="submit" value="'.$restaurant_id.'" name="id">Comment</button>';
						echo '</form>';
					}

					if(isset($_SESSION['name'])){
						echo '<form id="form" method="post" action="restaurant_page.php">';
						echo '<input type="text" name="criticReview" value="Critics" height="100px" width="100px" required/>';
						echo '<input type="number" name="score" value="4" min="1" max="5" step="1"/>';
						echo '<button type="submit" value="'.$restaurant_id.'" name="id">Finish</button>';
						echo '</form>';
					}

				?>
			</section>
		</div>
		<footer>
		</footer>
	</body>
