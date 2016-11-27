<?php
try{
    $db = new PDO('sqlite:database/database.db');
}

catch(PDOException $e) {
    die($e->getMessage());
}

?>