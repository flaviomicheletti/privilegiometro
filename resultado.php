<?php

#
# Dados
#
$posicao_do_usuario = $_GET['p'];


#
# Conexão
#
$host = "localhost";
$user = "root";
$pass = "1234";
$base = "devfuria_privi";

$dsn = "mysql:dbname=$base;host=$host";
$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("set names utf8");


#
# Insert
#

# Data
$objDateTime = new DateTime('NOW');
$quando = $objDateTime->format('Y-m-d');

$query = "INSERT INTO privilegios (posicao, quando) VALUES (:posicao, :quado)";
$sth = $pdo->prepare($query);
$sth->bindParam(':posicao', $posicao_do_usuario);
$sth->bindParam(':quado',   $quando);
// $sth->execute();


#
# Gráfico
#
$sql      = "SELECT * FROM privilegios ORDER BY RAND() LIMIT 4";
$stmt     = $pdo->query($sql);
$posicoes = $stmt->fetchAll(PDO::FETCH_OBJ);

# coloco o usuário sempre no meio
$_posicoes = Array(
    $posicoes[0]->posicao,
    $posicoes[1]->posicao,
    $posicao_do_usuario,
    $posicoes[2]->posicao,
    $posicoes[3]->posicao,
);

// var_dump($_posicoes);
// die();

$html = '<div class="grafico">';
foreach ($_posicoes as $key => $posicao) {
    if($key == 2) { # o meio
        $voce = "você";
    } else {
        $voce = "";
    }
    # [-13 até 22] = 35
    $porcentagem = ceil($posicao / 35 * 100);
    $html .= '<div class="coluna" style="width: '.$porcentagem.'%"><p class="rotulo">'.$voce.'</p></div>';
}
// $html .= "<div>";
$grafico = $html;

// echo $html;
// die();

// $grafico = '<div class="grafico">
//     <div class="coluna" style="width: 1%"><p class="rotulo">&nbsp;</p></div>
//     <div class="coluna" style="width: 25%"><p class="rotulo">&nbsp;</p></div>
//     <div class="coluna" style="width: 50%"><p class="rotulo">você</p></div>
//     <div class="coluna" style="width: 75%"><p class="rotulo">&nbsp;</p></div>
//     <div class="coluna" style="width: 100%"><p class="rotulo">&nbsp;</p></div>
// </div>';
// echo $grafico;
// die();


#
# Estatística
#
$sql  = "SELECT count(posicao) AS total FROM privilegios";
$stmt = $pdo->query($sql);
$quantidade = $stmt->fetch(PDO::FETCH_OBJ);
// var_dump($quantidade->total);
// die();
$total = $quantidade->total;

$sql    = "SELECT posicao, count(posicao) AS total FROM privilegios GROUP BY posicao ORDER BY total DESC";
$stmt   = $pdo->query($sql);
$totais = $stmt->fetchAll(PDO::FETCH_OBJ);

// var_dump($totais);
// die();

$html  = "<p>Do total de $total participantes:</p>";
$html .= '<table class="table table-condensed">';
foreach ($totais as $grupos) {
    $html .= "<tr><td>{$grupos->total} pontuaram {$grupos->posicao}</td></tr>";
}
$html .= "</table>";

$estatistica = $html;

// $estatistica = '<p>Do total de 100 participantes:</p>
//           <table class="table table-condensed">
//             <tr>
//               <td>50 pontuaram 9</td>
//             </tr>
//             <tr>
//               <td>50 pontuaram 8</td>
//             </tr>
//             <tr>
//               <td>50 pontuaram 8</td>
//             </tr>
//           </table>';

// echo $estatistica;
// die();



#
# Resultado
#
$resultado = array(
    'grafico'     => $grafico,
    'estatistica' => $estatistica,
);
header('Content-Type: application/json');
echo json_encode($resultado);