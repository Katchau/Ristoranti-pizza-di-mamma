<?php

try{
    $db = new PDO("sqlite:../database/database.db","","",array(
        PDO::ATTR_PERSISTENT => true
    ));
}
catch(PDOException $e) {
    die($e->getMessage());
}

?>
