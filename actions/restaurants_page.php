<html>
<body>
<div id="main">
  <section id = "Best Ristorantis">
    <h2> Che cosa meravigliosa </h2>
    <div id="best_choices">
      <table>
        <?php
            include_once("connection.php");
            include_once("restaurant.php");

                  $result = getRestaurants();
          $paragraph = 0;
                  foreach( $result as $row) {
            if($paragraph == 0) echo'<tr>';
            if($paragraph == 2){
              echo '</tr> <tr>';
              $paragraph = 0;
            }
            $ref = "actions/restaurant_page.php";
            echo '<td > <form method="post" action=' . $ref . '>';
            echo '<button type="submit" value="' . $row['id'] . '" name="id">';
            echo $row['name'] . '</ button>';
            echo '</form> </td>';
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
</html>
