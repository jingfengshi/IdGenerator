<?php
require_once './vendor/autoload.php';
$id = new \App\RandomIdGenerator();

echo $id->generate();