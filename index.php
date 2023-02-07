<?php

require_once 'vendor/autoload.php';
require_once 'conf/config.php';

use League\Plates\Engine;
use Model\CarRepository;

$template = new Engine('templates','tpl');

$src = array (
    "targa"  => "",
    "marca" => "",
    "modello"   => "",
    "colore" => ""
);

if($_POST['targa'] != "")
    $scr["targa"] = $_POST['targa'];

if($_POST['marca'] != "")
    $scr["marca"] = $_POST['marca'];

if($_POST['modello'] != "")
    $scr["modello"] = $_POST['modello'];

if($_POST['colore'] != "")
    $scr["colore"] = $_POST['colore'];


$marche = CarRepository::get_marche();
$colori = CarRepository::get_colori();

$all = CarRepository::get_all($scr);

echo $template->render('crud', [
    'all' => $all,
    'marche' => $marche,
    'colori' => $colori

]);