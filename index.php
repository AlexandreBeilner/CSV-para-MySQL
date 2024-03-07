<?php
$fileName = 'dados.csv';
$file = fopen($fileName, 'r');

$collums = explode(';', fgets($file));

$dados = [];

while (($line = fgets($file))!== false){
    $dados[] = explode(";", $line);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Conectado ao banco de dados";
}
foreach ($dados as $dado){
    $stmt = $conn->prepare("INSERT INTO Dados (id, nome, idade, email, telefone, endereco ) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $dado[0], $dado[1], $dado[2], $dado[3], $dado[4], $dado[5]);
    $stmt->execute();
    header('Content-Type: application/json');
    if ($stmt->affected_rows > 0) {
        http_response_code(200);
        echo "Dados inseridos no banco";
    } else {
        http_response_code(500);
        echo "Erro ao inserir dados no banco";
    }
    $stmt->close();
}
$conn->close();




