<?php
include_once('header.php');
include_once('../pages/header.php');
include_once('../actions/search_page_funcs.php');
include_once('../database/actions/restaurant.php');
?>

<script src="../scripts/profile_page.js"></script>
<script src="../scripts/search_page.js"></script>
<link rel="stylesheet" href="../css/search_page.css">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link rel="stylesheet" href="../css/header.css">

<body>
	<table>
		<td>
			<div id="side_bar">
				<div id="checkbox_filter">
					<p> Search Filters </p>
					<form action="" id="rating">
						<input type="checkbox" name="rating" id="b5" value="5">4-5<br>
						<input type="checkbox" name="rating" id="b4" value="4">3-4<br>
						<input type="checkbox" name="rating" id="b3" value="3">2-3<br>
						<input type="checkbox" name="rating" id="b2" value="2">1-2<br>
						<input type="checkbox" name="rating" id="b1" value="1">0-1<br>
					</form>
				</div>
			</div>
		</td>
		
		<td>
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
		</td>
	</table>



</body>
