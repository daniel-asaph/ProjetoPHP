<?php
require_once __DIR__ . "/config_agenda.php";

$arquivo = __DIR__ . '/horarios.json';

if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([]));
}

$agenda = json_decode(file_get_contents($arquivo), true);
if (!is_array($agenda)) $agenda = [];

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $data = trim($_POST['data'] ?? '');
    $hora = trim($_POST['horario'] ?? '');
    $investimento = trim($_POST['tipo_investimento'] ?? '');

    if ($hora === '' || !in_array($hora, $permitidos)) {
        $mensagem = "Horário inválido. Selecione um horário permitido.";
    }
    elseif ($data === '') {
        $mensagem = "Data inválida.";
    }
    else {
        if (!isset($agenda[$data])) {
            $agenda[$data] = [];
        }

        if (isset($agenda[$data][$hora])) {
            $mensagem = "Horário indisponível nesse dia.";
        } else {

            $agenda[$data][$hora] = [
                "nome" => $nome,
                "cpf" => $cpf,
                "telefone" => $telefone,
                "investimento" => $investimento,
            ];

            file_put_contents($arquivo, json_encode(
                $agenda,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            ));

            $mensagem = "OK";
        }
    }
}
?>

<main class="flex-grow flex justify-center items-start mt-12 mb-24">

<div class="w-full max-w-2xl bg-white shadow-2xl rounded-3xl p-12 text-center border border-gray-100">

    <?php if ($mensagem === "OK"): ?>

        <div class="flex flex-col items-center">
            <h2 class="text-3xl font-extrabold text-blue-600 mb-3">Agendamento Confirmado</h2>
            <p class="text-gray-600 mb-8 text-lg">
                Seu horário foi reservado com sucesso.<br>
                Obrigado por escolher nossos serviços.
            </p>
            <a href="?pg=agendar"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
                Voltar ao agendamento
            </a>
        </div>

    <?php else: ?>

        <div class="flex flex-col items-center">
            <h2 class="text-3xl font-extrabold text-blue-900 mb-3">Não foi possível agendar</h2>
            <p class="text-gray-600 mb-8 text-lg">
                <?= htmlspecialchars($mensagem) ?>
            </p>
            <a href="?pg=agendar"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
                Tentar novamente
            </a>
        </div>

    <?php endif; ?>

</div>

</main>

