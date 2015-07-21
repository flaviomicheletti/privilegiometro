<?php

#
# Conexão com DB
#
function getPDO(){
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $base = "devfuria_privi";

    $dsn = "mysql:dbname=$base;host=$host";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("set names utf8");

    return $pdo;
}

#
# Insert
#
function insert($posicao) {
    $quando = retQuando();

    $query = "INSERT INTO privilegios (posicao, quando) VALUES (:posicao, :quando)";
    $pdo = getPDO();
    $sth = $pdo->prepare($query);
    $sth->bindParam(':posicao', $posicao);
    $sth->bindParam(':quando',  $quando);
    $sth->execute();
}

#
# Quando enviou os dados
#
function retQuando() { 
    $objDateTime = new DateTime('NOW');
    return $objDateTime->format('Y-m-d-h-m-s');

}

#
# Retorna 4 privilégios quaisquer
#
function ret4PrivilegiosRandon() {
    $sql  = "SELECT posicao FROM privilegios ORDER BY RAND() LIMIT 4";
    $stmt = getPDO()->query($sql);
    return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

#
# Retorna o total de pesquisas realizadas
#
function retTotalDePesquisas() {
    $sql  = "SELECT count(posicao) AS total FROM privilegios";
    $stmt = getPDO()->query($sql);
    $quantidade = $stmt->fetch(PDO::FETCH_OBJ);
    return $quantidade->total;
}

#
# Retorna o total de privilégios (posição) por grupo
#
function retGruposPrivilegios() {
    $sql  = "SELECT posicao, count(posicao) AS total FROM privilegios GROUP BY posicao ORDER BY total DESC";
    $stmt = getPDO()->query($sql);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}