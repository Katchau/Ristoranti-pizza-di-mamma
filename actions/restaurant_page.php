<?php
  include_once("../database/actions/restaurant.php");
  include_once("../database/actions/comment.php");
  include_once("../actions/reviews_comments.php");
  include_once("../actions/make_review.php");
  include_once("../actions/uploadbar.php");
  include_once("../pages/header.php");
 ?>
<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
<link rel="stylesheet" href="../css/restaurant_page.css">
		<div id="main">
				<!-- <embed src="../surprise/secret.mp3" > -->
				<?php

					$restaurant_id=$_GET['id'];

					if(isset($_POST['score'])){ // por o echo como pop up apenas ;)
						$review = makeReview();
						echo '<p>' . $review . '</p>';
					}

          if(isset($_POST['commentSubmission'])){
            $comment = make_comment();
          }

					$result = getRestaurant();
					echo '<div id="space">';
					echo '</div>';
					echo '<div id="RestaurantN">';
						echo '<h1>' . $result['name'] . '</h1>';
					echo '</div>';
					$pictures = getRestaurantPicturesById();
					$image_path = "../database/images/" . $restaurant_id . "/";
					$n_pic = 0;

					echo '<div id="images-space">';
				    echo '<button id="b4Button" onClick="getDesiredPicture(this.id)">-</button>';
					echo '<div id="images">';
					foreach($pictures as $pic){
						echo '<div id="img_' . $n_pic . '">';
							echo '<img src="' . $image_path . $pic['name'] . '" alt="restaurant_pics">';
						echo '</div>';
						$n_pic ++;
					}

					echo '</div>';
				    echo '<button id="nextButton" onClick="getDesiredPicture(this.id)">+</button>';
					echo '</div>';
					//upload_bar($restaurant_id,true);

					echo '<div id="restaurant-info">';
				    echo '<div id="title-info">';
				    echo '<p>Informação do Restaurante</p>';
					echo '</div>';
					echo '<div id="principal-info">';
					echo '<p>' . $result['description'] . '</p>';
					echo '<p> Endereço: ' . $result['address'] . '</p>';
					echo '<p> Contactos: ' . $result['contacts'] . '</p>';
					echo '<p> Horário: ' . $result['schedule'] . '</p>';
					echo '<p> Cotação: ' . $result['score'] . '</p>';
					echo '</div>';
					echo '</div>';

				echo '<iframe id="map" frameborder="0"
            src="https://www.google.com/maps/embed/v1/place?q=<?=' . $result['address'] . '?>&key=AIzaSyCdqMmRf8c1f_yTgtjt7zT_5tdO5UOPka4"
allowfullscreen></iframe>';

					$reviews = getReviews();

					echo '<div id="reviews">';

				echo '<div id="title-reviews">';
				echo '<p>Críticas</p>';
				echo '</div>';

					foreach($reviews as $rev){
						$comments = get_comments($rev['id']);
						echo '<form id="'.$rev['id'].'" method="post" action="restaurant_page.php?id=' . $restaurant_id . '">';
						echo '<h3>' . $rev['text'] . '</h3> <h3> nota assegnata: ' . $rev['score'] . '</h3>';
						echo '</form>';

						foreach ($comments as $comment) {
							echo '<h4>' . $comment['text'] . '</h4>';
						}

						if(isset($_SESSION['name'])){
							echo '<form id="form" method="post" action="restaurant_page.php?id=' . $restaurant_id . '">';
							echo '<input type="text" name="commentText" placeholder="Comment" height="100px" width="100px" required/>';
							echo '<button type="submit" value="'.$rev['id'].'" name="commentSubmission">Comment</button>';
							echo '</form>';
						}
					}

					if(isset($_SESSION['name'])){
						echo '<form id="form" method="post" action="restaurant_page.php?id=' . $restaurant_id . '">';
						echo '<input type="text" name="criticReview" placeholder="Critics" height="100px" width="100px" required/>';
						echo '<input type="number" name="score" value="4" min="1" max="5" step="1"/>';
						echo '<button type="submit">Finish</button>';
						echo '</form>';
					}

					echo '</div>';

				?>
		</div>
