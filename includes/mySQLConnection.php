<?php

try{
$pdo = new PDO('mysql:host=eu-cdbr-cb-west-01.cleardb.net;dbname=cb_mnarudzbe_db', 'be57c910dd7384', 'fd3be959');
}
 catch (PDOException $e){
     echo 'Error with connection to database';
 }
    
?>
