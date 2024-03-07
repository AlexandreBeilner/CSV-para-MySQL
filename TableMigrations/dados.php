<?php
require_once("Classes/CSVData.php");
require_once("Classes/InsertData.php");

$dados = new \Classes\CSVData("dados.csv");
$insert = new \Classes\InsertData($dados->getCollumns(), $dados->getData(), 'Dados');
$insert->execute();



