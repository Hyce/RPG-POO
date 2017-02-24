<?php

try {
    $db = new PDO('mysql:host=localhost:8889;dbname=mydb', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch( PDOException $Exception ) {
    // Note The Typecast To An Integer!
   echo  $Exception->getMessage( )." ".$Exception->getCode( );
}