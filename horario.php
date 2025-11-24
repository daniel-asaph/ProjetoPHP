<?php

$arquivo = __DIR__ . '/horarios.json';

if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([]));
}

$conteudo = file_get_contents($arquivo);
$horariosOcupados = json_decode($conteudo, true);

if (!is_array($horariosOcupados)) {
    $horariosOcupados = [];
}

$mensagem = '';
$escolhido = '';

$permitidos = ['08:00', '09:30', '11:00', '13:00', '14:30', '16:00', '17:30', '19:00'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $escolhido = isset($_POST['horario']) ? trim($_POST['horario']) : '';

    if ($escolhido === '' || !in_array($escolhido, $permitidos, true)) {
        $mensagem = 'Horário inválido. Escolha um horário da lista.';
    } else {

        if (in_array($escolhido, $horariosOcupados, true)) {
            $mensagem = 'Horário indisponível.';
        } else {

            $horariosOcupados[] = $escolhido;

            file_put_contents($arquivo, json_encode(
                $horariosOcupados,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            ));

            $mensagem = 'Agendamento realizado com sucesso!';
        }
    }
}
echo $mensagem;
?>