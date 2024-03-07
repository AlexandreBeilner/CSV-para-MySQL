<?php
require_once("Classes/CSVData.php");
require_once("Classes/InsertData.php");

$dados = new \Classes\CSVData("carros.csv");
$insert = new \Classes\InsertData($dados->getCollumns(), $dados->getData(), 'Carros');
$insert->execute();



