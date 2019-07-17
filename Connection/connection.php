<?php

/**
 * Fichier de connexion à la base de données
 * @author : Louis-Marie GENNETAY
 */

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=monitoringcisco', 'root', ''); //Dev
    //$bdd = new PDO('mysql:host=localhost;dbname=monitoringcisco', 'infra', 'admin_01!'); //Raspberry
   $bdd ->exec('SET NAMES utf8');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
 