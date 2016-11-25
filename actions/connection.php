<?php
try{
    $db = new PDO('database/sqlite:database.db');
}
catch(PDOException $e) {
    die($e->getMessage());
}

?>