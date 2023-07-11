<?php
require '../vendor/autoload.php';
require '../DB.php';

$dotenv = Dotenv\Dotenv::createImmutable(realpath(__DIR__ . '../../'));
$env = $dotenv->load();
DB::connect($env['DATABASE'],$env['DATABASE_HOST'],$env['DATABASE_NAME'],$env['DATABASE_USERNAME'],$env['DATABASE_PASSWORD']);
?>