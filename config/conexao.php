<?php

$conn = mysqli_connect("localhost", "root", "", "tphe");

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//Função para exibir o tempo do seu computador, apenas o tempo e não a data. 
function formatDate($date) {
    return date('g:i a', strtotime($date));
}
