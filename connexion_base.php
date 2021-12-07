<?php
try{
     $linkpdo = new PDO("mysql:host=localhost; dbname=cabinet",'root', '');
     $linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
?>