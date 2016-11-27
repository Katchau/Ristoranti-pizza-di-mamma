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
			<section id = "Best Ristorantis">
				<h2> Che cosa meravigliosa </h2>
				<div id="best_choices">
					<table>
						<?php
                            include_once("actions/connection.php");
			                include_once("actions/restaurant.php");

			                $result = getRestaurants();
							$paragraph = 0;
			                foreach( $result as $row) {
								if($paragraph == 0) echo'<tr>';
								if($paragraph == 2){
									echo '</tr> <tr>';
									$paragraph = 0;
								}
                                echo '<td> <p>' . $row['name'] . '</p> </td>';
								$paragraph = $paragraph + 1;
                            }
							echo '</tr>';
                        ?>
					</table>
				</div>
			</section>
		</div>
		<footer>
		</footer>
	</body>
