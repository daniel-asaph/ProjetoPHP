<?php
require_once __DIR__ . '/agendamento.php';
$escolhido = isset($_POST['horario']) ? $_POST['horario'] : '';
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Agendamento</title>
</head>
<body>

<h2>Agendar horário</h2>

<form method="POST" action="?pg=agendamento">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required> <br>
    <label for="cpf">CPF (11 dígitos):</label>
    <input type="text" name="cpf" required> <br>
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" required> <br>
    <label for="data">Data:</label>
    <input type="date" name="data" required> <br><br>
    <label for="horario">Horário:</label><br>
    <select name="horario" id="horario" required>
        <option value="">-- selecione --</option>
        <?php foreach ($permitidos as $h): ?>
            <option value="<?php echo htmlspecialchars($h, ENT_QUOTES, 'UTF-8'); ?>"
                <?php if ($h === $escolhido) echo 'selected'; ?>>
                <?php echo htmlspecialchars($h, ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="tipo_investimento">Tipo de investimento:</label><br>
    <select name="tipo_investimento" id="tipo_investimento" required>
        <option value="">-- selecione --</option>
        <?php foreach ($tiposInvestimento as $t): ?>
            <option value="<?php echo htmlspecialchars($t, ENT_QUOTES, 'UTF-8'); ?>"
                <?php if ($t === $escolhido) echo 'selected'; ?>>
                <?php echo htmlspecialchars($t, ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <button type="submit">Agendar</button>
</form>