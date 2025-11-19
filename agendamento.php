<?php

$arquivo = __DIR__ . '/horarios.json';

if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([]));
}

$conteudo = file_get_contents($arquivo);
$agenda = json_decode($conteudo, true);

if (!is_array($agenda)) {
    $agenda = [];
}

$mensagem = '';
$escolhidoHora = '';
$escolhidoData = '';

$permitidos = ['08:00', '09:30', '11:00', '13:00', '14:30', '16:00', '17:30', '19:00'];
$tiposInvestimento = ["Fundos de Investimento", "Aplicações", "Ações", "Criptomoedas"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $cpf = isset($_POST['cpf']) ? trim($_POST['cpf']) : '';
    $telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
    $escolhidoHora = isset($_POST['horario']) ? trim($_POST['horario']) : '';
    $escolhidoData = isset($_POST['data']) ? trim($_POST['data']) : '';
    $escolhidoInvestimento = isset($_POST['tipo_investimento']) ? trim($_POST['tipo_investimento']) : '';

    if ($escolhidoHora === '' || !in_array($escolhidoHora, $permitidos, true)) {
        $mensagem = 'Horário inválido. Escolha um horário da lista.';
    }elseif ($escolhidoData === ""){
        $mensagem = 'Data inválida. Escolha um horário da lista.';
    } else {
        if (!isset($agenda[$escolhidoData])) {
            $agenda[$escolhidoData] = [];
        }
        
        if (isset($agenda[$escolhidoData][$escolhidoHora])) {
            $mensagem = 'Horário indisponível nesse dia.';
        } else {
        
            $agenda[$escolhidoData][$escolhidoHora] = [
                "nome"=> $nome,
                "cpf"=> $cpf,
                "telefone"=> $telefone,
                "investimento"=> $escolhidoInvestimento,
            ];
        
            file_put_contents($arquivo, json_encode(
                $agenda,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            ));
        
            $mensagem = 'Agendamento realizado com sucesso!';
        }
    }
   
} 

echo $mensagem;
?>