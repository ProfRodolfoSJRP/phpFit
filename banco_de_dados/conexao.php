<?php

try{
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname".DB_NAME.";charset=utf8",
    DB_USER,DB_PASS);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die("Erro ao conectar ao banco de dados");
}