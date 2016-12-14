<?php
  include_once("../database/actions/restaurant.php");
  include_once("../database/actions/comment.php");
  include_once("../actions/reviews_comments.php");
  include_once("../actions/make_review.php");
  include_once("../actions/uploadbar.php");
  include_once("../pages/header.php");
?>
<script src="../scripts/restaurant_page.js"></script>
<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
<link rel="stylesheet" href="../css/restaurant_page.css">



<div class="overlayEditRestaurant" hidden="hidden">
    <div id="overlay-EditRestaurant">
        <div id="editRestaurant"><h1>Editar Restaurante</h1>
          <div id="changeRestaurantName">
              <input type="button" value="Mudar Nome">
          </div>
          <div id="changeRestaurantDescription">
              <input type="button" value="Mudar Descrição">
          </div>
          <div id="changeRestaurantAdress">
              <input type="button" value="Mudar Morada">
          </div>
          <div id="changeRestaurantNumber">
              <input type="button" value="Mudar Contacto">
          </div>
          <div id="changeRestaurantSchedule">
              <input type="button" value="Mudar Horário">
          </div>
          <div id="changeRestaurantType">
              <input type="button" value="Mudar Tipo">
          </div>
        </div>
    </div>
</div>

<div class="overlayDeleteRestaurant" hidden="hidden">
    <div id="overlay-deleteRestaurant">
        <div id="deleteRestaurant"><h1>Pretende eliminar o seu restaurante?</h1>
          <div id="confirm">
            <?php
            echo '<form id="form" method="post" action="change_restaurant/delete_restaurant.php?id=' . $_GET['id'] . '" onsubmit="">';
              ?>
              <input type="submit" value="Sim">
            </form>
          </div>
          <div id="cancel">
            <?php
            echo '<form id="form" method="post"  action="restaurant_page.php?id=' . $_GET['id'] . '"  onsubmit="">';
              ?>
              <input type="submit" value="Não">
            </form>
          </div>
        </div>
    </div>
</div>

<div class="overlayChangeName" hidden="hidden">
    <div id="overlay-changeName">
        <div id="changeName"><h1>Mudar Nome</h1></div>
        <?php
        echo '<form  method="post" action="../actions/change_restaurant/change_name.php?id=' . $_GET['id'] . '" onsubmit="return changePassword();">';
        ?>
           <input id="restaurantName" type="text" name="restaurantName" placeholder="Nome Restaurante" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changeName"></span>
        </form>
    </div>
</div>
<div class="overlayChangeDescription" hidden="hidden">
    <div id="overlay-changeDescription">
        <div id="changeDescription"><h1>Mudar Descrição</h1></div>
        <?php
        echo '<form id="form" method="post" action="../actions/change_restaurant/change_description.php?id=' . $_GET['id'] . '" onsubmit="return changePassword();">';
        ?>
           <input id="restaurantDescritpion" type="text" name="restaurantDescritpion" placeholder="Descrição" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changeDescription"></span>
        </form>
    </div>
</div>
<div class="overlayChangeAdress" hidden="hidden">
    <div id="overlay-changeAdress">
        <div id="changeAdress"><h1>Mudar Morada</h1></div>
        <?php
        echo '<form id="form" method="post" action="../actions/change_restaurant/change_address.php?id=' . $_GET['id'] . '" onsubmit="return changePassword();">';
        ?>
           <input id="restaurantAdress" type="text" name="restaurantAdress" placeholder="Morada" required/>
           <input id="restaurantCity" type="text" name="restaurantCity" placeholder="Cidade" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changeAdress"></span>
        </form>
    </div>
</div>
<div class="overlayChangeNumber" hidden="hidden">
    <div id="overlay-changeNumber">
        <div id="changeNumber"><h1>Mudar Contacto</h1></div>
        <?php
        echo '<form id="form" method="post" action="../actions/change_restaurant/change_number.php?id=' . $_GET['id'] . '" onsubmit="return changePassword();">';
        ?>
           <input id="restaurantNumber" type="text" name="restaurantNumber" placeholder="Contacto" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changeNumber"></span>
        </form>
    </div>
</div>
<div class="overlayChangeSchedule" hidden="hidden">
    <div id="overlay-changeSchedule">
        <div id="changeSchedule"><h1>Mudar Horário</h1></div>
        <?php
        echo '<form id="form" method="post" action="../actions/change_restaurant/change_schedule.php?id=' . $_GET['id'] . '" onsubmit="return changePassword();">';
        ?>
           <input id="restaurantOpen" type="text" name="restaurantOpen" placeholder="Abertura" required/>
           <input id="restaurantClose" type="text" name="restaurantClose" placeholder="Fecho" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changeSchedule"></span>
        </form>
    </div>
</div>
<div class="overlayChangeType" hidden="hidden">
    <div id="overlay-changeType">
        <div id="changeType"><h1>Mudar Tipo</h1></div>
        <?php
        echo '<form id="form" method="post" action="../actions/change_restaurant/change_type.php?id=' . $_GET['id'] . '" onsubmit="return changePassword();">';
        ?>
           <input id="restaurantType" type="text" name="restaurantType" placeholder="Tipo Restaurante" required/>
           <input type="submit" value="Confirmar"/>
           <span id="output-changeType"></span>
        </form>
    </div>
</div>
?>
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

          if (isRestaurantOwner($_SESSION['email'])){
            echo '<div id="buttons">';
            echo '<div id="edit">';
            echo '<input type="button" value="Editar Restaurante">';
            echo '</div>';
            echo '<div id="delete">';
            echo '<input type="button" value="Apagar Restaurante">';
            echo '</div>';
            echo '</div>';
          }

					echo '<div id="restaurant-info">';
				    echo '<div id="title-info">';
				    echo '<p>Informação do Restaurante</p>';
					echo '</div>';
					echo '<div id="principal-info">';
					echo '<p>' . $result['description'] . '</p>';
					echo '<p> Endereço: ' . $result['address'] . '</p>';
          echo '<p> Cidade: ' . $result['city'] . '</p>';
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
