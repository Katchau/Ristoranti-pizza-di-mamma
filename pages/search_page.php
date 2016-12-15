<?php
include_once('header.php');
include_once('../pages/header.php');
include_once('../actions/search_page_funcs.php');
include_once('../database/restaurant.php');
?>

<script src="../scripts/profile_page.js"></script>
<script src="../scripts/search_page.js"></script>
<link rel="stylesheet" href="../css/search_page.css">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link rel="stylesheet" href="../css/header.css">

<body>
<div id="middle">

</div>
	<div id="side_bar">
		<div id="checkbox_filter">
			<p> Filtros de Estrela </p>
			<form action="" id="rating">
				<input type="checkbox" name="rating" id="b5" value="5">Entre 4-5<br>
				<input type="checkbox" name="rating" id="b4" value="4">Entre 3-4<br>
				<input type="checkbox" name="rating" id="b3" value="3">Entre 2-3<br>
				<input type="checkbox" name="rating" id="b2" value="2">Entre 1-2<br>
				<input type="checkbox" name="rating" id="b1" value="1">Entre 0-1<br>
			</form>
		</div>
		<div id="types">
			<p> Filtros de Tipo </p>
			<form action="">
				<button type="button" name="cafe" onclick="changeType(cafe)">
					<?php echo '<img src="'. getRestaurantFilters("cafe") . '">'; ?>
				</button>
				<br>
				<button type="button" name="pastelaria" onclick="changeType(pastelaria)">
					<?php echo '<img src="'. getRestaurantFilters("pastelaria") . '">'; ?>
				</button>
				<br>
				<button type="button" name="drinks" onclick="changeType(drinks)">
					<?php echo '<img src="'. getRestaurantFilters("drinks") . '">'; ?>
				</button>
				<br>
				<button type="button" name="fastfood" onclick="changeType(fastfood)">
					<?php echo '<img src="'. getRestaurantFilters("fastfood") . '">'; ?>
				</button>
				<br>
				<button type="button" name="gourmet" onclick="changeType(gourmet)">
					<?php echo '<img src="'. getRestaurantFilters("gourmet") . '">'; ?>
				</button>
			</form>
 		</div>
	</div>

	<div id="down-part">
		<div id="restaurants">
			<?php
				$rests = filterRestaurants(null, null);
				if($rests === "No restaurant found :(") echo '';
				else if($rests != null || $rests != ""){
					displaySearch($rests);
				}
				else{
					$local = $_GET['local'];
					displayAllRestaurants($local);
				}
			?>
		</div>
	</div>
</body>
