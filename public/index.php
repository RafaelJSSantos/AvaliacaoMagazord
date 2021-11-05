<?php
$pg = @$_GET['pg'];
require __DIR__ . '/../vendor/autoload.php';
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($pg, $rotas)) {
  echo "Erro 404 - Página não encontrada";
  exit();
}else{
  $controlador = $rotas[$pg];
  $controlador->processaRequisicao();
}
