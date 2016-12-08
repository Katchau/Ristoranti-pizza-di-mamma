<html>
<h1>Restaurant Guide</h1>
  <p>
    <?php
      session_start();
      echo $_SESSION['name'];
    ?>
    <a href="../index.php"> Logout </a>
  </p>
</html>
